import {viteStaticCopy} from 'vite-plugin-static-copy';
import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        viteStaticCopy({
            targets: [
                {
                    src: 'resources/images/',
                    dest: '',
                },
            ],
        }),
        laravel({
            input: [
                'resources/css/reset.css',
                'resources/css/boot.css',
                'resources/css/login.css',
                'resources/css/style.css',
                'resources/js/auth/login.js',
                'resources/js/jquery.min.js',

            ],
        }),
    ],
    css: {
        outDir: 'public/css'
    },
});
