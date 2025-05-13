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

const imageName = ref('desktop-background-01-with-bar.jpg');

// Mobile menu state
const mobileMenuOpen = ref(false);
const toggleMobileMenu = () => {
    mobileMenuOpen.value = !mobileMenuOpen.value;
};
</script>

<template>
    <Head title="AEYIA - About Us" />

    <!-- Main container -->
    <div class="relative min-h-screen overflow-y-auto bg-[#212026]">
        <!-- Background image with CharcoalAeyia background color -->
        <div class="hidden md:block">
            <BackgroundImage imageName="desktop-background-01-with-bar.jpg" :fixed="true" :offsetPx="-280" backgroundColor="bg-[#212026]" />
        </div>
        <div class="md:hidden">
            <BackgroundImage imageName="desktop-background-01.jpg" :fixed="true" :offsetPx="680" />
        </div>

        <!-- No need for global overlay with the BackgroundImage60 component -->

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

            <!-- Hero Section -->
            <section class="flex-grow px-6 md:px-12 lg:px-20 pt-2 md:pt-2 lg:pt-2 flex flex-col lg:items-start">
                <!-- Centered column with left-aligned text -->
                <div class="w-full max-w-2xl mx-auto lg:mx-0 lg:ml-[40%]">
                    <div class="text-left">
                        <h1 class="text-white text-4xl lg:text-5xl mb-8">
                            AEYIA™ is a global wellness company reimagining human potentiality and wellbeing by connecting insights, people, and transformative experiences.
                        </h1>

                        <p class="text-white text-2xl font-medium mt-8 mb-24">
                            Elevated wellness™ –
                             <br class="sm:hidden">launching soon.
                        </p>

                        <!-- Email Form -->
                        <EmailSubscription
                            theme="light"
                            button-text="Join Now"
                            placeholder="Email"
                            max-width="max-w-md"
                            align="mr-auto"
                            :validate-domain="true"
                            success-message="Thank you for joining our newsletter!"
                        />
                    </div>
                </div>
            </section>

            <!-- Spacer to push footer down -->
            <div class="py-44 md:py-32 lg:py-40"></div>

            <!-- Footer with transparent background -->
            <SiteFooter position="normal" style="white" />
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

/* Responsive adjustments for mobile */
@media (max-width: 768px) {
    .hero-content {
        width: 100%;
        padding: 0 1rem;
    }
}
</style>
