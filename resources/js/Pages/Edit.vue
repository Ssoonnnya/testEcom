<script>
import { ref } from 'vue';
import { router, useForm } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';


export default {
    components: {
        Link
    },
    props: {
        errors: Object,
        product: Object
    },

    setup(props) {
        const form = useForm({
            id: props.product.id,
            brand: props.product.brand,
            producer: props.product.producer,
            type: props.product.type,
            title: props.product.title,
            description: props.product.description,
            weight: props.product.weight,
            amount: props.product.amount,
            price: props.product.price,
        });

        return { form };
    },

    methods: {
        submit() {
            this.form.post(route('product.update', { id: this.form.id }), {
                onSuccess: () => {
                },
            });
        }
    }
}
</script>

<template>
     <div class="tabe-products mt-8 ml-3">
        <Link :href="route('product.list')" :class="{'font-bold': $page.component === 'Index'}">Products</Link>
    </div>
    <div class="tabe-products mt-2 ml-3">
        <Link :href="route('create.product')" :class="{'font-bold': $page.component === 'Create'}">Create</Link>
    </div>
    <div class="flex justify-center items-center h-screen">
        <form @submit.prevent="form.post(route('product.update', {id: form.id }))" class="mt-6 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">

            <div>
                <input id="id" type="hidden" v-model="form.id" />
            </div>
            <div>
                <h1 class="flex justify-center items-center font-bold text-gray-500 uppercase">
                    Edit your product!
                </h1>
            </div>
            <div class="form-group row ml-3">
                <div class="col-md-6 mt-2">
                    <input id="brand" v-model="form.brand" placeholder="Brand" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                </div>
                <div v-if="errors.brand" class="text-red-600">
                    {{ errors.title }}
                </div>
            </div>
            <div class="form-group row ml-3">
                <div class="col-md-6 mt-2">
                    <input id="producer" v-model="form.producer" placeholder="Producer" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
                </div>
                <div v-if="errors.producer" class="text-red-600">
                    {{ errors.producer }}
                </div>
            </div>
            <div class="form-group row ml-3">
                <div class="col-md-6 mt-2">
                    <input id="type" v-model="form.type" placeholder="Type" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
                </div>
                <div v-if="errors.type" class="text-red-600">
                    {{ errors.type }}
                </div>
            </div>
            <div class="form-group row ml-3">
                <div class="col-md-6 mt-2">
                    <input id="title" v-model="form.title"  placeholder="Title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
                </div>
                <div v-if="errors.title" class="text-red-600">
                    {{ errors.title }}
                </div>
            </div>
            <div class="form-group row ml-3">
                <div class="col-md-6 mt-2">
                    <input id="description" v-model="form.description" placeholder="Description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
                </div>
                <div v-if="errors.description" class="text-red-600">
                    {{ errors.description }}
                </div>
            </div>
            <div class="form-group row ml-3">
                <div class="col-md-6 mt-2">
                    <input id="weight" v-model="form.weight" placeholder="Weight" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
                </div>
                <div v-if="errors.weight" class="text-red-600">
                    {{ errors.weight }}
                </div>
            </div>
            <div class="form-group row ml-3">
                <div class="col-md-6 mt-2">
                    <input id="amount" v-model="form.amount" placeholder="Amount" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
                </div>
                <div v-if="errors.amount" class="text-red-600">
                    {{ errors.amount }}
                </div>
            </div>
            <div class="form-group row ml-3">
                <div class="col-md-6 mt-2">
                    <input id="price" v-model="form.price" placeholder="Price" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
                </div>
                <div v-if="errors.price" class="text-red-600">
                    {{ errors.price }}
                </div>
            </div>

            <div class="form-group row ml-3">
                <label class="col-md-4 col-form-label text-md-right">Image:</label>
                <div class="col-md-6">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile"
                            name="file" ref="file" @change="handleFileObject()">
                    </div>
                </div>
            </div>
            <div class="mt-4 ml-4 flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">submit</button>
            </div>
        </form>
    </div>
</template>
