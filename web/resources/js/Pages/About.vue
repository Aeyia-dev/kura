<script setup>
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import SiteHeader from '@/Components/SiteHeader.vue';
import SiteFooter from '@/Components/SiteFooter.vue';
import MobileMenu from '@/Components/MobileMenu.vue';
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
    <Head title="AEYIA - About Us" />

    <!-- Main container -->
    <div class="relative min-h-screen overflow-auto bg-charcoal">
        <!-- Content Container -->
        <div class="relative z-20 flex flex-col min-h-screen">
            <!-- Background Image Container that contains both header and hero -->
            <div class="bg-hero">
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
                    <div class="w-full max-w-2xl mx-auto mt-4 px-8 md:px-20 lg:px-2 lg:mt-64 lg:mx-0 lg:ml-[20%] xl:ml-[50%]">
                        <div class="text-left">
                            <h1 class="text-white text-4xl lg:text-4xl mb-8">
                                AEYIA™ is a global wellness company reimagining human potentiality and wellbeing by connecting insights, people, and transformative experiences.
                            </h1>

                            <p class="text-white text-2xl font-medium mt-8 mb-24">
                                Elevated wellness™ –
                                 <br class="sm:hidden">launching soon.
                            </p>

                            <EmailSubscription
                                theme="light"
                                button-text="Join Now"
                                placeholder="Email"
                                class="hidden lg:block"
                                max-width="max-w-md"
                                align="mr-auto"
                                :validate-domain="true"
                                success-message="Thanks for signing up, we’ll be in touch soon!"
                            />

                        </div>
                    </div>
                    <SiteFooter position="sticky" theme="transparent" class="hidden lg:block"/>
                </section>

                <section class="bg-res-image flex-grow flex flex-col pt-8 px-8 lg:hidden">
                    <!-- Email Form -->
                    <EmailSubscription
                        theme="light"
                        button-text="Join Now"
                        placeholder="Email"
                        max-width="max-w-md"
                        align="mx-auto"
                        :validate-domain="true"
                        success-message="Thanks for signing up, we’ll be in touch soon!"
                    />

                    <SiteFooter position="sticky" theme="transparent" />
                </section>
            </div>
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

.bg-hero {
    position: relative;
    min-height: 70rem;
    max-height: 90rem;
    width: 100%;
    display: flex;
    flex-direction: column;
    overflow: hidden;
}

.bg-hero::before {
    content: "";
    position: absolute;
    top: -300px;
    left: -200px;
    width: 1000px; /* Fixed width of 1000px */
    height: 140%;
    background-image: url('/images/background/optimized/desktop/desktop-background-01.jpg');
    background-position: left top;
    background-size: cover;
    background-repeat: no-repeat;
    z-index: -1;
}

.bg-hero > * {
    position: relative;
    z-index: 1;
}
.bg-res-image {
    background-position: center top;
    background-size: 100%;
    background-image: url('/images/background/optimized/tablet/tablet-background-01.jpg');
    min-height: 50rem;
}


@media (max-width: 1024px) {
    .bg-hero::before {
        background-image: none;
    }
    .bg-res-image {
        min-height: 40rem;
    }
}
@media (max-width: 767px) {
    .hero-content {
        width: 100%;
        padding: 0 1rem;
    }
    .bg-res-image {
        background-repeat: no-repeat;
        background-position: center top;
        background-size: 100%;
        background-image: url('/images/background/optimized/mobile/mobile-background-01.jpg');
        min-height: 28rem;
    }
}
</style>
