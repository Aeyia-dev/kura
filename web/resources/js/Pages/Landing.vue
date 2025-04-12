<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
});

// Form handling
const email = ref('');
const submitForm = () => {
    // Form submission logic will be implemented when needed
    console.log('Form submitted with email:', email.value);
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
            <img src="/images/landing/background.png" alt="Background" class="object-cover w-full h-full">
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
                    <nav class="hidden md:flex items-center space-x-6 lg:space-x-8">
                        <a href="#" class="text-white text-base md:text-lg lg:text-xl font-medium">society</a>
                        <a href="#" class="text-white text-base md:text-lg lg:text-xl font-medium">about</a>
                        <a href="#" class="text-white text-base md:text-lg lg:text-xl font-medium">contact</a>

                        <!-- Desktop Auth Navigation -->
                        <div v-if="canLogin" class="flex items-center space-x-4 pl-4 border-l border-white/20">
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

                    <!-- Mobile Menu - Dropdown -->
                    <div
                        v-show="mobileMenuOpen"
                        class="fixed md:absolute top-20 right-4 mt-2 bg-black/80 backdrop-blur-sm rounded-lg p-4 z-50 shadow-xl border border-white/10 min-w-[200px]"
                    >
                        <nav class="flex flex-col space-y-3">
                            <a href="#" class="text-white text-lg font-medium hover:text-white/80 transition-colors">society</a>
                            <a href="#" class="text-white text-lg font-medium hover:text-white/80 transition-colors">about</a>
                            <a href="#" class="text-white text-lg font-medium hover:text-white/80 transition-colors">contact</a>

                            <!-- Auth Navigation -->
                            <div v-if="canLogin" class="pt-2 border-t border-white/20">
                                <div v-if="$page.props.auth.user" class="flex flex-col space-y-3 pt-2">
                                    <Link :href="route('dashboard')" class="text-white text-lg font-medium hover:text-white/80 transition-colors">
                                        Dashboard
                                    </Link>
                                </div>
                                <div v-else class="flex flex-col space-y-3 pt-2">
                                    <Link :href="route('login')" class="text-white text-lg font-medium hover:text-white/80 transition-colors">
                                        Log in
                                    </Link>
                                    <Link v-if="canRegister" :href="route('register')" class="text-white text-lg font-medium hover:text-white/80 transition-colors">
                                        Register
                                    </Link>
                                </div>
                            </div>
                        </nav>
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
                        <form @submit.prevent="submitForm" class="flex items-center border border-white rounded-full overflow-hidden shadow-sm">
                            <input
                                v-model="email"
                                type="email"
                                placeholder="Email"
                                class="bg-transparent text-white py-3 px-5 flex-grow outline-none placeholder-styling border-none text-sm md:text-base"
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
                    </div>
                </div>
            </main>

            <!-- Footer -->
            <footer class="w-full px-4 md:px-8 py-6 md:py-10">
                <!-- Mobile footer layout -->
                <div class="flex flex-col items-center md:hidden">
                    <!-- Social Media Icons -->
                    <div class="flex justify-center space-x-6 mb-4">
                        <a href="#" class="block">
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
                                <a href="#" class="block">
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
