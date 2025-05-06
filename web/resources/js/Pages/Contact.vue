<script setup>
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import Modal from '@/Components/Modal.vue';

// Form handling and validation state
const form = ref({
    fullName: '',
    email: '',
    phone: '',
    message: ''
});
const errors = ref({});
const showSuccessModal = ref(false);

// Form validation
const validateForm = () => {
    errors.value = {};
    let isValid = true;

    if (!form.value.fullName.trim()) {
        errors.value.fullName = 'Full name is required';
        isValid = false;
    }

    if (!form.value.email.trim()) {
        errors.value.email = 'Email is required';
        isValid = false;
    } else if (!isValidEmail(form.value.email)) {
        errors.value.email = 'Please enter a valid email address';
        isValid = false;
    }

    if (!form.value.message.trim()) {
        errors.value.message = 'Message is required';
        isValid = false;
    }

    return isValid;
};

const isValidEmail = (email) => {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
};

// Form submission
const submitForm = () => {
    if (!validateForm()) {
        return;
    }

    // Show success modal
    showSuccessModal.value = true;
};

// Reset form after submission
const resetForm = () => {
    form.value = {
        fullName: '',
        email: '',
        phone: '',
        message: ''
    };
    errors.value = {};
};

const closeSuccessModal = () => {
    showSuccessModal.value = false;
    resetForm();
};

// Mobile menu state
const mobileMenuOpen = ref(false);
const toggleMobileMenu = () => {
    mobileMenuOpen.value = !mobileMenuOpen.value;
};
</script>

<template>
    <Head title="AEYIA - Contact Us" />

    <div class="flex flex-col md:flex-row h-screen">
        <!-- Left Side - Image (exactly 50%) -->
        <div class="hidden md:block w-1/2 h-full relative" style="width: 50%;">
            <!-- Background Image -->
            <img
                src="/images/background/optimized/desktop/desktop-background-04.jpg"
                alt="Background"
                class="w-full h-full object-cover"
            />

            <!-- Logo overlay -->
            <div class="absolute top-0 left-0 p-6 z-20">
                <img
                    src="/images/landing/aeyia-logo-white.png"
                    alt="AEYIA Logo"
                    style="display: block; height: 200px; width: auto; max-width: none;"
                />
            </div>
        </div>

        <!-- Right Side - Contact Form (exactly 50%) -->
        <div class="w-full md:w-1/2 flex flex-col bg-white" style="width: 50%;">
            <!-- Header Navigation -->
            <div class="w-full p-4 md:p-6 lg:p-8">
                <div class="flex justify-end items-center">
                    <!-- Logo -->
                    <div class="w-40 md:hidden">
                        <h1 class="text-gray-800 text-4xl font-bold">
                            aeyia
                        </h1>
                    </div>

                    <!-- Navigation Menu - Hidden on mobile, visible on tablet/desktop -->
                    <nav class="hidden md:flex items-center space-x-6 lg:space-x-8 md:ml-auto">
                        <a href="/society" class="text-gray-800 text-2xl font-medium">society</a>
                        <a href="/about" class="text-gray-800 text-2xl font-medium">about</a>
                        <a href="/contact" class="text-gray-800 text-2xl font-medium">contact</a>
                    </nav>

                    <!-- Mobile Menu Button - Only visible on mobile -->
                    <button
                        @click="toggleMobileMenu"
                        type="button"
                        class="md:hidden text-gray-800 p-2 focus:outline-none"
                    >
                        <svg v-if="!mobileMenuOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg v-else xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu Overlay -->
            <div v-if="mobileMenuOpen" class="fixed inset-0 bg-white z-50 p-6">
                <div class="flex justify-between items-center mb-10">
                    <div class="text-2xl font-bold text-gray-800">
                        aeyia
                    </div>
                    <button @click="toggleMobileMenu" class="p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <nav class="flex flex-col space-y-6 text-xl">
                    <a href="/society" class="text-gray-800 text-3xl font-medium hover:text-gray-600 transition-colors text-left">society</a>
                    <a href="/about" class="text-gray-800 text-3xl font-medium hover:text-gray-600 transition-colors text-left">about</a>
                    <a href="/contact" class="text-gray-800 text-3xl font-medium hover:text-gray-600 transition-colors text-left">contact</a>
                </nav>
            </div>

            <!-- Contact Form Area -->
            <div class="flex-grow flex flex-col px-6 md:px-10 py-6">
                <div class="mb-8">
                    <h1 class="text-3xl font-bold">Contact us.</h1>
                </div>

                <form @submit.prevent="submitForm" class="space-y-4 mb-8">
                    <!-- Full Name Field -->
                    <div>
                        <input
                            v-model="form.fullName"
                            type="text"
                            placeholder="Full Name"
                            class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none"
                        />
                    </div>

                    <!-- Email Field -->
                    <div>
                        <input
                            v-model="form.email"
                            type="email"
                            placeholder="Email"
                            class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none"
                        />
                    </div>

                    <!-- Phone Field -->
                    <div>
                        <input
                            v-model="form.phone"
                            type="tel"
                            placeholder="Phone"
                            class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none"
                        />
                    </div>

                    <!-- Message Field -->
                    <div>
                        <textarea
                            v-model="form.message"
                            placeholder="Message"
                            rows="5"
                            class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none resize-none"
                        ></textarea>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="flex space-x-4 pt-2">
                        <button
                            type="submit"
                            class="px-6 py-3 bg-black text-white font-medium rounded-full"
                        >
                            Send Message
                        </button>
                        <a
                            href="mailto:hello@aeyia.com"
                            class="px-6 py-3 bg-white text-black font-medium rounded-full border border-black"
                        >
                            Write Email
                        </a>
                    </div>
                </form>

                <!-- Contact Information -->
                <div class="mt-auto">
                    <p class="text-sm mb-2">hello@aeyia.com</p>
                    <p class="text-sm mb-2">6/7 Grevillea Street,<br/>Byron Bay, NSW, Australia</p>
                    <p class="text-sm mb-6">Charity Enquiries: society@aeyia.com</p>

                    <!-- Social Media Icons -->
                    <div class="flex space-x-4">
                        <a href="#" aria-label="Facebook" class="text-black hover:text-gray-600">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a href="#" aria-label="Instagram" class="text-black hover:text-gray-600">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a href="#" aria-label="YouTube" class="text-black hover:text-gray-600">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.376.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.376-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <Modal :show="showSuccessModal" @close="closeSuccessModal" max-width="md">
        <div class="p-6">
            <div class="flex items-center mb-4">
                <div class="rounded-full bg-green-100 p-2 mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-900">Message Sent</h3>
            </div>
            <div class="mb-6">
                <p class="text-gray-600">Thank you for your message. We will get back to you soon.</p>
            </div>
            <div class="flex justify-end">
                <button
                    @click="closeSuccessModal"
                    class="inline-flex items-center px-4 py-2 bg-black text-white rounded-md font-semibold text-xs uppercase tracking-widest"
                >
                    Close
                </button>
            </div>
        </div>
    </Modal>
</template>

<style scoped>
/* Form-specific styles */
input:focus,
textarea:focus,
button:focus {
    outline: none !important;
    box-shadow: none !important;
    border-color: black !important;
    ring-width: 0 !important;
}
</style>
