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
    <Head title="AEYIA - Society" />

    <!-- Main container -->
    <div class="relative min-h-screen overflow-auto">
        <!-- Background image -->
        <BackgroundImage imageName="desktop-background-02.jpg" :fixed="true" />

        <!-- Content Container -->
        <div class="relative z-20 flex flex-col min-h-screen">
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

            <!-- Hero Section -->
            <section class="flex flex-col items-center min-h-[80vh] px-4 py-8 relative">
                <div class="absolute bottom-14 md:bottom-20 mx-4">
                    <h2 class="text-white text-4xl md:text-5xl lg:text-6xl font-semibold max-w-5xl mx-auto mb-8 ">
                        Small changes.
                        <br class="sm:hidden">Big transformations.
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

            <!-- Main Content -->
            <main class="flex-grow mb-20">
                <!-- Mission Section -->
                <section class="bg-white py-12 px-12 md:px-8 lg:px-16">
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
                <section class="bg-white py-6 px-8 md:px-8 lg:px-16">
                    <div class="max-w-5xl mx-auto">
                        <div class="bg-[#e9e3db] bg-opacity-35 py-10 px-4 md:px-8 lg:px-16 rounded-[15px]">
                            <div class="flex flex-col md:flex-row justify-between">
                                <div class="mb-8 md:mb-0 ml-5">
                                    <h3 class="text-5xl md:text-3xl font-semibold mb-4">Contact us.</h3>
                                    <p class="text-md text-gray-700 font-semibold">society@aeyia.com</p>
                                </div>

                                <div class="my-6 md:mb-0 ml-5 md:mr-16">
                                    <p class="text-gray-700 mb-2 font-semibold">ABN: 14628727542</p>
                                    <a href="#" class="text-gray-700 underline text-xs">See more information</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Newsletter Section -->
                <section class="bg-white px-4 py-12">
                    <div class="max-w-5xl lg:px-16 mx-auto">
                        <div class="flex flex-col md:flex-row  justify-between">
                            <div class="px-4 mb-8 md:mb-0 text-left">
                                <h3 class="text-3xl font-semibold">Stay in the loop.</h3>
                            </div>

                            <!-- Email Form -->
                            <EmailSubscription
                                theme="dark"
                                button-text="Join Now"
                                placeholder="Email"
                                max-width="max-w-md"
                                list-source="society"
                                :validate-domain="true"
                                success-message="Thank you for joining our newsletter!"
                            />

                        </div>
                    </div>


                </section>
            </main>

            <!-- Footer -->
            <SiteFooter :style="'white'" />
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
</style>
