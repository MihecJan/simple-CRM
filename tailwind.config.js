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
                'primary-100': '#D8FBD5',
                'primary-200': '#ADF7B0',
                'primary-300': '#80E98E',
                'primary-400': '#5CD478',
                'primary-500': '#2EB85C',
                'primary-600': '#219E57',
                'primary-700': '#178451',
                'primary-800': '#0E6A48',
                'primary-900': '#085842',

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
