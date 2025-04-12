<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="type" class="inline-flex items-center px-6 py-3 bg-white text-gray-900 border border-transparent rounded-full font-medium text-sm tracking-wide hover:bg-opacity-90 focus:outline-none disabled:opacity-50 transition-colors duration-200">
        <slot />
    </button>
</template>
