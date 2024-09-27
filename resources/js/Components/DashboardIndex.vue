<script setup >

import { ref } from "vue";
import { Icon } from "@iconify/vue";
import Submission from '@/Pages/Dashboard/Submission.vue';
import Consumer from '@/Pages/Dashboard/Consumer.vue';
import Product from '@/Pages/Dashboard/Product.vue';


const activeTab = ref("vue");
const clickTab = (name) => {
  activeTab.value = name;
};
</script>

<template>
    <div>
        <div class="grid place-items-center w-full">
            <div>
            <main class="mt-6 space-y-10">
                <section>
                <VTabGroupOutline>
                    <VTabsWrapperOutline TabOutlineCenter>
                    <VTabOutline title="Submissions" :isActive="activeTab === 'vue'" @onClick="clickTab('vue')">
                        <template #icon>
                        <Icon icon="logos:" :class="{ 'text-green-500': activeTab === 'vue' }"
                            class="text-xl font-medium w-6 h-6 mr-2" />
                        </template>
                    </VTabOutline>
                    <VTabOutline title="Consumers" :isActive="activeTab === 'vueuse'" @onClick="clickTab('vueuse')">
                        <template #icon>
                        <Icon icon="logos:" :class="{ 'text-green-500': activeTab === 'vueuse' }"
                            class="text-xl font-medium w-6 h-6 mr-2" />
                        </template>
                    </VTabOutline>
                    <VTabOutline title="Products" :isActive="activeTab === 'nuxt'" @onClick="clickTab('nuxt')">
                        <template #icon>
                        <Icon icon="logos:" :class="{ 'text-green-500': activeTab === 'nuxt' }"
                            class="text-xl font-medium w-6 h-6 mr-2" />
                        </template>
                    </VTabOutline>
                   
                    </VTabsWrapperOutline>
                    <VTabsContentOutline>
                    <div v-if="activeTab === 'vue'">

                        <Submission/>


                    </div>
                    <div v-if="activeTab === 'vueuse'">
                        <Consumer/>

                    </div>
                    <div v-if="activeTab === 'nuxt'">
                        <Product/>

                    </div>
                    </VTabsContentOutline>
                </VTabGroupOutline>
                </section>

                <section>
            
                </section>
            </main>
            </div>
        </div>
    </div>
</template>
