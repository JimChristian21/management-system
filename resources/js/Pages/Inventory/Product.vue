<script setup>
import { watch, ref } from 'vue';
import { router } from '@inertiajs/vue3';
import { MdDelete } from "oh-vue-icons/icons";
import { addIcons } from "oh-vue-icons";

addIcons(MdDelete);

const props = defineProps({
    'products': Object
});

console.log(props.products);

const limits = [
    'All',
    10,
    20,
    50,
    100
];

</script>

<template>
    <div class="w-full p-3 border-2 border-gray-400 rounded-lg overflow-auto">
        <table class="w-full">
            <tr class="font-bold rounded-tl-full">
                <td class="py-3 p-2 border border-gray-800">Code</td>
                <td class="py-3 p-2 border border-gray-800">Title</td>
                <td class="py-3 p-2 border border-gray-800">Description</td>
                <td class="py-3 p-2 border border-gray-800">Quantity</td>
                <td class="py-3 p-2 border border-gray-800">Price</td>
                <td class="py-3 p-2 border border-gray-800">Actions</td>
            </tr>
            <tr v-for="product in products" :key="product.code" class="border border-gray-800 hover:bg-gray-400 hover:cursor-pointer">
                <td class="p-2">{{ product.code }}</td>
                <td class="p-2 border-l">{{ product.title }}</td>
                <td class="p-2 border-l">{{ product.description }}</td>
                <td class="p-2 border-l">{{ product.quantity }}</td>
                <td class="p-2 border-l">{{ product.price }}</td>
                <td class="p-2 border-l">
                    <v-icon name="md-delete" width="20" height="20" class="text-gray-800"/>
                </td>
            </tr>
        </table>
        <div class="w-full flex my-5 justify-between">
            <div>
                < << 1 2 3 4 5 6 7 8>> >
            </div>
            <div class="flex">
                <div>
                    <select class="border-1 rounded-lg">
                        <option v-for="limit in limits" value="limit">{{ limit }}</option>
                    </select>
                </div>
                <div class="w-1/12 px-3 text-center flex items-center">
                    <span>20/500</span>
                </div>
            </div>
        </div>
    </div>
</template>
