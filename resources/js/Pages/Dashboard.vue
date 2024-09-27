<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import DashboardIndex from '@/Components/DashboardIndex.vue';
import { ref } from "vue";


import { Icon } from "@iconify/vue";
const activeTab = ref("vue");
const clickTab = (name) => {
  activeTab.value = name;
};
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <DashboardIndex />

                   
                    
                </div>
            </div>

]            
        </div>
    </AppLayout>
</template>
