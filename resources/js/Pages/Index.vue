<script>
import { Link } from '@inertiajs/vue3';
export default {

    props: {
        product: Object
    },
    components: { Link},

    methods: {
    getImageUrl(fileName) {
        return fileName ? `/storage${fileName}` : '';
    },
  },
}
</script>

<template>

    <div class="tabe-products mt-6 ">
        <Link :href="route('product.list')" :class="{'font-bold': $page.component === 'Index'}">Products</Link>
        <Link :href="route('create.product')" :class="{'font-bold': $page.component === 'Create'}">Create</Link>

         <table class="table table-hover table-striped mt-4">
            <thead>
                <th class="px-6 py-3 bg-gray-50 text-left"><span class="text-s leading-4 font-medium text-gray-500">ID</span></th>
                <th class="px-6 py-3 bg-gray-50 text-left"><span class="text-s leading-4 font-medium text-gray-500">FILE</span></th>
                <th class="px-6 py-3 bg-gray-50 text-left"><span class="text-s leading-4 font-medium text-gray-500">BRAND</span></th>
                <th class="px-6 py-3 bg-gray-50 text-left"><span class="text-s leading-4 font-medium text-gray-500">PRODUCER</span></th>
                <th class="px-6 py-3 bg-gray-50 text-left"><span class="text-s leading-4 font-medium text-gray-500">TYPE</span></th>
                <th class="px-6 py-3 bg-gray-50 text-left"><span class="text-s leading-4 font-medium text-gray-500">TITLE</span></th>
                <th class="px-6 py-3 bg-gray-50 text-left"><span class="text-s leading-4 font-medium text-gray-500">DESCRIPTION</span></th>
                <th class="px-6 py-3 bg-gray-50 text-left"><span class="text-s leading-4 font-medium text-gray-500">WEIGHT</span></th>
                <th class="px-6 py-3 bg-gray-50 text-left"><span class="text-s leading-4 font-medium text-gray-500">AMOUNT</span></th>
                <th class="px-6 py-3 bg-gray-50 text-left"><span class="text-s leading-4 font-medium text-gray-500">PRICE</span></th>
                <th>

                </th>
            </thead>
            <tbody>
                <tr v-for="products in product" :key="products.id">
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                        {{ products.id }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                        <img :src="getImageUrl(products.file)" alt="Product Image" class="w-12 h-12 object-cover" />
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                        {{ products.brand }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                        {{ products.producer }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                        {{ products.type }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                        {{ products.title }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                        {{ products.description }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                        {{ products.weight }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                        {{ products.amount }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                        {{ products.price }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                        <Link :href="route('product.delete', { id: products.id })" class="text-red-600">Delete</Link>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                        <Link :href="route('product.edit', { id: products.id })" class="text-blue-600">Edit</Link>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
