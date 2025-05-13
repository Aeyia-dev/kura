<script setup>
import { Link } from '@inertiajs/vue3';

/**
 * Shared navigation links component to maintain consistent navigation
 * across desktop and mobile views and across different pages
 */
defineProps({
    /**
     * Whether these links are being displayed in mobile context
     */
    isMobile: {
        type: Boolean,
        default: false
    },
    /**
     * Whether to show main navigation menu links (society, about, contact)
     */
    showMenuLinks: {
        type: Boolean,
        default: true
    },
    /**
     * Whether to show login/register links (passed from parent)
     */
    canLogin: {
        type: Boolean,
        default: false
    },
    /**
     * Whether to show register link (passed from parent)
     */
    canRegister: {
        type: Boolean,
        default: false
    },
    /**
     * Auth user data from Inertia $page.props.auth.user
     */
    authUser: {
        type: Object,
        default: null
    },
    /**
     * Function to close the mobile menu (if in mobile context)
     */
    closeMenu: {
        type: Function,
        default: () => {}
    }
});
</script>

<template>
    <!-- Regular navigation links -->
    <!-- Mobile version -->
    <template v-if="isMobile">
        <!-- Only show Home link if showMenuLinks is true -->
        <a v-if="showMenuLinks" href="/holding" @click="closeMenu" class="text-white text-4xl font-medium hover:text-white/80 transition-colors text-left">Home</a>

        <!-- Menu links conditionally displayed -->
        <template v-if="showMenuLinks">
            <a href="/society" @click="closeMenu" class="text-white text-4xl font-medium hover:text-white/80 transition-colors text-left">Society</a>
            <a href="/about" @click="closeMenu" class="text-white text-4xl font-medium hover:text-white/80 transition-colors text-left">About</a>
            <a href="/contact" @click="closeMenu" class="text-white text-4xl font-medium hover:text-white/80 transition-colors text-left">Contact</a>
        </template>

        <!-- Auth Navigation -->
        <div v-if="canLogin" class="pt-6 flex flex-col space-y-10">
            <div v-if="authUser">
                <Link :href="route('dashboard')" @click="closeMenu" class="text-white text-4xl font-medium hover:text-white/80 transition-colors text-left">
                    Dashboard
                </Link>
            </div>
            <div v-else class="flex flex-col space-y-10">
                <Link :href="route('login')" @click="closeMenu" class="text-white text-4xl font-medium hover:text-white/80 transition-colors text-left">
                    Log in
                </Link>
                <Link v-if="canRegister" :href="route('register')" @click="closeMenu" class="text-white text-4xl font-medium hover:text-white/80 transition-colors text-left">
                    Register
                </Link>
            </div>
        </div>
    </template>

    <!-- Desktop version -->
    <template v-else>
        <!-- Menu links conditionally displayed -->
        <template v-if="showMenuLinks">
            <a href="/society" class="text-white text-2xl font-medium">society</a>
            <a href="/about" class="text-white text-2xl font-medium">about</a>
            <a href="/contact" class="text-white text-2xl font-medium">contact</a>
        </template>

        <!-- Desktop Auth Navigation -->
        <div v-if="canLogin" class="flex items-center space-x-4 mt-2">
            <template v-if="authUser">
                <Link :href="route('dashboard')" class="text-white bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full text-sm hover:bg-white/40 transition-colors duration-200">
                    Dashboard
                </Link>
            </template>
            <template v-else>
                <Link :href="route('login')" class="text-white hover:bg-white/20 px-4 py-2 rounded-full text-sm transition-colors duration-200">
                    Log&nbsp;in
                </Link>
                <Link v-if="canRegister" :href="route('register')" class="text-white bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full text-sm hover:bg-white/40 transition-colors duration-200">
                    Register
                </Link>
            </template>
        </div>
    </template>
</template>
