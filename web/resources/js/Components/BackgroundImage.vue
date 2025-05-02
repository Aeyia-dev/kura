<script setup>
/**
 * Background image component that handles responsive image loading
 * with support for multiple image variations and positioning
 */
defineProps({
    /**
     * Which background image to use (e.g., "01", "02", "03")
     */
    imageNumber: {
        type: String,
        default: "03"
    },
    /**
     * Whether the background should be fixed position
     */
    fixed: {
        type: Boolean,
        default: false
    }
});
</script>

<template>
    <div class="absolute inset-0 z-0">
        <picture>
            <!-- Mobile version (WebP) -->
            <source
                media="(max-width: 767px)"
                :srcset="`/images/background/optimized/mobile/mobile-background-${imageNumber}.webp`"
                type="image/webp">

            <!-- Mobile version (JPG fallback) -->
            <source
                media="(max-width: 767px)"
                :srcset="`/images/background/optimized/mobile/mobile-background-${imageNumber}.jpg`"
                type="image/jpeg">

            <!-- Tablet version (WebP) -->
            <source
                media="(max-width: 1199px)"
                :srcset="`/images/background/optimized/tablet/tablet-background-${imageNumber}.webp`"
                type="image/webp">

            <!-- Tablet version (JPG fallback) -->
            <source
                media="(max-width: 1199px)"
                :srcset="`/images/background/optimized/tablet/tablet-background-${imageNumber}.jpg`"
                type="image/jpeg">

            <!-- Standard desktop version (WebP - 1920px resized) -->
            <source
                media="(max-width: 1999px)"
                :srcset="`/images/background/optimized/desktop-resized/desktop-background-${imageNumber}.webp`"
                type="image/webp">

            <!-- Large 4K desktop version (WebP - original) -->
            <source
                :srcset="`/images/background/optimized/desktop/desktop-background-${imageNumber}.webp`"
                type="image/webp">

            <!-- Fallback image -->
            <img
                :src="`/images/background/optimized/desktop/desktop-background-${imageNumber}.jpg`"
                alt="Background"
                :class="['object-cover', 'w-full', 'h-full', { 'fixed': fixed }]"
                loading="eager">
        </picture>
    </div>
</template>