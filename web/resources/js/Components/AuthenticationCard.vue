<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 relative">
        <!-- Background image -->
        <div class="absolute inset-0 z-0">
            <picture>
                <!-- Mobile version (WebP) -->
                <source
                    media="(max-width: 767px)"
                    srcset="/images/background/optimized/mobile/mobile-2806_william-desena.webp"
                    type="image/webp">

                <!-- Mobile version (JPG fallback) -->
                <source
                    media="(max-width: 767px)"
                    srcset="/images/background/optimized/mobile/mobile-2806_william-desena.jpg"
                    type="image/jpeg">

                <!-- Tablet version (WebP) -->
                <source
                    media="(max-width: 1199px)"
                    srcset="/images/background/optimized/tablet/tablet-2806_william-desena.webp"
                    type="image/webp">

                <!-- Tablet version (JPG fallback) -->
                <source
                    media="(max-width: 1199px)"
                    srcset="/images/background/optimized/tablet/tablet-2806_william-desena.jpg"
                    type="image/jpeg">

                <!-- Standard desktop version (WebP - 1920px resized) -->
                <source
                    media="(max-width: 1999px)"
                    srcset="/images/background/optimized/desktop-resized/desktop-2806_william-desena.webp"
                    type="image/webp">

                <!-- Large 4K desktop version (WebP - original) -->
                <source
                    srcset="/images/background/optimized/desktop/desktop-2806_william-desena.webp"
                    type="image/webp">

                <!-- Fallback image -->
                <img
                    src="/images/background/optimized/desktop/desktop-2806_william-desena.jpg"
                    alt="Background"
                    class="object-cover w-full h-full"
                    loading="eager">
            </picture>
        </div>

        <!-- Overlay for better text readability -->
        <div class="absolute inset-0 z-10 bg-black bg-opacity-20"></div>

        <div class="z-20 relative">
            <slot name="logo" />
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-8 bg-white/20 backdrop-blur-md shadow-xl overflow-hidden sm:rounded-2xl border border-white/20 z-20 relative text-white">
            <slot />
        </div>

        <!-- Authentication links -->
        <div class="w-full sm:max-w-md mt-4 text-white/80 text-center z-20 relative">
            <Link :href="'/'" class="hover:text-white transition-colors duration-200">
                Return to home
            </Link>
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
</script>
