<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';


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

            <div class="bg-gray-100 min-h-screen flex items-center justify-center">
                    <div class="max-w-md w-full bg-white rounded-lg shadow-lg p-8">
                    <div class="text-center">
                        <svg class="mx-auto h-16 w-16 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <h2 class="mt-4 text-3xl font-extrabold text-gray-900">Success!</h2>
                        <p class="mt-2 text-sm text-gray-600">Your form has been successfully submitted.</p>
                    </div>
                    <div class="mt-6">
                        <Link :href="route('consumer_form')" >
                            <button @click="goBack" class="w-full px-4 py-2 rounded-md bg-green-500 text-white font-semibold hover:bg-green-600 focus:outline-none focus:bg-green-600 transition duration-300 ease-in-out">Go back to form</button>
                        </Link>
                    </div>
                    </div>
                </div>
        </div>
    </div>
    </div>
    
</template>
