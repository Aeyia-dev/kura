<script setup>
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
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

// Mobile menu state
const mobileMenuOpen = ref(false);
const toggleMobileMenu = () => {
    mobileMenuOpen.value = !mobileMenuOpen.value;
};
</script>

<template>
    <Head title="AEYIA - Elevate Well" />

    <!-- Main container -->
    <div class="relative min-h-screen overflow-y-auto">
        <!-- Solid background color as fallback -->
        <div class="absolute inset-0 bg-gray-800"></div>

        <!-- Background image -->
        <BackgroundImage imageName="desktop-background-03.jpg" :fixed="false" />

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
            <main class="flex-grow flex flex-col justify-center items-center text-center px-4 mb-24">
                <div class="max-w-4xl mx-auto">
                    <!-- Main Headline -->
                    <h1 class="text-white text-4xl md:text-5xl lg:text-6xl font-semibold tracking-tight mb-3 md:mb-4">
                        Original: max-w-4xl + px-4
                    </h1>

                    <!-- Subtitle -->
                    <p class="text-white text-lg md:text-xl lg:text-2xl font-medium leading-snug mb-8 md:mb-10 mx-auto max-w-2xl">
                        Coming soon — we're excited to share what we've been working on.
                    </p>

                    <!-- Email Form -->
                    <EmailSubscription
                        theme="light"
                        button-text="Join Now"
                        placeholder="Email"
                        max-width="max-w-xs sm:max-w-sm md:max-w-md"
                        :validate-domain="true"
                        success-message="Thank you for joining our waitlist!"
                    />
                </div>
            </main>

            <!-- Test Section 1: Reduced width with increased padding -->
            <main class="flex-grow flex flex-col justify-center items-center text-center px-6 mb-24">
                <div class="max-w-3xl mx-auto">
                    <!-- Main Headline -->
                    <h1 class="text-white text-4xl md:text-5xl lg:text-6xl font-semibold tracking-tight mb-3 md:mb-4">
                        Test 1: max-w-3xl + px-6
                    </h1>

                    <!-- Subtitle -->
                    <p class="text-white text-lg md:text-xl lg:text-2xl font-medium leading-snug mb-8 md:mb-10 mx-auto max-w-2xl">
                        Testing reduced container width with increased padding
                    </p>

                    <!-- Email Form -->
                    <EmailSubscription
                        theme="light"
                        button-text="Join Now"
                        placeholder="Email"
                        max-width="max-w-xs sm:max-w-sm md:max-w-md"
                        :validate-domain="true"
                        success-message="Thank you for joining our waitlist!"
                    />
                </div>
            </main>

            <!-- Test Section 2: Fixed width with overflow protection -->
            <main class="flex-grow flex flex-col justify-center items-center text-center px-4  mb-24">
                <div class="w-full" style="max-width: 360px; margin: 0 auto;">
                    <!-- Main Headline -->
                    <h1 class="text-white text-4xl md:text-5xl lg:text-6xl font-semibold tracking-tight mb-3 md:mb-4">
                        Test 2: Fixed 360px width
                    </h1>

                    <!-- Subtitle -->
                    <p class="text-white text-lg md:text-xl lg:text-2xl font-medium leading-snug mb-8 md:mb-10 mx-auto max-w-2xl">
                        Testing fixed width container with overflow-x-hidden
                    </p>

                    <!-- Email Form -->
                    <EmailSubscription
                        theme="light"
                        button-text="Join Now"
                        placeholder="Email"
                        max-width="max-w-xs sm:max-w-sm md:max-w-md"
                        :validate-domain="true"
                        success-message="Thank you for joining our waitlist!"
                    />
                </div>
            </main>

            <!-- Footer -->
            <SiteFooter style="transparent" />
        </div>
    </div>

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
