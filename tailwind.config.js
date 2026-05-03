import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.jsx',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Outfit', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // Apple-like Primary Blue
                primary: {
                    50: '#F5F8FF',
                    100: '#E1EBFF',
                    200: '#C7D9FF',
                    300: '#A4BFFF',
                    400: '#7B9BFF',
                    500: '#5271FF', // Clean vivid blue
                    600: '#3A52E5',
                    700: '#2A3BBB',
                    800: '#233298',
                    900: '#212D7A',
                    950: '#141A4A',
                },
                // Refined Neutral Grays
                slate: {
                    50: '#F5F5F7',  // Apple background
                    100: '#EAEAEA',
                    200: '#D2D2D7',
                    300: '#BDBDC2',
                    400: '#98989D',
                    500: '#86868B',  // Apple sub-text
                    600: '#6E6E73',
                    700: '#515154',
                    800: '#333336',
                    900: '#1D1D1F',  // Apple primary text
                    950: '#000000',
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
            },
            boxShadow: {
                'apple': '0 4px 24px rgba(0, 0, 0, 0.04)',
                'apple-hover': '0 10px 40px rgba(0, 0, 0, 0.08)',
                'card': '0 1px 3px rgba(0,0,0,0.02), 0 4px 12px rgba(0,0,0,0.03)',
            }
        },
    },

    plugins: [forms],
};
