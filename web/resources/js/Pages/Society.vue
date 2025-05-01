<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';
import Modal from '@/Components/Modal.vue';

defineProps({
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
    console.log('Mobile menu toggled:', mobileMenuOpen.value); // Debug log
};
</script>

<template>
    <Head title="AEYIA - Society" />

    <!-- Authentication nav has been integrated into the hamburger menu for mobile and desktop nav -->

    <!-- Main container -->
    <div class="relative min-h-screen overflow-auto">
        <!-- Background image -->
        <div class="absolute inset-0 z-0">
            <picture>
                <!-- Mobile version (WebP) -->
                <source
                    media="(max-width: 767px)"
                    srcset="/images/background/optimized/mobile/mobile-background-02.webp"
                    type="image/webp">

                <!-- Mobile version (JPG fallback) -->
                <source
                    media="(max-width: 767px)"
                    srcset="/images/background/optimized/mobile/mobile-background-02.jpg"
                    type="image/jpeg">

                <!-- Tablet version (WebP) -->
                <source
                    media="(max-width: 1199px)"
                    srcset="/images/background/optimized/tablet/tablet-background-02.webp"
                    type="image/webp">

                <!-- Tablet version (JPG fallback) -->
                <source
                    media="(max-width: 1199px)"
                    srcset="/images/background/optimized/tablet/tablet-background-02.jpg"
                    type="image/jpeg">

                <!-- Standard desktop version (WebP - 1920px resized) -->
                <source
                    media="(max-width: 1999px)"
                    srcset="/images/background/optimized/desktop-resized/desktop-background-02.webp"
                    type="image/webp">

                <!-- Large 4K desktop version (WebP - original) -->
                <source
                    srcset="/images/background/optimized/desktop/desktop-background-02.webp"
                    type="image/webp">

                <!-- Fallback image -->
                <img
                    src="/images/background/optimized/desktop/desktop-background-02.jpg"
                    alt="Background"
                    class="object-cover w-full h-full fixed"
                    loading="eager">
            </picture>
        </div>

        <!-- Overlay for better text readability -->
        <div class="absolute inset-0 z-10 bg-black bg-opacity-20"></div>

        <!-- Content Container -->
        <div class="relative z-20 flex flex-col min-h-screen">
            <!-- Header -->
            <header class="w-full p-4 md:p-6 lg:p-8">
                <div class="flex justify-between items-center">
                    <!-- Logo - Using "society" text logo as shown in design -->
                    <div class="w-40 md:w-64">
                        <h1 class="text-white text-4xl md:text-5xl font-bold">society</h1>
                    </div>

                    <!-- Navigation Menu - Hidden on mobile, visible on tablet/desktop -->
                    <nav class="hidden md:flex items-start space-x-6 lg:space-x-8">
                        <a href="#" class="text-white text-xl font-medium">society</a>
                        <a href="#" class="text-white text-xl font-medium">about</a>
                        <a href="#" class="text-white text-xl font-medium">contact</a>

                        <!-- Desktop Auth Navigation -->
                        <div v-if="canLogin" class="flex items-center space-x-4 mt-1">
                            <template v-if="$page.props.auth.user">
                                <Link :href="route('dashboard')" class="text-white bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full text-sm hover:bg-white/40 transition-colors duration-200">
                                    Dashboard
                                </Link>
                            </template>
                            <template v-else>
                                <Link :href="route('login')" class="text-white hover:bg-white/20 px-4 py-2 rounded-full text-sm transition-colors duration-200">
                                    Log in
                                </Link>
                                <Link v-if="canRegister" :href="route('register')" class="text-white bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full text-sm hover:bg-white/40 transition-colors duration-200">
                                    Register
                                </Link>
                            </template>
                        </div>
                    </nav>

                    <!-- Mobile Menu Button - Only visible on mobile -->
                    <button
                        @click="toggleMobileMenu"
                        type="button"
                        class="md:hidden text-white p-2 focus:outline-none"
                    >
                        <svg v-if="!mobileMenuOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg v-else xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>

                    <!-- Mobile Menu - Full Screen -->
                    <div
                        v-if="mobileMenuOpen"
                        class="fixed inset-0 bg-black z-50 flex flex-col"
                    >
                        <!-- Close button -->
                        <div class="p-4 md:p-6 lg:p-8 flex justify-between items-center">
                            <div class="w-40 md:w-64">
                                <h1 class="text-white text-4xl md:text-5xl font-bold">society</h1>
                            </div>
                            <button
                                @click="toggleMobileMenu"
                                type="button"
                                class="text-white p-2 focus:outline-none z-50 relative"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <!-- Navigation links in page -->
                        <div class="flex justify-center items-center h-full -mt-20">
                            <nav class="flex flex-col space-y-10 w-36">
                                <a href="#" @click="toggleMobileMenu" class="text-white text-3xl font-medium hover:text-white/80 transition-colors text-left">Society</a>
                                <a href="#" @click="toggleMobileMenu" class="text-white text-3xl font-medium hover:text-white/80 transition-colors text-left">About</a>
                                <a href="#" @click="toggleMobileMenu" class="text-white text-3xl font-medium hover:text-white/80 transition-colors text-left">Contact</a>

                                <!-- Auth Navigation -->
                                <div v-if="canLogin" class="pt-6 flex flex-col space-y-10">
                                    <div v-if="$page.props.auth.user">
                                        <Link :href="route('dashboard')" @click="toggleMobileMenu" class="text-white text-3xl font-medium hover:text-white/80 transition-colors text-left">
                                            Dashboard
                                        </Link>
                                    </div>
                                    <div v-else class="flex flex-col space-y-10">
                                        <Link :href="route('login')" @click="toggleMobileMenu" class="text-white text-3xl font-medium hover:text-white/80 transition-colors text-left">
                                            Log in
                                        </Link>
                                        <Link v-if="canRegister" :href="route('register')" @click="toggleMobileMenu" class="text-white text-3xl font-medium hover:text-white/80 transition-colors text-left">
                                            Register
                                        </Link>
                                    </div>
                                </div>
                            </nav>
                        </div>

                        <!-- Footer social icons -->
                        <div class="p-6 flex justify-center">
                            <div class="flex space-x-6">
                                <a href="//www.facebook.com/aeyia.au" class="block">
                                    <img src="/images/landing/social-facebook.png" alt="Facebook" class="w-10 h-10">
                                </a>
                                <a href="#" class="block">
                                    <img src="/images/landing/social-instagram.png" alt="Instagram" class="w-10 h-10">
                                </a>
                                <a href="#" class="block">
                                    <img src="/images/landing/social-youtube.png" alt="YouTube" class="w-10 h-10">
                                </a>
                            </div>
                        </div>

                        <!-- Copyright -->
                        <div class="pb-8 text-center">
                            <p class="text-white text-sm font-medium">
                                © AEYIA {{ new Date().getFullYear() }}
                            </p>
                        </div>
                    </div>
                </div>
            </header>

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
            <main class="flex-grow">
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
                                Real change often begins with a single step—and everyone deserves the
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
                <section class="bg-gray-100 py-12 px-4 md:px-8 lg:px-16">
                    <div class="max-w-5xl mx-auto">
                        <div class="flex flex-col md:flex-row justify-between">
                            <div class="mb-8 md:mb-0">
                                <h3 class="text-2xl md:text-3xl font-semibold mb-4">Contact us.</h3>
                                <p class="text-gray-700">society@aeyia.com</p>
                            </div>

                            <div>
                                <p class="text-gray-700 mb-2">ABN: 14628727542</p>
                                <a href="#" class="text-gray-700 underline">See more information</a>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Newsletter Section -->
                <section class="bg-white py-12 px-4 md:px-8 lg:px-16">
                    <div class="max-w-5xl mx-auto">
                        <div class="flex flex-col md:flex-row items-center justify-between">
                            <div class="mb-6 md:mb-0">
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
            <footer class="bg-white w-full py-6 md:py-10 text-center">
                <!-- Social Media Links -->
                <div class="flex justify-center space-x-6 mb-6">
                    <a href="//www.facebook.com/aeyia.au" class="block">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/>
                        </svg>
                    </a>
                    <a href="#" class="block">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                    </a>
                    <a href="#" class="block">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/>
                        </svg>
                    </a>
                </div>

                <!-- Copyright -->
                <div class="mb-2">
                    <p class="text-gray-700 text-xs">
                        © AEYIA {{ new Date().getFullYear() }}
                    </p>
                </div>

                <!-- Terms Links -->
                <div class="flex justify-center space-x-4">
                    <a href="#" class="text-gray-700 text-xs">Terms & Conditions</a>
                    <span class="text-gray-700">|</span>
                    <a href="#" class="text-gray-700 text-xs">Privacy</a>
                </div>
            </footer>
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
.vertical-text {
    writing-mode: vertical-rl;
    transform: rotate(180deg);
    white-space: nowrap;
}

.placeholder-styling::placeholder {
    color: rgba(255, 255, 255, 0.6);
    opacity: 1; /* Firefox */
}

/* Remove default blue focus border/ring */
input:focus,
button:focus {
    outline: none !important;
    box-shadow: none !important;
    border-color: white !important;
    ring-width: 0 !important;
}

/* Mobile menu animation */
[v-show] {
    transition: opacity 0.3s, transform 0.3s;
}

[v-show="false"] {
    opacity: 0;
    transform: translateY(-10px);
    pointer-events: none;
}

[v-show="true"] {
    opacity: 1;
    transform: translateY(0);
}
</style>
