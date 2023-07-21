// import {viteStaticCopy} from 'vite-plugin-static-copy';
// import {defineConfig} from 'vite';
// import laravel from 'laravel-vite-plugin';
//
// export default defineConfig({
//     plugins: [
//         viteStaticCopy({
//             targets: [
//                 {
//                     src: 'resources/images/',
//                     dest: '',
//                 },
//             ],
//         }),
//         laravel({
//             input: [
//                 'resources/css/reset.css',
//                 'resources/css/boot.css',
//                 'resources/css/login.css',
//                 'resources/css/style.css',
//                 'resources/js/auth/login.js',
//                 'resources/js/jquery.min.js',
//
//             ],
//         }),
//     ],
//     css: {
//         outDir: 'public/css'
//     },
// });

// vite.config.js
// import { defineConfig } from 'vite';
// import laravel from 'laravel-vite-plugin';
// import {viteStaticCopy} from 'vite-plugin-static-copy';
//
// export default defineConfig({
//     plugins: [
//         viteStaticCopy({
//             targets: [
//                 {
//                     src: 'resources/images/',
//                     dest: '',
//                 },
//             ],
//         }),
//         laravel({
//             hotFile: 'storage/vite.hot',
//             buildDirectory: 'bundle',
//             input: [
//                 'resources/scss/reset.scss',
//                 'resources/css/boot.css',
//                 'resources/css/login.css',
//                 'resources/css/style.css',
//                 'resources/js/auth/login.js',
//                 'resources/js/jquery.min.js',
//             ],
//         }),
//     ],
//     build: {
//         outDir: 'public/assets', // Diretório de saída geral
//         assetsDir: 'public/assets', // Diretório de saída para as imagens compiladas
//         rollupOptions: {
//             output: {
//                 entryFileNames: 'js/[name]-[hash].js', // Diretório de saída para os arquivos JS compilados
//                 chunkFileNames: 'js/[name]-[hash].js', // Diretório de saída para os chunks JS compilados
//                 assetFileNames: 'images/[name]-[hash][extname]', // Diretório de saída para as imagens compiladas
//             },
//
//         },
//     },
//     css: {
//         outDir: 'public/assets/css', // Diretório de saída para os arquivos CSS compilados
//     },
// });


import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { viteStaticCopy } from 'vite-plugin-static-copy'; // Import the viteStaticCopy function

export default defineConfig({
    plugins: [
        viteStaticCopy({
            targets: [
                {
                    src: 'resources/images/',
                    dest: 'public/',
                },
                {
                    src: 'resources/css/',
                    dest: 'public/',
                    include: ['**/*.css'],
                },
                {
                    src: 'resources/js/',
                    dest: 'public/',
                    include: ['**/*.js'],
                },
            ],
        }),
        laravel({
            // hotFile: 'storage/vite.hot',
            // buildDirectory: 'bundle',
            input: [
                'resources/scss/reset.scss',
                'resources/css/boot.css',
                'resources/css/login.css',
                'resources/css/style.css',
                'resources/js/auth/login.js',
                'resources/js/jquery.min.js',
            ],
        }),
    ],
    // build: {
    //     outDir: 'public/assets', // Diretório de saída geral
    //     assetsDir: 'public/assets', // Diretório de saída para as imagens compiladas
    //     rollupOptions: {
    //         output: {
    //             entryFileNames: 'public/assets/js/[name]-[hash].js', // Diretório de saída para os arquivos JS compilados
    //             chunkFileNames: 'public/assets/js/[name]-[hash].js', // Diretório de saída para os chunks JS compilados
    //             assetFileNames: 'images/[name]-[hash][extname]', // Diretório de saída para as imagens compiladas
    //         },
    //     },
    // },
    // css: {
    //     outDir: 'public/assets/css', // Diretório de saída para os arquivos CSS compilados
    // },
});
