<script setup>
import AdressInformationForm from '@/Pages/ConsumerForm/Partials/AdressInformationForm.vue';
import CompletedForm from '@/Pages/ConsumerForm/Partials/CompletedForm.vue';
import PersonalInformationForm from '@/Pages/ConsumerForm/Partials/PersonalInformationForm.vue';
import ProductInformationForm from '@/Pages/ConsumerForm/Partials/ProductInformationForm.vue';
import { ref } from 'vue';

const stage = ref(1);
const registrationResponse = ref(null);

const handleInfoSubmitted = (data) => {
 
  registrationResponse.value = data;
  updateStage()

};

const updateStage = () => {
  stage.value++;
};
</script>

<template>
            <PersonalInformationForm v-if="stage == 1" @personalInfoSubmitted="handleInfoSubmitted" />
            <AdressInformationForm v-if="stage == 2" :registrationResponse="registrationResponse" @addressInfoSubmitted="updateStage" />
            <ProductInformationForm v-if="stage == 3" :registrationResponse="registrationResponse" @productInfoSubmitted="updateStage"/>
            <CompletedForm v-if="stage == 4" />
</template>
