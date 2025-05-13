<script setup>
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import Modal from '@/Components/Modal.vue';
import SocialIcons from '@/Components/SocialIcons.vue';
import BackgroundImage from '@/Components/BackgroundImage.vue';
import SiteFooter from '@/Components/SiteFooter.vue';
import MobileMenu from '@/Components/MobileMenu.vue';

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
const submitForm = async () => {
    if (!validateForm()) {
        return;
    }

    try {
        // In Inertia/Laravel applications, Axios is pre-configured with CSRF protection
        // Import axios from bootstrap.js which is already configured with CSRF
        const axios = window.axios;

        const response = await axios.post('/api/contact', {
            fullName: form.value.fullName,
            email: form.value.email,
            phone: form.value.phone,
            message: form.value.message
        });

        const data = response.data;

        if (data.success) {
            // Show success modal
            showSuccessModal.value = true;
        } else {
            // Handle error response
            errors.value.submit = data.message || 'Failed to submit form. Please try again.';
        }
    } catch (error) {
        console.error('Error submitting form:', error);
        errors.value.submit = error.response?.data?.message || 'An error occurred. Please try again later.';
    }
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
    <div class="md:hidden">
        <BackgroundImage imageName="desktop-background-04.jpg" :fixed="true" :offsetPx="900" />
    </div>

    <div class="flex flex-col md:flex-row h-screen">
        <div class="hidden md:block w-1/2 h-full relative">
            <!-- Background Image -->
            <img
                src="/images/background/optimized/desktop/desktop-background-04.jpg"
                alt="Background"
                class="w-full h-full object-cover"
            />
        </div>

        <!-- Right Side - Contact Form  -->
        <div class="w-full md:w-1/2 flex flex-col z-10" >
            <!-- Header Navigation -->
            <div class="w-full p-4 md:p-6 lg:p-8">
                <div class="flex justify-end items-center">
                <!-- Logo overlay -->
                <div class="hidden md:block absolute top-0 left-0 p-6 z-20">
                    <a href="/holding">
                        <img
                            src="/images/landing/aeyia-logo-white.png"
                            alt="AEYIA Logo"
                            style="display: block; height: 200px; width: auto; max-width: none;"
                        />
                    </a>
                </div>
                <div class="md:hidden">
                    <a href="/holding">
                        <img
                            src="/images/aeyia-logo.png"
                            alt="AEYIA Logo"
                            style="display: block; width: 100%; max-width: none;"
                        />
                    </a>
                </div>

                    <!-- Navigation Menu - Hidden on mobile, visible on tablet/desktop -->
                    <nav class="hidden md:flex items-center space-x-6 lg:space-x-8 md:ml-auto  mt-10">
                        <a href="/society" class="text-charcoal text-2xl font-medium">society</a>
                        <a href="/about" class="text-charcoal text-2xl font-medium">about</a>
                        <a href="/contact" class="text-charcoal text-2xl font-medium">contact</a>
                    </nav>

                    <!-- Mobile Menu Button - Only visible on mobile -->
                    <button
                        @click="toggleMobileMenu"
                        type="button"
                        class="md:hidden text-charcoal p-2 focus:outline-none"
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

            <!-- Mobile Menu Component -->
            <MobileMenu
                :isOpen="mobileMenuOpen"
                logoType="text"
                logoText="aeyia"
                :showMenuLinks="true"
                :canLogin="false"
                :canRegister="false"
                :authUser="null"
                @close="toggleMobileMenu"
            />

            <!-- Contact Form Area -->
            <div class="flex-grow flex flex-col px-6 md:px-10">
                <div class="mb-8">
                    <h1 class="text-3xl font-bold">Contact us.</h1>
                </div>

                <form @submit.prevent="submitForm" class="space-y-6 mb-8">
                    <!-- Full Name Field -->
                    <div>
                        <input
                            v-model="form.fullName"
                            type="text"
                            placeholder="Full Name"
                            class="w-full px-4 border border-charcoal text-charcoal rounded-lg focus:outline-none"
                        />
                    </div>

                    <!-- Email Field -->
                    <div>
                        <input
                            v-model="form.email"
                            type="email"
                            placeholder="Email"
                            class="w-full px-4 py-3 border border-charcoal text-charcoal rounded-lg focus:outline-none"
                        />
                    </div>

                    <!-- Phone Field -->
                    <div>
                        <input
                            v-model="form.phone"
                            type="tel"
                            placeholder="Phone"
                            class="w-full px-4 py-3 border border-charcoal text-charcoal rounded-lg focus:outline-none"
                        />
                    </div>

                    <!-- Message Field -->
                    <div>
                        <textarea
                            v-model="form.message"
                            placeholder="Message"
                            rows="5"
                            class="w-full px-4 py-3 border border-charcoal text-charcoal rounded-lg focus:outline-none resize-none"
                        ></textarea>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="flex space-x-4 pt-2">
                        <button
                            type="submit"
                            class="px-6 py-3 bg-charcoal text-white font-medium rounded-lg"
                        >
                            Send Message
                        </button>
                        <a
                            href="mailto:hello@aeyia.com"
                            class="px-6 py-3 bg-white text-charcoal font-medium rounded-lg border border-charcoal"
                        >
                            Write Email
                        </a>
                    </div>

                    <!-- Form submission error -->
                    <div v-if="errors.submit" class="mt-2 text-red-600 text-sm">
                        {{ errors.submit }}
                    </div>
                </form>

                <!-- Contact Information -->
                <div class="mt-5">
                    <p class="text-sm font-semibold mb-2"><a href="mailto:hello@aeyia.com">hello@aeyia.com</a></p>
                    <p class="text-sm font-semibold mb-2">6/7 Grevillea Street,<br/>Byron Bay, NSW, Australia</p>
                    <p class="text-sm font-semibold mb-6">Charity Enquiries: <a href="mailto:society@aeyia.com">society@aeyia.com</a></p>
                </div>

                <!-- Social Media Icons -->
                <div class="hidden md:block pt-24"><SiteFooter :style="'white'" position="sticky" /></div>

                <div class="md:hidden">
                    <!-- Spacer to push footer down -->
                    <div class="py-56"></div>
                    <SiteFooter position="sticky" />
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
                    class="inline-flex items-center px-4 py-2 bg-charcoal text-white rounded-lg font-semibold text-xs uppercase tracking-widest"
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
    border-color: #212026 !important;
    ring-width: 0 !important;
}
/* Add this CSS to your stylesheet */
input::placeholder {
  color: #333333; /* Darker color for placeholder text */
  opacity: 1; /* Full opacity */
}

/* For older browsers that use different vendor prefixes */
::-webkit-input-placeholder { color: #333333; }  /* Chrome/Safari/Opera */
::-moz-placeholder { color: #333333; }           /* Firefox */
:-ms-input-placeholder { color: #333333; }       /* Internet Explorer */
</style>
