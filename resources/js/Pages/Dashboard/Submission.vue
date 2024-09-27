<script setup>
import { onMounted, ref, toRefs, watch } from 'vue';
const response = ref(null);

// Define a reactive variable to store the products
const submissions = ref([]);

// Axios request to fetch data
const fetchProducts = async () => {
  try {
    const response = await axios.get(route('get_submission'));
    // Store the response data in the reactive variable
    submissions.value = response.data.data;
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
                            <th class="px-4 py-2">Consumer</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Products</th>
                            <th class="px-4 py-2">Form Completed</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item, index) in submissions" :key="index" class="bg-white border-b hover:bg-gray-100">
                            <td class="px-4 py-2">{{item.consumer.first_name}} {{item.consumer.last_name}}</td>
                            <td class="px-4 py-2">{{item.consumer.email}}</td>
                            <td class="px-4 py-2">
                                <ul v-if="item.products">
                                    <li v-for="(prod, index) in item.products" :key="index">- {{ prod.name }}</li>
                                </ul>
                        </td>
                            <td class="px-4 py-2">yes</td>
                        </tr>
                    </tbody>
                </table>
            </div>
</template>
