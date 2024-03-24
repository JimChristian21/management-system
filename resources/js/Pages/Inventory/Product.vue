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
    <div class="w-full p-3 border-2 border-gray-400 rounded-lg ">
        <table class="w-full">
            <tr class="font-bold rounded-tl-full">
                <td class="py-3 p-2 border-t border-r border-l border-gray-800">Code</td>
                <td class="py-3 p-2 border-t border-r border-l border-gray-800">Title</td>
                <td class="py-3 p-2 border-t border-r border-l border-gray-800">Description</td>
                <td class="py-3 p-2 border-t border-r border-l border-gray-800">Quantity</td>
                <td class="py-3 p-2 border-t border-r border-l border-gray-800">Price</td>
                <td class="py-3 p-2 border-t border-r border-l border-gray-800">Actions</td>
            </tr>
            <tr v-for="product in products" :key="product.code" class="border border-gray-800">
                <td class="p-2">{{ product.code }}</td>
                <td class="p-2">{{ product.title }}</td>
                <td class="p-2">{{ product.description }}</td>
                <td class="p-2">{{ product.quantity }}</td>
                <td class="p-2">{{ product.price }}</td>
                <td class="p-2">
                    <v-icon name="md-delete" width="20" height="20" class="text-gray-800"/>
                </td>
            </tr>
        </table>
    </div>
</template>
