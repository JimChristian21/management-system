<script setup>
defineProps({
    'products': Object
});

</script>

<template>
    {{ console.log(products[0]) }}
    <h1>TEST</h1>
    <table>
        <tr>
            <td>Code</td>
            <td>Title</td>
            <td>Description</td>
        </tr>
        <tr v-for="product in products">
            <td>{{ product.code }}</td>
            <td>{{ product.title }}</td>
            <td>{{ product.description }}</td>
        </tr>
    </table>
</template>
