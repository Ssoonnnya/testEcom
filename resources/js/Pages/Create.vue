<script>
import { router, useForm } from '@inertiajs/vue3'

import { Link } from '@inertiajs/vue3';

export default {
    components: {
        Link
    },
    props: {
        errors: Object
    },

    setup() {

    const form = useForm({
    brand: '',
    producer: '',
    type: '',
    title: '',
    description: '',
    weight: '',
    amount: '',
    price: '',

    })

    return { form }
    }
}


function submit() {
  router.post('/create', form)
}

</script>

<template>
    <div class="tabe-products mt-16 ">
        <Link :href="route('product.list')" :class="{'font-bold': $page.component === 'Index'}">Products</Link>
        <Link :href="route('create.product')" :class="{'font-bold': $page.component === 'Create'}">Create</Link>
    </div>
    <div>
        <form @submit.prevent="form.post(route('store.product'))">
            <div class="mt-4">
                <label for="brand">Brand:</label>
                <input id="brand" v-model="form.brand" />
                <div v-if="errors.brand" class="text-red-600">
                    {{ errors.title }}
                </div>
            </div>
            <div class="mt-4">
                <label for="producer">Producer:</label>
                <input id="producer" v-model="form.producer" />
                <div v-if="errors.producer" class="text-red-600">
                    {{ errors.producer }}
                </div>
            </div>
            <div class="mt-4">
                <label for="type">Type:</label>
                <input id="type" v-model="form.type" />
                <div v-if="errors.type" class="text-red-600">
                    {{ errors.type }}
                </div>
            </div>
            <div class="mt-4">
                <label for="title">Title:</label>
                <input id="title" v-model="form.title" />
                <div v-if="errors.title" class="text-red-600">
                    {{ errors.title }}
                </div>
            </div>
            <div class="mt-4">
                <label for="description">Description:</label>
                <input id="description" v-model="form.description" />
                <div v-if="errors.description" class="text-red-600">
                    {{ errors.description }}
                </div>
            </div>
            <div class="mt-4">
                <label for="weight">Weight:</label>
                <input id="weight" v-model="form.weight" />
                <div v-if="errors.weight" class="text-red-600">
                    {{ errors.weight }}
                </div>
            </div>
            <div class="mt-4">
                <label for="amount">Amount:</label>
                <input id="amount" v-model="form.amount" />
                <div v-if="errors.amount" class="text-red-600">
                    {{ errors.amount }}
                </div>
            </div>
            <div class="mt-4">
                <label for="price">Price:</label>
                <input id="price" v-model="form.price" />
                <div v-if="errors.price" class="text-red-600">
                    {{ errors.price }}
                </div>
            </div>
            <button type="submit">SUBMIT</button>
        </form>
    </div>
</template>
