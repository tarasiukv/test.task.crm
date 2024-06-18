import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import path from 'path';

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '@img': path.resolve(__dirname, 'public/img'),
            '@composable': path.resolve(__dirname, 'resources/js/composables'),
            '@component': path.resolve(__dirname, 'resources/js/components')
        }
    }
});
