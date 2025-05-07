<script setup>
/**
 * Email subscription form component with embedded button
 */
import { ref } from 'vue';

const props = defineProps({
    /**
     * Button text
     */
    buttonText: {
        type: String,
        default: 'Join Now'
    },
    /**
     * Email input placeholder text
     */
    placeholder: {
        type: String,
        default: 'Email'
    },
    /**
     * Color theme: 'light' for dark background, 'dark' for light background
     */
    theme: {
        type: String,
        default: 'light', // 'light' for white text/border on dark background, 'dark' for dark text/border on light background
        validator: (value) => ['light', 'dark'].includes(value)
    },
    /**
     * Whether to show an error state
     */
    hasError: {
        type: Boolean,
        default: false
    },
    /**
     * Maximum width of the form
     */
    maxWidth: {
        type: String,
        default: 'max-w-md'
    }
});

const emit = defineEmits(['submit']);

// Email input model
const email = ref('');

// Submit the form
const submitForm = () => {
    emit('submit', email.value);
};

// Get the color classes based on the theme
const getColorClasses = () => {
    if (props.theme === 'light') {
        return {
            border: props.hasError ? 'border-red-500' : 'border-white',
            text: props.hasError ? 'text-red-300' : 'text-white',
            placeholder: 'placeholder-styling-light',
            buttonBg: 'bg-white',
            buttonText: 'text-gray-900'
        };
    } else {
        return {
            border: props.hasError ? 'border-red-500' : 'border-gray-800',
            text: props.hasError ? 'text-red-600' : 'text-gray-800',
            placeholder: 'placeholder-styling-dark',
            buttonBg: 'bg-gray-800',
            buttonText: 'text-white'
        };
    }
};
</script>

<template>
    <div :class="['w-full', maxWidth, 'mx-auto']">
        <form @submit.prevent="submitForm"
              :class="['flex items-center border rounded-full overflow-hidden shadow-sm', getColorClasses().border]">
            <input
                v-model="email"
                type="email"
                :placeholder="placeholder"
                :class="[
                    'bg-transparent py-3.5 md:py-3 px-5 flex-grow outline-none border-none text-base md:text-base focus:ring-0 focus:outline-none',
                    getColorClasses().text,
                    getColorClasses().placeholder
                ]"
            >
            <div class="p-1 pr-1.5">
                <button
                    type="submit"
                    :class="[
                        'rounded-full px-6 py-3 text-base md:text-base font-medium whitespace-nowrap hover:bg-opacity-90 transition-colors duration-200',
                        getColorClasses().buttonBg,
                        getColorClasses().buttonText
                    ]"
                >
                    {{ buttonText }}
                </button>
            </div>
        </form>
    </div>
</template>

<style scoped>
/* Light theme placeholder (white text) */
.placeholder-styling-light::placeholder {
    color: rgba(255, 255, 255, 0.6);
    opacity: 1; /* Firefox */
}

/* Dark theme placeholder */
.placeholder-styling-dark::placeholder {
    color: rgba(0, 0, 0, 0.4);
    opacity: 1; /* Firefox */
}

/* Remove default focus styles */
input:focus,
button:focus {
    outline: none !important;
    box-shadow: none !important;
    ring-width: 0 !important;
}
</style>
