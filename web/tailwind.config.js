import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Matter', ...defaultTheme.fontFamily.sans],
                matter: ['Matter', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                charcoal: '#212026',
                dust: '#e9e3db',
            },
            borderRadius: {
                '15': '15px',
            },
            screens: {
                'lg': '1025px',  // Force iPad to tablet view
            },
        },
    },

    plugins: [forms, typography],
};
