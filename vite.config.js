import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path'; // Import the 'path' module

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            // Add an alias for 'signature_pad' here
            'signature_pad': path.resolve(__dirname, 'node_modules/signature_pad/dist/signature_pad.umd.min.js'),
        },
    },
});
