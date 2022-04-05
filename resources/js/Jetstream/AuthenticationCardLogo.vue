<template>
    <Link :href="route('home')">
        <img src="../../../public/images/learn2gether-logo.png" alt="Learn2Gether"
             class="w-32 h-32">
    </Link>
</template>

<script>
    import { defineComponent } from 'vue'
    import { Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        components: {
            Link,
        },
    })
</script>
