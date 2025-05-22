<script setup>
/**
 * Email subscription form component with embedded button
 * Enhanced to handle all email validation, submission logic, and modals internally
 */
import { ref } from 'vue';
import axios from 'axios';

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
     * Maximum width of the form
     */
    maxWidth: {
        type: String,
        default: 'max-w-md'
    },
    /**
     * Horizontal alignment (mx-auto, ml-auto, mr-auto)
     */
    align: {
        type: String,
        default: 'mx-auto',
        validator: (value) => ['mx-auto', 'ml-auto', 'mr-auto'].includes(value)
    },
    /**
     * Whether to validate against specific domains (e.g. aeyia.com for beta)
     * Only used for registration paths, not general newsletter subscriptions
     */
    validateDomain: {
        type: Boolean,
        default: false
    },
    /**
     * List source for Klaviyo (default or society)
     */
    listSource: {
        type: String,
        default: '' // Empty means auto-detect based on URL
    },
    /**
     * Success message to show in modal
     */
    successMessage: {
        type: String,
        default: 'Thank you for subscribing!'
    }
});

// No longer need to emit most events as modal handling is internal
const emit = defineEmits(['redirect']);

// Email input model
const email = ref('');
const isSubmitting = ref(false);
const errorMessage = ref('');
const successMessage = ref('');

// Message state - replacing modal functionality
const isSuccess = ref(false);

// Submit the form
const submitForm = async () => {
    // Reset error state
    errorMessage.value = '';

    // Basic email validation
    if (!email.value || !email.value.includes('@')) {
        errorMessage.value = 'Please enter a valid email address.';
        isSuccess.value = false;
        return;
    }

    try {
        isSubmitting.value = true;

        // Determine the list source - either from props or auto-detect
        let list = props.listSource;
        if (!list) {
            // Auto-detect based on URL if not specified
            list = window.location.pathname.includes('/society') ? 'society' : 'default';
        }

        // Send the subscription request to our Laravel backend
        const response = await axios.post('/api/subscribe', {
            email: email.value,
            list: list,
            validate_domain: props.validateDomain
        });

        // Handle response based on what we got back
        if (response.data.success) {
            // Check if this is a redirect response (for domain validation)
            if (response.data.redirect) {
                emit('redirect', response.data.redirect);
                window.location.href = response.data.redirect;
            } else {
                // Normal success
                isSuccess.value = true;
                successMessage.value = props.successMessage;
                errorMessage.value = ''; // Clear error message on success
                email.value = ''; // Clear the form on success
            }
        } else {
            // Handle restricted domain case separately
            if (response.data.restricted) {
                isSuccess.value = false;
                errorMessage.value = response.data.message;
            } else {
                isSuccess.value = false;
                errorMessage.value = response.data.message || 'An error occurred';
            }
        }
    } catch (error) {
        isSuccess.value = false;
        errorMessage.value = error.response?.data?.message || 'Failed to subscribe';
    } finally {
        isSubmitting.value = false;
    }
};

// Get the color classes based on the theme
const getColorClasses = () => {
    // Only show error styling when there's an error message AND we're not in a success state
    const showError = errorMessage.value && !isSuccess.value;

    if (props.theme === 'light') {
        return {
            border: showError ? 'border-red-500' : 'border-white',
            text: showError ? 'text-red-300' : 'text-white',
            placeholder: 'placeholder-styling-light',
            buttonBg: 'bg-white',
            buttonText: 'text-charcoal'
        };
    } else {
        return {
            border: showError ? 'border-red-500' : 'border-gray-800',
            text: showError ? 'text-red-600' : 'text-gray-800',
            placeholder: 'placeholder-styling-dark',
            buttonBg: 'bg-charcoal',
            buttonText: 'text-white'
        };
    }
};
</script>

<template>
    <div>
        <div :class="['w-full', maxWidth, align]">
            <form @submit.prevent="submitForm"
                :class="['flex items-center border rounded-full overflow-hidden shadow-sm', getColorClasses().border]">
                <input
                    v-model="email"
                    type="email"
                    :placeholder="placeholder"
                    :class="[
                        'bg-transparent py-3.5 md:py-3 px-3 sm:px-4 md:px-5 flex-grow outline-none border-none text-base md:text-base focus:ring-0 focus:outline-none',
                        getColorClasses().text,
                        getColorClasses().placeholder
                    ]"
                >
                <div class="p-1 pr-1">
                    <button
                        type="submit"
                        :disabled="isSubmitting"
                        :class="[
                            'rounded-full px-3 sm:px-4 md:px-6 py-3 text-sm sm:text-base md:text-base font-medium whitespace-nowrap hover:bg-opacity-40 transition-colors duration-200',
                            getColorClasses().buttonBg,
                            getColorClasses().buttonText,
                            isSubmitting ? 'opacity-70 cursor-not-allowed' : ''
                        ]"
                    >
                        {{ isSubmitting ? 'Joining...' : buttonText }}
                    </button>
                </div>
            </form>

            <!-- Message area below the form - replaces the modal -->
            <div v-if="isSuccess || errorMessage" class="ml-6 mt-2 text-left">
                <p v-if="isSuccess"
                :class="[
                'text-sm',
                getColorClasses().text
                ]"
                >
                    {{ successMessage }}
                </p>
                <p v-if="errorMessage && !isSuccess" class="text-sm text-red-600">{{ errorMessage }}</p>
            </div>
        </div>
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
