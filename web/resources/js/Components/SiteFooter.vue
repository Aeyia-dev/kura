<script setup>
/**
 * Site footer component with social links and copyright
 */
import SocialIcons from '@/Components/SocialIcons.vue';

defineProps({
    /**
     * Footer style: 'transparent' for overlay on background image, 'white' for white background
     */
    theme: {
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
    },
    /**
     * Whether to show social icons in the footer
     */
    showSocialIcons: {
        type: Boolean,
        default: true
    }
});

/**
 * Get CSS classes based on footer style
 */
const getColorClasses = (theme) => {
    return theme === 'white'
        ? 'text-charcoal'
        : 'text-white';
};

/**
 * Get the current year for copyright
 */
const currentYear = new Date().getFullYear();
</script>

<template>
    <footer :class="[
        'w-full px-2 py-0 md:py-2 z-10',
        getColorClasses(theme),
        position === 'fixed' ? 'fixed bottom-0 left-0' : '',
        position === 'sticky' ? 'mt-auto' : ''
    ]">
        <!-- Social Media Icons -->
        <div v-if="showSocialIcons" class="md:hidden flex justify-center space-x-6 mb-8 mt-20">
            <SocialIcons :dark="theme === 'white'" size="md" />
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
                <a href="/terms" class="text-xs font-medium">Terms & Conditions</a>
                <a href="/terms#privacy-policy" class="text-xs font-medium">Privacy Policy</a>
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
                <div v-if="showSocialIcons" class="absolute left-1/2 transform -translate-x-1/2 bottom-0 mb-6 mt-20">
                    <SocialIcons :dark="theme === 'white'" size="lg" />
                </div>

                <!-- Legal Links - On right side -->
                <div class="flex space-x-4 items-end">
                    <a href="/terms" class="text-xs font-medium">Terms & Conditions</a>
                    <a href="/terms#privacy-policy" class="text-xs font-medium">Privacy Policy</a>
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
