<script setup>
/**
 * Site footer component with social links and copyright
 */
import SocialIcons from '@/Components/SocialIcons.vue';

defineProps({
    /**
     * Footer style: 'transparent' for overlay on background image, 'white' for white background
     */
    style: {
        type: String,
        default: 'transparent',
        validator: (value) => ['transparent', 'white'].includes(value)
    },
    /**
     * Whether the footer should be fixed to the bottom of the viewport
     */
    /**
     * Positioning strategy for the footer:
     * - 'sticky': Sticks to bottom even with short content
     * - 'fixed': Fixed to viewport bottom
     * - 'normal': Regular flow positioning
     */
    position: {
        type: String,
        default: 'normal',
        validator: (value) => ['normal', 'sticky', 'fixed'].includes(value)
    }
});

/**
 * Get CSS classes based on footer style
 */
const getColorClasses = (style) => {
    return style === 'white'
        ? 'text-gray-700'
        : 'text-white';
};

/**
 * Get the current year for copyright
 */
const currentYear = new Date().getFullYear();
</script>

<template>
    <footer :class="[
        'w-full px-4 md:px-8 py-6 md:py-10 z-10',
        getColorClasses(style),
        position === 'fixed' ? 'fixed bottom-0 left-0' : '',
        position === 'sticky' ? 'mt-auto' : ''
    ]">
        <!-- Social Media Icons -->
        <div class="md:hidden flex justify-center space-x-6 mb-8 mt-20">
            <SocialIcons :dark="style === 'white'" size="md" />
        </div>

        <div class="flex justify-between md:hidden">
            <!-- Copyright -->
            <div class="mb-4">
                <p class="text-xs font-medium">
                    &copy; AEYIA {{ currentYear }}
                </p>
            </div>

            <!-- Legal Links -->
            <div class="flex space-x-4">
                <a href="#" class="text-xs font-medium">Terms & Conditions</a>
                <a href="#" class="text-xs font-medium">Privacy</a>
            </div>
        </div>

        <!-- Desktop/Tablet footer layout -->
        <div class="hidden md:block relative">
            <div class="flex justify-between items-end">
                <!-- Copyright -->
                <div>
                    <p class="text-xs font-medium">
                        &copy; AEYIA {{ currentYear }}
                    </p>
                </div>

                <!-- Social Media Icons - Centered -->
                <div class="absolute left-1/2 transform -translate-x-1/2 bottom-0 mb-6 mt-20">
                    <SocialIcons :dark="style === 'white'" size="lg" />
                </div>

                <!-- Legal Links - On right side -->
                <div class="flex space-x-4 items-end">
                    <a href="#" class="text-xs font-medium">Terms & Conditions</a>
                    <a href="#" class="text-xs font-medium">Privacy</a>
                </div>
            </div>
        </div>
    </footer>
</template>

<style scoped>
.vertical-text {
    writing-mode: vertical-rl;
    transform: rotate(180deg);
    white-space: nowrap;
}
</style>
