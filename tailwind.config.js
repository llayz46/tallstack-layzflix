import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';
import postcssImport from 'postcss-import';
import autoprefixer from 'autoprefixer';
import postcssCustomProperties from 'postcss-custom-properties';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'body': '#d4d4d8',
                'background': {
                    'normal': '#07070e',
                    'accent': '#0b0b15',
                    'accent-hover': '#0e0e1a',
                    'accent-darker': '#090910',
                },
                'primary': {
                    '50': '#fef2f3',
                    '100': '#fde6e7',
                    '200': '#fbd0d5',
                    '300': '#f7aab2',
                    '400': '#f27a8a',
                    '500': '#ea546c',
                    '600': '#d5294d',
                    '700': '#b31d3f',
                    '800': '#961b3c',
                    '900': '#811a39',
                    '950': '#48091a',
                },
            },
        },
    },

    plugins: [
        forms,
        typography,
        postcssImport,
        autoprefixer,
        postcssCustomProperties,
    ],
};
