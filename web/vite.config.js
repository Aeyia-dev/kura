import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.js',
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    build: {
        // Don't try to process URLs that start with / during build
        assetsInlineLimit: 0,
        rollupOptions: {
            external: [
                '/fonts/matter/MatterRegular.otf',
                '/fonts/matter/MatterThin.otf',
                '/fonts/matter/MatterLight.otf',
                '/fonts/matter/MatterMedium.otf',
                '/fonts/matter/MatterSemiBold.otf',
                '/fonts/matter/MatterBold.otf',
                '/fonts/matter/MatterHeavy.otf',
                '/fonts/matter/MatterBlack.otf'
            ]
        }
    }
});
