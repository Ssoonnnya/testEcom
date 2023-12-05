<script>
import { router, useForm } from '@inertiajs/vue3'
import { Link } from '@inertiajs/vue3';
import axios from 'axios'

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
            file: '',
        })

        return { form }
    },
    methods: {
    submit() {
        this.errors = null;

        let formData = new FormData();
        formData.append('file', this.form.file);

        _.each(this.form, (value, key) => {
            formData.append(key, value);
        });

        axios.post('/create', formData, {
            headers: {
                'Content-Type': "multipart/form-data; charset=utf-8; boundary=" + Math.random().toString().substr(2)
            }
        }).then(response => {
            this.showForm = false;
            this.user = response.data.data;
            }).catch(err => {
                if (err.response.status === 422) {
                    this.errors = [];
                    _.each(err.response.data.errors, error => {
                        _.each(error, e => {
                            this.errors.push(e);
                        });
                    });
                }
            });
        },
        handleFileObject() {
            this.form.file = this.$refs.file.files[0];
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
            <form @submit.prevent="form.post(route('store.product'))" enctype="multipart/form-data" class="mt-6 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div>
                <h1 class="flex justify-center items-center font-bold text-gray-500 uppercase">
                    Create a new product!
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
