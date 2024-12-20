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
                'border': {
                    'normal': '#1e1e2a',
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
            backgroundImage: {
                'conic-gradient': 'conic-gradient(from var(--angle), #b31d3f, #07070e)',
                'shimmer': 'linear-gradient(33deg, rgba(14,14,26,0.2) 0%, rgba(14,14,26,0.4) 25%, rgba(14,14,26,0.6) 50%, rgba(14,14,26,0.4) 75%, rgba(14,14,26,0.2) 100%)',
            },
            animation: {
                'border-spin': '7s border-spin linear infinite',
                'shimmer': 'shimmer 5.5s linear infinite',
            },
            keyframes: {
                'border-spin': {
                    '0%': { '--angle': '0deg' },
                    '100%': { '--angle': '360deg' },
                },
                shimmer: {
                    '0%': { backgroundPosition: '0 0' },
                    '100%': { backgroundPosition: '-200% 0' },
                }
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
