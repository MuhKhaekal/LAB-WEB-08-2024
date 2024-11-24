import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        "./node_modules/flowbite/**/*.js"
    ],
    darkMode: 'class',
    theme: {
        extend: {
            fontFamily: {
                pricedown: ['Pricedown'],
                houseScript: ['House\\ Script'],
                chalet1960: ['Chalet1960'],
            },
            // backgroundImage: {
            //     'Rockstar': "url({{ asset('images/Rockstar_bg.png') }})",
            // },
        },
    },
    plugins: [
        require('flowbite/plugin')
    ],
};
