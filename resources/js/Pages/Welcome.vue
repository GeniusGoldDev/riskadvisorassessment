<template>
    <div class="min-h-screen bg-gray-100 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
      <div class="sm:mx-auto sm:w-full sm:max-w-lg">
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
          Welcome to InsuranceQuotes
        </h2>
        <p class="mt-2 text-center text-sm text-gray-600 max-w">
          Get personalized insurance quotes tailored to your needs. Click below to get started!
        </p>
      </div>
  
      <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
          <div class="mt-6">
            <Link :href="route('consumer_form')" class="text-sm text-blue-600 hover:text-blue-800">
                <button type="button" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Get Quotes Now
              </button>
            </Link>
              
          </div>
          <div class="mt-6 flex justify-between">
            <Link :href="route('login')" class="text-sm text-blue-600 hover:text-blue-800">
                            Already registered?
            </Link>
            <Link :href="route('register')" class="text-sm text-blue-600 hover:text-blue-800">
              Don't have an account? Register
            </Link>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { Head, Link, useForm } from '@inertiajs/vue3';

  

  </script>
  
  <style>
  /* Add custom styles here */
  </style>
  