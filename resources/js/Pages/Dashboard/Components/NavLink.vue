<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/inertia-vue3';

const props = defineProps(['href', 'active']);

const classes = computed(() => props.active
    ? 'group relative active w-full p-4 text-indigo-600 flex text-center justify-center hover:bg-indigo-100'
    : 'group relative w-full p-4 text-indigo-600 flex text-center justify-center hover:bg-indigo-100'
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
