import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '~ziggy-vue': path.resolve(__dirname, 'vendor/tightenco/ziggy/dist/vue.es.js'),
            '~resources': path.resolve(__dirname, 'resources'),
            '~Pages': path.resolve(__dirname, 'resources/js/Pages'),
        },
    },
});
