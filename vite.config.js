import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: [
                ...refreshPaths,
                'app/Http/Livewire/**',
            ],
        }),
    ],
    server: {
        https: false,
        host: "0.0.0.0",
        port: 8001,
        secure: false,
        strictPort: true,
        hmr: {
            port: 8001,
            host: "localhost",
        },
    },
});
