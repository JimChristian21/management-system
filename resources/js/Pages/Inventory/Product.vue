<script setup>
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import { router } from '@inertiajs/vue3';

defineProps({
    'products': Object
});
</script>

<template>
    <table>
        <tr>
            <td>Code</td>
            <td>Title</td>
            <td>Description</td>
            <td>Quantity</td>
            <td>Price</td>
            <td>Action</td>
        </tr>
        <tr v-for="product in products" :key="product.code">
            <td>{{ product.code }}</td>
            <td>{{ product.title }}</td>
            <td>{{ product.description }}</td>
            <td>{{ product.quantity }}</td>
            <td>{{ product.price }}</td>
            <td>

            </td>
        </tr>
    </table>
</template>
