<script setup>
/**
 * Site footer component with social links and copyright
 */
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
     * Social media links to display
     */
    socialLinks: {
        type: Array,
        default: () => [
            {
                url: '//www.facebook.com/aeyia.au',
                alt: 'Facebook',
                icon: '/images/landing/social-facebook.png',
                svgPath: 'M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z'
            },
            {
                url: '//www.instagram.com/aeyia_/',
                alt: 'Instagram',
                icon: '/images/landing/social-instagram.png',
                svgPath: 'M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z'
            },
            {
                url: '//www.youtube.com/@AEYIAWellness',
                alt: 'YouTube',
                icon: '/images/landing/social-youtube.png',
                svgPath: 'M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z'
            }
        ]
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
    <!-- Transparent footer - used in Holding page -->
    <footer :class="['w-full px-4 md:px-8 py-6 md:py-10', getColorClasses(style)]">
        <!-- Mobile footer layout -->
        <div class="flex flex-col items-center md:hidden">
            <!-- Social Media Icons -->
            <div class="flex justify-center space-x-6 mb-4 mt-20">
                <a v-for="link in socialLinks"
                   :key="link.alt"
                   :href="link.url"
                   class="block"
                   target="_blank">
                    <img :src="link.icon" :alt="link.alt" class="w-8 h-8" :style="style === 'white' ? 'filter: brightness(0)' : ''">
                </a>
            </div>

            <!-- Copyright -->
            <div class="mb-4">
                <p class="text-xs font-medium">
                    &copy; AEYIA {{ currentYear }}
                </p>
            </div>

            <!-- Legal Links -->
            <div class="flex space-x-4">
                <a href="#" class="text-xs font-medium">Privacy Policy</a>
                <a href="#" class="text-xs font-medium">Terms & Conditions</a>
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
                    <div class="flex space-x-6">
                        <a v-for="link in socialLinks"
                           :key="link.alt"
                           :href="link.url"
                           class="block"
                           target="_blank">
                            <img :src="link.icon" :alt="link.alt" class="w-8 h-8 md:w-10 md:h-10" :style="style === 'white' ? 'filter: brightness(0)' : ''">
                        </a>
                    </div>
                </div>

                <!-- Legal Links - On right side -->
                <div class="flex space-x-4 items-end">
                    <a href="#" class="text-xs font-medium">Privacy Policy</a>
                    <a href="#" class="text-xs font-medium">Terms & Conditions</a>
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
