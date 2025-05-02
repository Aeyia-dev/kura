<script setup>
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import Modal from '@/Components/Modal.vue';
import SiteHeader from '@/Components/SiteHeader.vue';
import SiteFooter from '@/Components/SiteFooter.vue';
import MobileMenu from '@/Components/MobileMenu.vue';
import BackgroundImage from '@/Components/BackgroundImage.vue';

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
    <Head title="AEYIA - Elevate Well" />

    <!-- Main container -->
    <div class="relative h-screen overflow-hidden">
        <!-- Background image -->
        <BackgroundImage imageNumber="03" :fixed="false" />

        <!-- Overlay for better text readability -->
        <div class="absolute inset-0 z-10 bg-black bg-opacity-20"></div>

        <!-- Content Container -->
        <div class="relative z-20 flex flex-col h-full">
            <!-- Header -->
            <SiteHeader 
                logoType="image" 
                logoImagePath="/images/landing/aeyia-logo-white.png" 
                :mobileMenuOpen="mobileMenuOpen"
                :showMenuLinks="false"
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
                :showMenuLinks="false"
                :canLogin="canLogin"
                :canRegister="canRegister"
                :authUser="$page.props.auth.user"
                @close="toggleMobileMenu"
            />

            <!-- Main Content - Centered -->
            <main class="flex-grow flex flex-col justify-center items-center text-center px-4">
                <div class="max-w-4xl mx-auto">
                    <!-- Main Headline -->
                    <h1 class="text-white text-4xl md:text-5xl lg:text-6xl font-semibold tracking-tight mb-3 md:mb-4">
                        Elevate well.<span class="text-2xl md:text-3xl lg:text-4xl align-top">™</span>
                    </h1>

                    <!-- Subtitle -->
                    <p class="text-white text-lg md:text-xl lg:text-2xl font-medium leading-snug mb-8 md:mb-10 mx-auto max-w-2xl">
                        Coming soon — we're excited to share what we've been working on.
                    </p>
                </div>
            </main>

            <!-- Footer -->
            <SiteFooter style="transparent" />
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
</style>