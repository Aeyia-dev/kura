<script setup>
import NavigationLinks from './NavigationLinks.vue';

/**
 * Mobile menu overlay component
 */
const props = defineProps({
    /**
     * Whether the mobile menu is currently open
     */
    isOpen: {
        type: Boolean,
        required: true
    },
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
const emit = defineEmits(['close']);

/**
 * Function to close the mobile menu
 */
const closeMenu = () => {
    emit('close');
};
</script>

<template>
    <div v-if="isOpen" class="fixed inset-0 bg-black z-50 flex flex-col">
        <!-- Close button -->
        <div class="p-4 md:p-6 lg:p-8 flex justify-between items-center">
            <!-- Logo (image or text) -->
            <div class="w-40 md:w-64 lg:w-auto lg:max-w-md">
                <!-- Text logo -->
                <h1 v-if="logoType === 'text'" class="text-white text-4xl md:text-5xl font-bold">
                    {{ logoText }}
                </h1>
                <!-- Image logo -->
                <img v-else :src="logoImagePath" alt="AEYIA Logo" class="w-full">
            </div>
            
            <!-- Close button -->
            <button
                @click="closeMenu"
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
                <NavigationLinks 
                    :isMobile="true"
                    :showMenuLinks="showMenuLinks"
                    :canLogin="canLogin"
                    :canRegister="canRegister"
                    :authUser="authUser"
                    :closeMenu="closeMenu"
                />
            </nav>
        </div>

        <!-- Footer social icons -->
        <div class="p-6 flex justify-center">
            <div class="flex space-x-6">
                <a href="//www.facebook.com/aeyia.au" class="block" target="_blank">
                    <img src="/images/landing/social-facebook.png" alt="Facebook" class="w-10 h-10">
                </a>
                <a href="//www.instagram.com/aeyia_/" class="block" target="_blank">
                    <img src="/images/landing/social-instagram.png" alt="Instagram" class="w-10 h-10">
                </a>
                <a href="//www.youtube.com/@AEYIAWellness" class="block" target="_blank">
                    <img src="/images/landing/social-youtube.png" alt="YouTube" class="w-10 h-10">
                </a>
            </div>
        </div>

        <!-- Copyright -->
        <div class="pb-8 text-center">
            <p class="text-white text-sm font-medium">
                &copy; AEYIA {{ new Date().getFullYear() }}
            </p>
        </div>
    </div>
</template>

<style scoped>
/* Mobile menu animation */
div {
    transition: opacity 0.3s, transform 0.3s;
}
</style>