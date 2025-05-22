<script setup>
/**
 * Background image component that handles responsive image loading
 * with support for multiple device sizes
 */
defineProps({
    /**
     * Base image name with extension
     */
    imageName: {
        type: String,
        default: "background-01.webp"
    },
    /**
     * Whether the background should be fixed position
     */
    fixed: {
        type: Boolean,
        default: false
    },
    /**
     * Optional vertical offset in pixels to move the image further up or down
     * Positive values move the image down, negative values move it up
     */
    offsetPx: {
        type: Number,
        default: 0
    }
});
</script>
<template>
    <div class="absolute inset-0 z-1" :style="{
        height: offsetPx !== 0 ? `calc(100% + ${Math.abs(offsetPx)}px)` : '100%'
    }">
        <picture class="relative block h-full w-full">
            <!-- Mobile version -->
            <source
                media="(max-width: 767px)"
                :srcset="`/images/background/optimized/mobile/${imageName}`"
                type="image/webp">

            <!-- Tablet version -->
            <source
                media="(max-width: 1199px)"
                :srcset="`/images/background/optimized/tablet/${imageName}`"
                type="image/webp">

            <!-- Desktop version -->
            <source
                :srcset="`/images/background/optimized/desktop/${imageName}`"
                type="image/webp">

            <!-- Fallback image wrapper -->
            <div :class="['relative', 'w-full', 'h-full', { 'fixed inset-0 w-screen h-screen': fixed }]">
                <img
                    :src="`/images/background/optimized/desktop/${imageName}`"
                    alt="Background"
                    :class="[
                        'object-cover',
                        'w-full',
                        'h-full',
                        'object-top',
                    ]"
                    :style="`
                        object-position: top center;
                        transform: translateY(${offsetPx}px);
                        min-height: ${offsetPx < 0 ? `calc(100% + ${Math.abs(offsetPx)}px)` : '100%'};
                    `"
                    loading="eager">
            </div>
        </picture>
    </div>
</template>
