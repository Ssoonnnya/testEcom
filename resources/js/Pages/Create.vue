<script>

import { Link } from '@inertiajs/vue3';

export default {

    components: { Link }
}
</script>

<template>
    <Link href="products">Products</Link>
    <Link href="create" class="ml-2">Create</Link>
    <div class="mt-4">
        <h1 class="text-xl uppercase">Create page</h1>
    </div>
</template>
