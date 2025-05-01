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
    <Head title="AEYIA - Elevate Well" />

    <!-- Authentication nav has been integrated into the hamburger menu for mobile and desktop nav -->

    <!-- Main container -->
    <div class="relative h-screen overflow-hidden">
        <!-- Background image -->
        <div class="absolute inset-0 z-0">
            <picture>
                <!-- Mobile version (WebP) -->
                <source
                    media="(max-width: 767px)"
                    srcset="/images/background/optimized/mobile/mobile-background-03.webp"
                    type="image/webp">

                <!-- Mobile version (JPG fallback) -->
                <source
                    media="(max-width: 767px)"
                    srcset="/images/background/optimized/mobile/mobile-background-03.jpg"
                    type="image/jpeg">

                <!-- Tablet version (WebP) -->
                <source
                    media="(max-width: 1199px)"
                    srcset="/images/background/optimized/tablet/tablet-background-03.webp"
                    type="image/webp">

                <!-- Tablet version (JPG fallback) -->
                <source
                    media="(max-width: 1199px)"
                    srcset="/images/background/optimized/tablet/tablet-background-03.jpg"
                    type="image/jpeg">

                <!-- Standard desktop version (WebP - 1920px resized) -->
                <source
                    media="(max-width: 1999px)"
                    srcset="/images/background/optimized/desktop-resized/desktop-background-03.webp"
                    type="image/webp">

                <!-- Large 4K desktop version (WebP - original) -->
                <source
                    srcset="/images/background/optimized/desktop/desktop-background-03.webp"
                    type="image/webp">

                <!-- Fallback image -->
                <img
                    src="/images/background/optimized/desktop/desktop-background-03.jpg"
                    alt="Background"
                    class="object-cover w-full h-full"
                    loading="eager">
            </picture>
        </div>

        <!-- Overlay for better text readability -->
        <div class="absolute inset-0 z-10 bg-black bg-opacity-20"></div>

        <!-- Content Container -->
        <div class="relative z-20 flex flex-col h-full">
            <!-- Header -->
            <header class="w-full p-4 md:p-6 lg:p-8">
                <div class="flex justify-between items-center">
                    <!-- Logo -->
                    <div class="w-40 md:w-64 lg:w-auto lg:max-w-md">
                        <img src="/images/landing/aeyia-logo-white.png" alt="AEYIA Logo" class="w-full">
                    </div>

                    <!-- Navigation Menu - Hidden on mobile, visible on tablet/desktop -->
                    <nav class="hidden md:flex items-start space-x-6 lg:space-x-8">
                        <a href="#" class="text-white text-2xl font-medium">society</a>
                        <a href="#" class="text-white text-2xl font-medium">about</a>
                        <a href="#" class="text-white text-2xl font-medium">contact</a>

                        <!-- Desktop Auth Navigation -->
                        <div v-if="canLogin" class="flex items-center space-x-4 mt-2">
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
                            <div class="w-40 md:w-64 lg:w-auto lg:max-w-md">
                                <img src="/images/landing/aeyia-logo-white.png" alt="AEYIA Logo" class="w-full">
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
                                <a href="#" @click="toggleMobileMenu" class="text-white text-3xl font-medium hover:text-white/80 transition-colors text-left">Home</a>
                                <a href="#" @click="toggleMobileMenu" class="text-white text-3xl font-medium hover:text-white/80 transition-colors text-left">About</a>
                                <a href="#" @click="toggleMobileMenu" class="text-white text-3xl font-medium hover:text-white/80 transition-colors text-left">Society</a>
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


                    <!-- Email Form -->
                    <div class="w-full max-w-md mx-auto">
                        <form @submit.prevent="submitForm" class="flex items-center border border-white rounded-full overflow-hidden shadow-sm" :class="{ 'border-red-500': !isFormValid }">
                            <input
                                v-model="email"
                                type="email"
                                placeholder="Email"
                                class="bg-transparent text-white py-3 px-5 flex-grow outline-none placeholder-styling border-none text-sm md:text-base focus:ring-0 focus:outline-none"
                                :class="{ 'text-red-300': !isFormValid }"
                            >
                            <div class="p-1 pr-1.5">
                                <button
                                    type="submit"
                                    class="bg-white text-gray-900 rounded-full px-6 py-3 text-sm md:text-base font-medium whitespace-nowrap hover:bg-opacity-90 transition-colors duration-200"
                                >
                                    Join Now
                                </button>
                            </div>
                        </form>
                        <!-- Error message inline display removed, now using modal instead -->
                    </div>

                </div>
            </main>

            <!-- Footer -->
            <footer class="w-full px-4 md:px-8 py-6 md:py-10">
                <!-- Mobile footer layout -->
                <div class="flex flex-col items-center md:hidden">
                    <!-- Social Media Icons -->
                    <div class="flex justify-center space-x-6 mb-4">
                        <a href="//www.facebook.com/aeyia.au" class="block">
                            <img src="/images/landing/social-facebook.png" alt="Facebook" class="w-8 h-8">
                        </a>
                        <a href="#" class="block">
                            <img src="/images/landing/social-instagram.png" alt="Instagram" class="w-8 h-8">
                        </a>
                        <a href="#" class="block">
                            <img src="/images/landing/social-youtube.png" alt="YouTube" class="w-8 h-8">
                        </a>
                    </div>

                    <!-- Copyright -->
                    <div class="mb-4">
                        <p class="text-white text-xs font-medium">
                            © AEYIA {{ new Date().getFullYear() }}
                        </p>
                    </div>

                    <!-- Legal Links -->
                    <div class="flex space-x-4">
                        <a href="#" class="text-white text-xs font-medium">Privacy Policy</a>
                        <span class="text-white">|</span>
                        <a href="#" class="text-white text-xs font-medium">Terms & Conditions</a>
                    </div>
                </div>

                <!-- Desktop/Tablet footer layout -->
                <div class="hidden md:block relative">
                    <div class="flex justify-between items-end">
                        <!-- Copyright -->
                        <div>
                            <p class="text-white text-xs font-medium">
                                © AEYIA {{ new Date().getFullYear() }}
                            </p>
                        </div>

                        <!-- Social Media Icons - Centered -->
                        <div class="absolute left-1/2 transform -translate-x-1/2 bottom-0 mb-6">
                            <div class="flex space-x-6">
                                <a href="//www.facebook.com/aeyia.au" class="block">
                                    <img src="/images/landing/social-facebook.png" alt="Facebook" class="w-8 h-8 md:w-10 md:h-10">
                                </a>
                                <a href="#" class="block">
                                    <img src="/images/landing/social-instagram.png" alt="Instagram" class="w-8 h-8 md:w-10 md:h-10">
                                </a>
                                <a href="#" class="block">
                                    <img src="/images/landing/social-youtube.png" alt="YouTube" class="w-8 h-8 md:w-10 md:h-10">
                                </a>
                            </div>
                        </div>

                        <!-- Legal Links - Vertical on right side -->
                        <div class="flex flex-col items-end space-y-8 absolute right-0 bottom-0 mr-4 mb-32">
                            <a href="#" class="text-white text-xs font-medium vertical-text">Privacy Policy</a>
                            <a href="#" class="text-white text-xs font-medium vertical-text">Terms & Conditions</a>
                        </div>
                    </div>
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
