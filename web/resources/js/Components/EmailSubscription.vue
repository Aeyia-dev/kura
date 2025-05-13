<script setup>
/**
 * Email subscription form component with embedded button
 * Enhanced to handle all email validation, submission logic, and modals internally
 */
import { ref } from 'vue';
import axios from 'axios';
import Modal from '@/Components/Modal.vue';

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

// Modal state
const showModal = ref(false);
const modalTitle = ref('');
const isSuccess = ref(false);

// Close the modal
const closeModal = () => {
    showModal.value = false;
};

// Submit the form
const submitForm = async () => {
    // Reset error state
    errorMessage.value = '';

    // Basic email validation
    if (!email.value || !email.value.includes('@')) {
        errorMessage.value = 'Please enter a valid email address.';
        modalTitle.value = 'Error';
        isSuccess.value = false;
        showModal.value = true;
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
                modalTitle.value = 'Thank You';
                successMessage.value = props.successMessage;
                errorMessage.value = ''; // Clear error message on success
                showModal.value = true;
                email.value = ''; // Clear the form on success
            }
        } else {
            // Handle restricted domain case separately
            if (response.data.restricted) {
                isSuccess.value = false;
                modalTitle.value = 'Registration Limited';
                errorMessage.value = response.data.message;
                showModal.value = true;
            } else {
                isSuccess.value = false;
                modalTitle.value = 'Error';
                errorMessage.value = response.data.message || 'An error occurred';
                showModal.value = true;
            }
        }
    } catch (error) {
        isSuccess.value = false;
        modalTitle.value = 'Error';
        errorMessage.value = error.response?.data?.message || 'Failed to subscribe';
        showModal.value = true;
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
            buttonText: 'text-gray-900'
        };
    } else {
        return {
            border: showError ? 'border-red-500' : 'border-gray-800',
            text: showError ? 'text-red-600' : 'text-gray-800',
            placeholder: 'placeholder-styling-dark',
            buttonBg: 'bg-gray-800',
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
                            'rounded-full px-3 sm:px-4 md:px-6 py-3 text-sm sm:text-base md:text-base font-medium whitespace-nowrap hover:bg-opacity-90 transition-colors duration-200',
                            getColorClasses().buttonBg,
                            getColorClasses().buttonText,
                            isSubmitting ? 'opacity-70 cursor-not-allowed' : ''
                        ]"
                    >
                        {{ isSubmitting ? 'Joining...' : buttonText }}
                    </button>
                </div>
            </form>
        </div>

        <!-- Notification Modal - Now included in the component -->
        <Modal :show="showModal" @close="closeModal" max-width="md">
            <div class="p-6">
                <div class="flex items-center mb-4">
                    <div :class="['rounded-full p-2 mr-3', isSuccess ? 'bg-green-100' : 'bg-red-100']">
                        <svg v-if="!isSuccess" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                        <svg v-else xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900">{{ modalTitle }}</h3>
                </div>
                <div class="mb-6">
                    <p class="text-gray-600">{{ isSuccess ? successMessage : errorMessage }}</p>
                </div>
                <div class="flex justify-end">
                    <button
                        @click="closeModal"
                        class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150"
                    >
                        Close
                    </button>
                </div>
            </div>
        </Modal>
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
