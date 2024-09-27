<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { onMounted, ref, toRefs, watch } from 'vue';

import { useToast } from 'vue-toastification';

const showToast = useToast(); 

const emit = defineEmits(['personalInfoSubmitted']);

const props = defineProps({
    registrationResponse: Array,
});

const response = ref(null);


// Define a reactive variable to store the products
const products = ref([]);

// Axios request to fetch data
const fetchProducts = async () => {
  try {
    const response = await axios.get(route('get_products'));
    // Store the response data in the reactive variable
    products.value = response.data.data;
  } catch (error) {
    console.error('Error fetching data:', error);
  }
};

// Call the fetchData function when the component is mounted
onMounted(() => {
    fetchProducts();
});


// Array to hold the selected checkboxes
const selectedCheckboxes = ref([]);



const handleCheckboxSelection = (productId) => {
    if (selectedCheckboxes.value.includes(productId)) {
        // If the product ID is already in the array, remove it
        selectedCheckboxes.value = selectedCheckboxes.value.filter(id => id !== productId);
    } else {
        // If the product ID is not in the array, add it
        selectedCheckboxes.value.push(productId);
    }

};

const submit = async () => {


    try {
        // Submit the form data using Axios or fetch
        const response = await axios.post(route('save_products'), {
            product_ids: selectedCheckboxes.value,
            submission_id: props.registrationResponse.data.submission.id,
        });

        // Extract the response data
        const data = response.data;

        // Emit the response to the parent component
         emit('productInfoSubmitted');

            // Show success toast
            showToast('Operation successful!', {
                type: 'success', 
                timeout: 3000, 
                closeOnClick: true, 
                pauseOnHover: true, 
                draggable: true, 
            });
        
    } catch (error) {
        // Show error toast
        showToast('An error occurred during form submission. Please try again later.', {
            type: 'error', 
            timeout: 3000, 
            closeOnClick: true, 
            pauseOnHover: true, 
            draggable: true, 
        });
    }
};
</script>
<template>
    <Head title="Register" />

    <div class="container mx-auto">
        <div class="flex flex-wrap">
        <div class="w-full rounded-3xl sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2 px-4 py-2 bg-cover bg-center" style="background-image: url('/img.png');">
            <div class="md:hidden"> <!-- Hide on mobile view -->
                
            </div>
        </div>

        <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2 px-4 py-2">

            <AuthenticationCard>
               <div>
                <h2>Lets Get Started</h2>
                <br>
                     <small>Please select one or more options below that you'd like to have quoted for insurance</small>
               </div> <br> 
               
                <form @submit.prevent="submit">
                    <div>
                        <label v-for="(item, index) in products" :key="index" class="relative border border-gray-300 rounded-md shadow-sm p-2 h-20 flex flex-col justify-center cursor-pointer mb-3">
                            <!-- Background image -->
                            <div class="absolute inset-0 bg-cover bg-center rounded-md" :style="{ 'background-image': 'url(' + item.image + ')', opacity: 0.5 }"></div>
                            <!-- Black overlay -->
                            <div class="absolute inset-0 bg-black opacity-50 rounded-md"></div>
                            
                            <!-- Checkbox and text -->
                            <div class="relative z-10 flex items-center">
                                <input type="checkbox" :value="item.id" :id="'checkbox-' + index" class="mr-2" v-model="selectedCheckboxes" >
                                <div class="flex flex-col">
                                    <p class="text-white">{{ item.name }}</p>
                                    <small class="text-white">{{ item.description }}</small>
                                </div>
                            </div>
                        </label>
                    </div>

                  
                    <div class="flex items-center justify-end mt-4">
                        <PrimaryButton class="ms-4" >
                          Agree and  Continue
                        </PrimaryButton>
                    </div> <br>
                    <small>By continuing this form you agree to share data with Franke Insurance Services as defined in the terms of Use and Privacy Policy</small>
                </form>
            </AuthenticationCard>
        </div>
    </div>
    </div>
    
</template>
