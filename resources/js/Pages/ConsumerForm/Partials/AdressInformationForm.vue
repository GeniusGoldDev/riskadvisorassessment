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

const props = defineProps({
    registrationResponse: Array,
});


const form = useForm({
    street_address: '',
    ste_apt: '',
    city: '',
    state: 'AL',
    zip_code: '',
    submission_id: props.registrationResponse.data.submission.id,
    consumer_id: props.registrationResponse.data.consumer.id,
});

const response = ref(null);

const submit = async () => {
    try {
        // Submit the form data using Axios or fetch
        const response = await axios.put(route('update_address', {
            "consumer_id": props.registrationResponse.data.consumer.id
        }), form.data());

        // Extract the response data
        const data = response.data;

        // Emit the response to the parent component
         emit('addressInfoSubmitted');

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
                <h2>Address Information</h2>
                <br>
                     <small>We can help with that! What is your address</small>
               </div> <br> 
               

                <form @submit.prevent="submit">
                    <div>
                        <InputLabel for="street_address" value="Street Address" />
                        <TextInput
                            id="street_address"
                            v-model="form.street_address"
                            type="text"
                            class="mt-1 block w-full"
                            
                            autofocus
                            autocomplete="first_name"
                        />
                        <InputError class="mt-2" :message="form.errors.street_address" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="ste_apt" value="Ste/Apt" />
                        <TextInput
                            id="ste_apt"
                            v-model="form.ste_apt"
                            type="text"
                            class="mt-1 block w-full"
                            
                            autofocus
                            autocomplete="ste_apt"
                        />
                        <InputError class="mt-2" :message="form.errors.ste_apt" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="city" value="City*" />
                        <TextInput
                            id="city"
                            v-model="form.city"
                            type="text"
                            class="mt-1 block w-full"
                            required
                            autocomplete="email"
                        />
                        <InputError class="mt-2" :message="form.errors.city" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="state" value="State*" />
                        <select v-model="form.state" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" id="cars" name="cars" required>
                            <option value="AL">AL</option>
                            <option value="AK">AK</option>
                            <option value="AZ">AZ</option>
                            <option value="AR">AR</option>
                            <option value="CA">CA</option>
                            <option value="CO">CO</option>
                            <option value="CT">CT</option>
                            <option value="DE">DE</option>
                            <option value="FL">FL</option>
                            <option value="GA">GA</option>
                            <option value="HI">HI</option>
                            <option value="ID">ID</option>
                            <option value="IL">IL</option>
                            <option value="IN">IN</option>
                            <option value="IA">IA</option>
                            <option value="KS">KS</option>
                            <option value="KY">KY</option>
                            <option value="LA">LA</option>
                            <option value="ME">ME</option>
                            <option value="MD">MD</option>
                            <option value="MA">MA</option>
                            <option value="MI">MI</option>
                            <option value="MN">MN</option>
                            <option value="MS">MS</option>
                            <option value="MO">MO</option>
                            <option value="MY">MT</option>
                            <option value="NE">NE</option>
                            <option value="NV">NV</option>
                            <option value="NH">NH</option>
                            <option value="NC">NC</option>
                            <option value="ND">ND</option>
                            <option value="OH">OH</option>
                            <option value="OK">OK</option>
                            <option value="OR">OR</option>
                            <option value="PA">PA</option>
                            <option value="RI">RI</option>
                            <option value="SC">SC</option>
                            <option value="SD">SD</option>
                            <option value="TN">TN</option>
                            <option value="TX">TX</option>
                            <option value="UT">UT</option>
                            <option value="VT">VT</option>
                            <option value="VA">VA</option>
                            <option value="WA">WA</option>
                            <option value="WV">WV</option>
                            <option value="WI">WI</option>
                            <option value="WY">WY</option>
                        </select>
                        <InputError class="mt-2" :message="form.errors.state" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="zip_code" value="Zip Code*" />
                        <TextInput
                            id="zip_code"
                            v-model="form.zip_code"
                            type="text"
                            class="mt-1 block w-full"
                            required
                            autocomplete="zip_code"
                        />
                        <InputError class="mt-2" :message="form.errors.zip_code" />
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
