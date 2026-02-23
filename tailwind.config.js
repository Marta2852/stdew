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
                // Warm Farm palette
                primary: {
                    DEFAULT: '#B58E1A', // darker muted gold
                    600: '#AA7F1A',
                },
                secondary: {
                    DEFAULT: '#34D399', // soft green
                },
                surface: '#121826',
                bg: '#0B1220',
                text: '#F8FAFC',
                muted: '#B7C0C8',
                // map common colors to palette so existing classes work
                blue: {
                    500: '#B58E1A',
                    600: '#B58E1A',
                    700: '#B58E1A',
                },
                green: {
                    50: '#ECFDF5',
                    100: '#DCFCE7',
                    200: '#BBF7D0',
                    500: '#34D399',
                    600: '#10B981',
                    700: '#059669',
                },
            },
        },
    },

    plugins: [forms],
};
