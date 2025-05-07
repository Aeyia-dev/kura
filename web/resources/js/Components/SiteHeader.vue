<script setup>
import NavigationLinks from './NavigationLinks.vue';

/**
 * Site header component with navigation
 */
const props = defineProps({
    /**
     * The type of logo to display: 'image' or 'text'
     */
    logoType: {
        type: String,
        default: 'image',
        validator: (value) => ['image', 'text'].includes(value)
    },
    /**
     * Text to display when logoType is 'text'
     */
    logoText: {
        type: String,
        default: 'society'
    },
    /**
     * Path to logo image when logoType is 'image'
     */
    logoImagePath: {
        type: String,
        default: '/images/landing/aeyia-logo-white.png'
    },
    /**
     * Whether the mobile menu is currently open
     */
    mobileMenuOpen: {
        type: Boolean,
        required: true
    },
    /**
     * Whether to show main navigation menu links (society, about, contact)
     */
    showMenuLinks: {
        type: Boolean,
        default: true
    },
    /**
     * Whether to show login/register links
     */
    canLogin: {
        type: Boolean,
        default: false
    },
    /**
     * Whether to show the register link
     */
    canRegister: {
        type: Boolean,
        default: false
    },
    /**
     * Auth user data
     */
    authUser: {
        type: Object,
        default: null
    }
});

/**
 * Events emitted by this component
 */
const emit = defineEmits(['toggle-mobile-menu']);

/**
 * Toggle the mobile menu
 */
const toggleMobileMenu = () => {
    emit('toggle-mobile-menu');
};
</script>

<template>
    <header class="w-full p-4 md:p-6 lg:p-8">
        <div class="flex justify-between items-top">
            <!-- Logo (image or text) -->
            <div class="w-40 md:w-64 lg:w-auto lg:max-w-md">
                <!-- Text logo -->
                <a href="/holding">
                    <h1 v-if="logoType === 'text'" class="text-white text-4xl md:text-5xl font-bold">
                        {{ logoText }}
                    </h1>
                    <!-- Image logo -->
                    <img v-else :src="logoImagePath" alt="AEYIA Logo" class="w-full">
                </a>
            </div>

            <!-- Navigation Menu - Hidden on mobile, visible on tablet/desktop -->
            <nav class="hidden md:flex items-start space-x-6 lg:space-x-8 mt-10">
                <NavigationLinks
                    :isMobile="false"
                    :showMenuLinks="showMenuLinks"
                    :canLogin="canLogin"
                    :canRegister="canRegister"
                    :authUser="authUser"
                />
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
        </div>
    </header>
</template>
