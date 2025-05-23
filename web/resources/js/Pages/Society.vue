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
    <Head title="AEYIA - Society" />

    <!-- Main container -->
    <div class="relative min-h-screen overflow-auto">
        <!-- Content Container -->
        <div class="relative z-20 flex flex-col min-h-screen">
            <!-- Background Image Container that contains both header and hero -->
            <div class="bg-hero">
                <!-- Header -->
                <SiteHeader
                    logoType="image"
                    logoImagePath="/images/society-logo.png"
                    :mobileMenuOpen="mobileMenuOpen"
                    :canLogin="canLogin"
                    :canRegister="canRegister"
                    :authUser="$page.props.auth.user"
                    @toggle-mobile-menu="toggleMobileMenu"
                />

                <!-- Mobile Menu -->
                <MobileMenu
                    :isOpen="mobileMenuOpen"
                    logoType="text"
                    logoText="society"
                    :canLogin="canLogin"
                    :canRegister="canRegister"
                    :authUser="$page.props.auth.user"
                    @close="toggleMobileMenu"
                />

                <!-- Hero Content -->
                <section class="flex flex-col items-center py-8 relative min-h-[30rem] max-h-[50rem] md:min-h-[50rem] md:max-h-[70rem] lg:min-h-[70rem] lg:max-h-[90rem]">
                    <div class="absolute bottom-14 md:bottom-20 w-full px-6 md:px-12 lg:px-20">
                        <h2 class="text-white text-4xl md:text-5xl lg:text-7xl font-medium mb-8 text-center">
                            Small changes.
                            <br class="lg:hidden">Big transformations.
                        </h2>

                        <!-- Down arrow icon -->
                        <div class="mt-8">
                            <img
                                src="/images/icons/chevron.png"
                                alt="Scroll down"
                                class="h-15 w-15 mx-auto transform rotate-90"
                                style="filter: brightness(0) invert(1); height: 3rem; width: 3rem;"
                            >
                        </div>
                    </div>
                </section>
            </div>

            <!-- Main Content -->
            <main class="flex-grow">
                <!-- Mission Section -->
                <section class="bg-white pt-12 px-12 md:px-8 lg:pt-16  lg:px-16">
                    <div class="max-w-5xl mx-auto">
                        <div class="mb-8">
                            <p class="text-charcoal text-2xl mb-6">
                                We believe that even the smallest changes can spark powerful
                                transformations. That's why our mission is to make transformative tools,
                                habits, insights, and support more accessible.
                            </p>

                            <p class="text-charcoal text-2xl md:text-xl mb-6">
                                Real change often begins with a single step - and everyone deserves the
                                chance to take it.
                            </p>

                            <p class="text-charcoal font-medium text-xl md:text-base">
                                AEYIA™ Society is a DGRI registered charity committed to expanding access to educational tools, online
                                resources and support services for individuals experiencing hardship, social disadvantages, mental health
                                challenges and vulnerable life circumstances. This initiative is currently evolving and will be available soon.
                            </p>
                        </div>
                    </div>
                </section>

                <!-- Contact Section -->
                <section class="bg-white py-8 px-8 md:px-8 lg:px-16">
                    <div class="max-w-5xl mx-auto">
                        <div class="bg-dust bg-opacity-35 py-10 px-4 md:px-8 lg:px-16 rounded-[15px]">
                            <div class="flex flex-col md:flex-row justify-between">
                                <div class="mb-8 md:mb-0 ml-5">
                                    <h3 class="text-5xl md:text-3xl font-medium mb-4">Contact us.</h3>
                                    <p class="text-md text-gray-700 font-medium">society@aeyia.com</p>
                                </div>

                                <div class="mt-3 md:mb-0 ml-5 md:mr-16">
                                    <p class="text-gray-700 mb-2 font-medium">ABN: 14628727542</p>
                                    <a href="#" class="text-gray-700 underline text-xs">See more information</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Newsletter Section -->
                <section class="bg-white px-4 mt-10 md:mt-20 md:mb-40">
                    <div class="max-w-5xl lg:px-16 mx-auto">
                        <div class="flex flex-col md:flex-row  justify-between">
                            <div class="px-4 mb-8 md:mb-0 text-left">
                                <h3 class="text-3xl font-medium">Stay in the loop.</h3>
                            </div>

                            <!-- Email Form -->
                            <EmailSubscription
                                theme="dark"
                                button-text="Join Now"
                                placeholder="Email"
                                max-width="max-w-md"
                                list-source="society"
                                :validate-domain="true"
                                success-message="Thanks for signing up, we’ll be in touch soon!"
                            />

                        </div>
                    </div>


                </section>
            </main>

            <!-- Footer -->
            <SiteFooter theme="white" />
        </div>
    </div>

</template>

<style scoped>
/* Form-specific styles */
input:focus,
button:focus {
    outline: none !important;
    box-shadow: none !important;
    border-color: black !important;
    ring-width: 0 !important;
}

/* Create a proper header background that extends across the hero section */
.bg-hero {
    background-image: url('/images/background/optimized/desktop/background-02.webp');
    background-position: center -10vh;
    background-size: cover;
    background-repeat: no-repeat;
    min-height: 70rem; /* Set consistent height using rem units */
    max-height: 90rem; /* Limit maximum height for large screens */
    width: 100%;
    display: flex;
    flex-direction: column;
}

@media (max-width: 1199px) {
    .bg-hero {
        background-position: center -5vh;
        background-image: url('/images/background/optimized/tablet/background-02.webp');
        min-height: 40rem; /* Slightly smaller height for tablets */
    }
}

@media (max-width: 767px) {
    .bg-hero {
        background-position: center -5vh;
        background-image: url('/images/background/optimized/mobile/background-02.webp');
        min-height: 35rem; /* Smaller height for mobile devices */
    }
}
</style>
