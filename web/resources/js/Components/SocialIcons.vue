<script setup>
/**
 * Social icons component for reuse across the site
 */
defineProps({
    /**
     * Use dark icons instead of white/default
     */
    dark: {
        type: Boolean,
        default: false
    },
    /**
     * Size of icons
     */
    size: {
        type: String,
        default: 'md',
        validator: (value) => ['sm', 'md', 'lg'].includes(value)
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
                icon: '/images/landing/social-facebook.png'
            },
            {
                url: '//www.instagram.com/aeyia_/',
                alt: 'Instagram',
                icon: '/images/landing/social-instagram.png'
            },
            {
                url: '//www.youtube.com/@AEYIAWellness',
                alt: 'YouTube',
                icon: '/images/landing/social-youtube.png'
            }
        ]
    }
});

const getIconSize = (size) => {
    switch(size) {
        case 'sm': return 'w-8 h-8';
        case 'lg': return 'w-12 h-12';
        default: return 'w-10 h-10'; // medium (default)
    }
};
</script>

<template>
    <div class="flex space-x-4">
        <a
            v-for="link in socialLinks"
            :key="link.alt"
            :href="link.url"
            class="block"
            target="_blank"
        >
            <img
                :src="link.icon"
                :alt="link.alt"
                :class="getIconSize(size)"
                :style="dark ? 'filter: brightness(0)' : ''"
            >
        </a>
    </div>
</template>
