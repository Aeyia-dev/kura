<script setup>
import { onMounted, ref } from 'vue';

defineProps({
    modelValue: String,
});

defineEmits(['update:modelValue']);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <input
        ref="input"
        class="bg-transparent border border-white/50 focus:border-white focus:ring-white/30 rounded-full shadow-sm w-full px-4 py-3 text-gray-400"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
    >
</template>
