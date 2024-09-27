<script setup>
import { onMounted, ref, toRefs, watch } from 'vue';

const response = ref(null);

// Define a reactive variable to store the products
const consumers = ref([]);

// Axios request to fetch data
const fetchProducts = async () => {
  try {
    const response = await axios.get(route('get_consumer'));
    // Store the response data in the reactive variable
    consumers.value = response.data.data;
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
                            <th class="px-4 py-2">Phone</th>
                            <th class="px-4 py-2">Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item, index) in consumers" :key="index" class="bg-white border-b hover:bg-gray-100">
                            <td class="px-4 py-2">{{ item.first_name }} {{ item.last_name }}</td>
                            <td class="px-4 py-2">{{ item.email }} </td>
                            <td class="px-4 py-2">{{ item.phone }} </td>
                            <td class="px-4 py-2">{{ item.street_address }} {{ item.ste_apt }} {{ item.city }} {{ item.state }} {{ item.zip_code }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
</template>
