import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'secondary-100': '#E3EDF7',
                'secondary-200': '#C9DBEF',
                'secondary-300': '#9EB5D0',
                'secondary-400': '#7185A2',
                'secondary-450': '#586883',
                'secondary-500': '#3C4B64',
                'secondary-600': '#2B3A56',
                'secondary-700': '#1E2A48',
                'secondary-800': '#131D3A',
                'secondary-900': '#0B1330',
            },
        },
    },

    plugins: [forms],
};
