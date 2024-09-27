<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { ref } from 'vue';

import { useToast } from 'vue-toastification';

const showToast = useToast(); 

const emit = defineEmits(['personalInfoSubmitted']);




const form = useForm({
    first_name: '',
    last_name: '',
    email: '',
    phone: '',
    contact_preference: 'email',
});

const response = ref(null);

const submit = async () => {
    try {
        // Submit the form data using Axios or fetch
        const response = await axios.post(route('save_consumer'), form.data());

        // Extract the response data
        const data = response.data;

        // Emit the response to the parent component
         emit('personalInfoSubmitted', data);

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
                <h2>Personal Information</h2>
                <br>
                     <small>Before you continue, let us know how we can contact you regarding you quote</small>
               </div> <br> 
               

                <form @submit.prevent="submit">
                    <div>
                        <InputLabel for="first_name" value="First Name*" />
                        <TextInput
                            id="first_name"
                            v-model="form.first_name"
                            type="text"
                            class="mt-1 block w-full"
                            required
                            autofocus
                            autocomplete="first_name"
                        />
                        <InputError class="mt-2" :message="form.errors.first_name" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="last_name" value="Last Name*" />
                        <TextInput
                            id="last_name"
                            v-model="form.last_name"
                            type="text"
                            class="mt-1 block w-full"
                            required
                            autofocus
                            autocomplete="last_name"
                        />
                        <InputError class="mt-2" :message="form.errors.last_name" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="email" value="Email Address*" />
                        <TextInput
                            id="email"
                            v-model="form.email"
                            type="email"
                            class="mt-1 block w-full"
                            required
                            autocomplete="email"
                        />
                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="phone" value="Phone No*" />
                        <TextInput
                            id="phone"
                            v-model="form.phone"
                            type="text"
                            class="mt-1 block w-full"
                            required
                            autocomplete="phone"
                        />
                        <InputError class="mt-2" :message="form.errors.phone" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="contact_preference" value="Contact Preference*" />
                        <select v-model="form.contact_preference" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" id="cars" name="cars" required>
                            <option value="email">Email</option>
                            <option value="phone">Phone</option>
                        </select>
                        <InputError class="mt-2" :message="form.errors.contact_preference" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                    

                        <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Continue
                        </PrimaryButton>
                    </div>
                </form>
            </AuthenticationCard>
        </div>
    </div>
    </div>
    
</template>
