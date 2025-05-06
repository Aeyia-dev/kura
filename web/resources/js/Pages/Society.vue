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
    <Head title="AEYIA - Society" />

    <!-- Main container -->
    <div class="relative min-h-screen overflow-auto">
        <!-- Background image -->
        <BackgroundImage imageName="desktop-background-02.jpg" :fixed="true" />

        <!-- Content Container -->
        <div class="relative z-20 flex flex-col min-h-screen">
            <!-- Header -->
            <SiteHeader
                logoType="text"
                logoText="society"
                :mobileMenuOpen="mobileMenuOpen"
                :canLogin="canLogin"
                :canRegister="canRegister"
                :authUser="$page.props.auth.user"
                @toggle-mobile-menu="toggleMobileMenu"
            />

            <!-- Mobile Menu -->
            <MobileMenu
                :isOpen="mobileMenuOpen"
                logoType="text"
                logoText="society"
                :canLogin="canLogin"
                :canRegister="canRegister"
                :authUser="$page.props.auth.user"
                @close="toggleMobileMenu"
            />

            <!-- Hero Section -->
            <section class="flex flex-col items-center min-h-[80vh] text-center px-4 py-8 relative">
                <div class="absolute bottom-14 md:bottom-20 left-0 right-0">
                    <h2 class="text-white text-4xl md:text-5xl lg:text-6xl font-semibold max-w-5xl mx-auto mb-8">
                        Small changes. Big transformations.
                    </h2>

                    <!-- Down arrow icon -->
                    <div class="mt-8">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white animate-bounce mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                        </svg>
                    </div>
                </div>
            </section>

            <!-- Main Content -->
            <main class="flex-grow mb-20">
                <!-- Mission Section -->
                <section class="bg-white py-12 px-4 md:px-8 lg:px-16">
                    <div class="max-w-5xl mx-auto">
                        <div class="mb-8">
                            <p class="text-gray-800 text-lg md:text-xl mb-6">
                                We believe that even the smallest changes can spark powerful
                                transformations. That's why our mission is to make transformative tools,
                                habits, insights, and support more accessible.
                            </p>

                            <p class="text-gray-800 text-lg md:text-xl mb-6">
                                Real change often begins with a single step - and everyone deserves the
                                chance to take it.
                            </p>

                            <p class="text-gray-700 text-sm md:text-base">
                                AEYIA™ Society is a DGRI registered charity committed to expanding access to educational tools, online
                                resources and support services for individuals experiencing hardship, social disadvantages, mental health
                                challenges and vulnerable life circumstances. This initiative is currently evolving and will be available soon.
                            </p>
                        </div>
                    </div>
                </section>

                <!-- Contact Section -->
                <section class="bg-white py-12 px-4 md:px-8 lg:px-16">
                    <div class="max-w-5xl mx-auto">
                        <div class="bg-[#e9e3db] bg-opacity-35 py-12 px-4 md:px-8 lg:px-16 rounded-[15px]">
                            <div class="flex flex-col md:flex-row justify-between">
                                <div class="mb-8 md:mb-0 ml-5">
                                    <h3 class="text-2xl md:text-3xl font-semibold mb-4">Contact us.</h3>
                                    <p class="text-gray-700 font-semibold">society@aeyia.com</p>
                                </div>

                                <div class="mr-16">
                                    <p class="text-gray-700 mb-2 font-semibold">ABN: 14628727542</p>
                                    <a href="#" class="text-gray-700 underline text-xs">See more information</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Newsletter Section -->
                <section class="bg-white py-12 px-4 md:px-8 lg:px-16">
                    <div class="max-w-5xl mx-auto">
                        <div class="flex flex-col md:flex-row items-center justify-between">
                            <div class="mb-16 md:mb-0">
                                <h3 class="text-2xl md:text-3xl font-semibold">Stay in the loop.</h3>
                            </div>

                            <div class="w-full md:w-auto">
                                <form @submit.prevent="submitForm" class="flex">
                                    <input
                                        v-model="email"
                                        type="email"
                                        placeholder="Email"
                                        class="py-3 px-5 border border-gray-300 rounded-l-full flex-grow text-sm md:text-base focus:outline-none"
                                    >
                                    <button
                                        type="submit"
                                        class="bg-black text-white rounded-r-full px-6 py-3 text-sm md:text-base font-medium whitespace-nowrap hover:bg-opacity-90 transition-colors duration-200"
                                    >
                                        Join Now
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </main>

            <!-- Footer -->
            <SiteFooter :style="'white'" />
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
    border-color: black !important;
    ring-width: 0 !important;
}
</style>
