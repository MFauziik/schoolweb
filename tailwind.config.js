import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: false,
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
                poppins: ['Poppins', 'sans-serif'],
            },
            colors: {
                primary: {
                    50: '#f5f7ff',
                    100: '#ebf0ff',
                    200: '#d1dcff',
                    300: '#a3baff',
                    400: '#7598ff',
                    500: '#4776ff',
                    600: '#1a54ff',
                    700: '#003be6',
                    800: '#002eb3',
                    900: '#002180',
                    950: '#00144d',
                },
                secondary: {
                    50: '#fdf4ff',
                    100: '#fae8ff',
                    200: '#f5d0fe',
                    300: '#f0abfc',
                    400: '#e879f9',
                    500: '#d946ef',
                    600: '#c026d3',
                    700: '#a21caf',
                },
                accent: {
                    light: '#fde68a',
                    DEFAULT: '#f59e0b',
                    dark: '#b45309',
                },
            }
        },
    },

    plugins: [forms],
};
