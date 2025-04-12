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
</script>

<template>
    <Head title="AEYIA - Elevate Well" />

    <!-- Jetstream Authentication Nav -->
    <div class="absolute top-0 right-0 px-6 py-4 z-50">
        <nav v-if="canLogin" class="flex items-center space-x-4">
            <Link
                v-if="$page.props.auth.user"
                :href="route('dashboard')"
                class="text-white bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full hover:bg-white/40 transition-colors duration-200"
            >
                Dashboard
            </Link>

            <template v-else>
                <Link
                    :href="route('login')"
                    class="text-white hover:bg-white/20 px-4 py-2 rounded-full transition-colors duration-200"
                >
                    Log in
                </Link>

                <Link
                    v-if="canRegister"
                    :href="route('register')"
                    class="text-white bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full hover:bg-white/40 transition-colors duration-200"
                >
                    Register
                </Link>
            </template>
        </nav>
    </div>

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
                    <nav class="hidden md:flex space-x-6 lg:space-x-8">
                        <a href="#" class="text-white text-lg md:text-xl lg:text-2xl xl:text-3xl font-medium">society</a>
                        <a href="#" class="text-white text-lg md:text-xl lg:text-2xl xl:text-3xl font-medium">about</a>
                        <a href="#" class="text-white text-lg md:text-xl lg:text-2xl xl:text-3xl font-medium">contact</a>
                    </nav>

                    <!-- Mobile Menu Button - Only visible on mobile -->
                    <button class="md:hidden text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </header>
            
            <!-- Main Content - Centered -->
            <main class="flex-grow flex flex-col justify-center items-center text-center px-4">
                <div class="max-w-4xl mx-auto">
                    <!-- Main Headline -->
                    <h1 class="text-white text-5xl md:text-6xl lg:text-7xl font-semibold tracking-tight mb-4 md:mb-6">
                        Elevate well.<span class="text-3xl md:text-4xl lg:text-5xl align-top">™</span>
                    </h1>

                    <!-- Subtitle -->
                    <p class="text-white text-xl md:text-2xl lg:text-3xl font-medium leading-snug mb-12 md:mb-16 mx-auto max-w-2xl">
                        Coming soon — we're excited to share what we've been working on.
                    </p>

                    <!-- Email Form -->
                    <div class="w-full max-w-md mx-auto">
                        <form @submit.prevent="submitForm" class="flex items-center border border-white rounded-full overflow-hidden shadow-sm">
                            <input
                                v-model="email"
                                type="email"
                                placeholder="Email"
                                class="bg-transparent text-white py-4 px-6 flex-grow outline-none placeholder-styling border-none"
                            >
                            <div class="p-1.5 pr-2">
                                <button
                                    type="submit"
                                    class="bg-white text-gray-900 rounded-full px-8 py-4 text-lg font-medium whitespace-nowrap hover:bg-opacity-90 transition-colors duration-200"
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
                    <div class="flex justify-center space-x-8 mb-6">
                        <a href="#" class="block">
                            <img src="/images/landing/social-facebook.png" alt="Facebook" class="w-10 h-10">
                        </a>
                        <a href="#" class="block">
                            <img src="/images/landing/social-instagram.png" alt="Instagram" class="w-10 h-10">
                        </a>
                        <a href="#" class="block">
                            <img src="/images/landing/social-youtube.png" alt="YouTube" class="w-10 h-10">
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
                        <div class="absolute left-1/2 transform -translate-x-1/2 bottom-0 mb-8">
                            <div class="flex space-x-8">
                                <a href="#" class="block">
                                    <img src="/images/landing/social-facebook.png" alt="Facebook" class="w-12 h-12">
                                </a>
                                <a href="#" class="block">
                                    <img src="/images/landing/social-instagram.png" alt="Instagram" class="w-12 h-12">
                                </a>
                                <a href="#" class="block">
                                    <img src="/images/landing/social-youtube.png" alt="YouTube" class="w-12 h-12">
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
</style>