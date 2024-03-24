<script setup>
import { router } from '@inertiajs/vue3';
import { MdDelete } from "oh-vue-icons/icons";
import { addIcons } from "oh-vue-icons";

addIcons(MdDelete);


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
            <td>Actions</td>
        </tr>
        <tr v-for="product in products" :key="product.code">
            <td>{{ product.code }}</td>
            <td>{{ product.title }}</td>
            <td>{{ product.description }}</td>
            <td>{{ product.quantity }}</td>
            <td>{{ product.price }}</td>
            <td>
                <v-icon name="md-delete" width="20" height="20" class="text-gray-800"/>
            </td>
        </tr>
    </table>
</template>
