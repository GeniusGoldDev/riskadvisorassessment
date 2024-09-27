<script setup>
import { onMounted, ref, toRefs, watch } from 'vue';

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

</script>
<template>
   
        <div class="overflow-x-auto">
                <table class="table-auto w-full text-sm text-left text-gray-700">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item, index) in products" :key="index" class="bg-white border-b hover:bg-gray-100">
                            <td class="px-4 py-2">{{ item.name }}</td>
                            <td class="px-4 py-2">{{ item.description }}</td>
                           
                        </tr>
                    </tbody>
                </table>
            </div>
</template>
