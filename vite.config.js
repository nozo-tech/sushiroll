import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { esbuildCommonjs } from '@originjs/vite-plugin-commonjs';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    optimizeDeps:{
        esbuildOptions:{
            plugins:[
                esbuildCommonjs(['video.js'])
            ]
        }
    }
});
