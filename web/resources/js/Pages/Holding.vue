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
    <div class="relative min-h-screen overflow-y-auto bg-black">
        <!-- Background image - notice the change to fixed="true" to make it stay in viewport -->
        <BackgroundImage imageName="background-03.webp" :fixed="true" />

        <!-- Content Container -->
        <div class="relative z-20 flex flex-col min-h-screen">
            <!-- Header -->
            <SiteHeader
                logoType="image"
                logoImagePath="/images/landing/aeyia-logo-white.png"
                :mobileMenuOpen="mobileMenuOpen"
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
                :canLogin="canLogin"
                :canRegister="canRegister"
                :authUser="$page.props.auth.user"
                @close="toggleMobileMenu"
            />

            <!-- Main Content - Centered -->
            <main class="flex-grow flex flex-col justify-center items-center text-center px-4 mt-60 pt-32 md:pt-0">
                <div class="max-w-4xl mx-auto">
                    <!-- Main Headline -->
                    <h1 class="text-white text-5xl md:text-5xl lg:text-6xl font-medium tracking-tight mb-3 md:mb-4">
                        Elevate well.<span class="text-3xl md:text-3xl lg:text-4xl align-top">™</span>
                    </h1>

                    <!-- Subtitle -->
                    <p class="text-white text-xl md:text-xl lg:text-2xl font-medium leading-snug mb-10 mx-auto max-w-2xl">
                        Coming soon — we're excited to share what we've been working on.
                    </p>

                    <!-- Email Form -->
                    <EmailSubscription
                        theme="light"
                        button-text="Join Now"
                        placeholder="Email"
                        max-width="max-w-md"
                        :validate-domain="true"
                        success-message="Thanks for signing up, we'll be in touch soon!"
                    />
                </div>
            </main>

            <!-- Footer -->
            <SiteFooter theme="transparent" position="normal"/>
        </div>
    </div>

</template>
