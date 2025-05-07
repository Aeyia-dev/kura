<script setup>
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import Modal from '@/Components/Modal.vue';
import SiteHeader from '@/Components/SiteHeader.vue';
import SiteFooter from '@/Components/SiteFooter.vue';
import MobileMenu from '@/Components/MobileMenu.vue';
import BackgroundImage from '@/Components/BackgroundImage.vue';
import EmailSubscription from '@/Components/EmailSubscription.vue';

// Props passed from controller
const props = defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
});

// Form handling and modal state
const email = ref('');
const errorMessage = ref('');
const isFormValid = ref(true);
const showErrorModal = ref(false);
const imageName = ref('desktop-background-01-with-bar.jpg')

const resetForm = () => {
    email.value = '';
    errorMessage.value = '';
    isFormValid.value = true;
    showErrorModal.value = false;
};

const closeErrorModal = () => {
    showErrorModal.value = false;
    resetForm();
};

const submitForm = () => {
    // Reset validation state
    errorMessage.value = '';
    isFormValid.value = true;
    showErrorModal.value = false;

    // Basic email validation
    if (!email.value || !email.value.includes('@')) {
        errorMessage.value = 'Please enter a valid email address.';
        isFormValid.value = false;
        return;
    }

    // Extract the domain from the email
    const emailParts = email.value.split('@');
    const domain = emailParts[1].toLowerCase();

    // Check if it's an aeyia.com email
    if (domain === 'aeyia.com') {
        // Redirect to registration page with email pre-populated
        window.location.href = `/register?email=${encodeURIComponent(email.value)}`;
    } else {
        // Show validation message for closed beta in a popup
        errorMessage.value = 'We are in closed Beta: Registration is only available with an aeyia.com email address.';
        isFormValid.value = false;
        showErrorModal.value = true;
    }
};

// Mobile menu state
const mobileMenuOpen = ref(false);
const toggleMobileMenu = () => {
    mobileMenuOpen.value = !mobileMenuOpen.value;
};
</script>

<template>
    <Head title="AEYIA - About Us" />

    <!-- Main container -->
    <div class="relative h-screen overflow-hidden bg-[#212026]">
        <!-- Background image with CharcoalAeyia background color -->
        <div class="hidden md:block">
            <BackgroundImage imageName="desktop-background-01-with-bar.jpg" :fixed="true" :offsetPx="-280" backgroundColor="bg-[#212026]" />
        </div>
        <div class="md:hidden">
            <BackgroundImage imageName="desktop-background-01.jpg" :fixed="true" :offsetPx="680" />
        </div>

        <!-- No need for global overlay with the BackgroundImage60 component -->

        <!-- Content Container -->
        <div class="relative z-20 flex flex-col h-full">
            <!-- Header -->
            <SiteHeader
                logoType="image"
                logoImagePath="/images/landing/aeyia-logo-white.png"
                :mobileMenuOpen="mobileMenuOpen"
                :canLogin="canLogin"
                :canRegister="canRegister"
                :authUser="$page.props.auth.user"
                @toggle-mobile-menu="toggleMobileMenu"
            />

            <!-- Mobile Menu -->
            <MobileMenu
                :isOpen="mobileMenuOpen"
                logoType="image"
                logoImagePath="/images/landing/aeyia-logo-white.png"
                :canLogin="canLogin"
                :canRegister="canRegister"
                :authUser="$page.props.auth.user"
                @close="toggleMobileMenu"
            />

            <!-- Hero Section -->
            <section class="flex-grow px-6 md:px-12 lg:px-20 pt-2 md:pt-2 lg:pt-2 flex flex-col lg:items-start">
                <!-- Centered column with left-aligned text -->
                <div class="w-full max-w-2xl mx-auto lg:mx-0 lg:ml-[40%]">
                    <div class="text-left">
                        <h1 class="text-white text-4xl lg:text-5xl mb-8">
                            AEYIA™ is a global wellness company reimagining human potentiality and wellbeing by connecting insights, people, and transformative experiences.
                        </h1>

                        <p class="text-white text-2xl font-medium mt-8 mb-24">
                            Elevated wellness™ –
                             <br class="sm:hidden">launching soon.
                        </p>

                        <!-- Email Form -->
                        <EmailSubscription
                            :has-error="!isFormValid"
                            theme="light"
                            button-text="Join Now"
                            placeholder="Email"
                            max-width="max-w-md"
                            align="mr-auto"
                            @submit="(value) => {
                                email = value;
                                submitForm();
                            }"
                        />

                    </div>
                </div>
            </section>

            <!-- Footer with transparent background -->
            <SiteFooter white />
        </div>
    </div>

    <!-- Error Modal -->
    <Modal :show="showErrorModal" @close="closeErrorModal" max-width="md">
        <div class="p-6">
            <div class="flex items-center mb-4">
                <div class="rounded-full bg-red-100 p-2 mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-900">Registration Limited</h3>
            </div>
            <div class="mb-6">
                <p class="text-gray-600">{{ errorMessage }}</p>
            </div>
            <div class="flex justify-end">
                <button
                    @click="closeErrorModal"
                    class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150"
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
button:focus {
    outline: none !important;
    box-shadow: none !important;
    border-color: white !important;
    ring-width: 0 !important;
}

/* Responsive adjustments for mobile */
@media (max-width: 768px) {
    .hero-content {
        width: 100%;
        padding: 0 1rem;
    }
}
</style>
