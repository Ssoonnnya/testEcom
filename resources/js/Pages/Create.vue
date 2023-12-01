<script setup>
import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'

import { Link } from '@inertiajs/vue3';

const form = reactive({
  brand: '',
  producer: '',
  type: '',
  title: '',
  description: '',
  weight: '',
  amount: '',
  price: '',

 })

function submit() {
  router.post('/users', form)
}

</script>

<template>
    <div class="tabe-products mt-16 ">
        <Link :href="route('product.list')" :class="{'font-bold': $page.component === 'Index'}">Products</Link>
        <Link :href="route('create.product')" :class="{'font-bold': $page.component === 'Create'}">Create</Link>
    </div>
    <div>
        <form @submit.prevent="submit">
            <label for="brand">Brand:</label>
            <input id="brand" v-model="form.brand" />

            <label for="producer">Producer:</label>
            <input id="producer" v-model="form.producer" />

            <label for="type">Type:</label>
            <input id="type" v-model="form.type" />

            <label for="title">Title:</label>
            <input id="title" v-model="form.title" />

            <label for="description">Description:</label>
            <input id="description" v-model="form.description" />

            <label for="weight">Weight:</label>
            <input id="weight" v-model="form.weight" />

            <label for="amount">Amount:</label>
            <input id="amount" v-model="form.amount" />

            <label for="price">Price:</label>
            <input id="price" v-model="form.price" />

            <button type="submit">SUBMIT</button>
        </form>
    </div>
</template>
