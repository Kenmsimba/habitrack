import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
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
    resolve: {
        alias: {
            '@': path.resolve(__dirname, 'resources/js'),
            ziggy: path.resolve('vendor/tightenco/ziggy/dist/vue.es'),  // Key for Vite + Vue 3
        },
    },
    server: {
        // THIS IS THE KEY PART
        https: false,
        host: 'localhost',
        port: 5173,
        strictPort: true,
        hmr: {
            host: 'localhost',
            protocol: 'ws', // force ws (not wss)
        },
        // Optional: prevent Vite from opening browser automatically
        open: false,
    },
});