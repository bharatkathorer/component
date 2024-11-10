import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {

    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',

    ],

    theme: {
        extend: {
            fontSize: {
                'xs': '0.625rem',   // 10px
                'xss': '0.5rem',    // 8px
            },
            screens: {
                'xs': '480px',  // Custom breakpoint for extra small screens
                'xss': '320px', // Custom breakpoint for extra extra small screens
            },
            colors: {
                primary: {
                    DEFAULT: '#3490dc',       // Primary color
                    light: '#6cb2eb',         // Light variant of primary color
                    dark: '#1d4ed8',          // Dark variant of primary color
                    disable: '#d1d5db',       // Disabled variant of primary color
                    hover: '#2779bd',         // Slightly darker for hover
                    active: '#1c64b0',        // Darker for active state
                    focus: '#93c5fd',         // Lighter, for focus ring or highlights
                },
                secondary: {
                    DEFAULT: '#ffed4a',       // Secondary color
                    light: '#fff5d9',         // Light variant of secondary color
                    dark: '#f9d104',          // Dark variant of secondary color
                    disable: '#d1d5db',       // Disabled variant of secondary color
                    hover: '#fadb0a',         // Slightly darker for hover
                    active: '#f1c40f',        // Darker for active state
                    focus: '#ffeb8e',         // Lighter, for focus ring or highlights
                },
                success: {
                    DEFAULT: '#38c172',       // Success color
                    light: '#6ee7b7',         // Light variant of success color
                    dark: '#2f855a',          // Dark variant of success color
                    disable: '#d1d5db',       // Disabled variant of success color
                    hover: '#2f9e69',         // Slightly darker for hover
                    active: '#267849',        // Darker for active state
                    focus: '#81e6d9',         // Lighter, for focus ring or highlights
                },
                warning: {
                    DEFAULT: '#ffcc00',       // Warning color
                    light: '#fff5d9',         // Light variant of warning color
                    dark: '#f59e0b',          // Dark variant of warning color
                    disable: '#d1d5db',       // Disabled variant of warning color
                    hover: '#ffbb00',         // Slightly darker for hover
                    active: '#e5a500',        // Darker for active state
                    focus: '#ffe066',         // Lighter, for focus ring or highlights
                },
                danger: {
                    DEFAULT: '#e3342f',       // Danger color
                    light: '#f56565',         // Light variant of danger color
                    dark: '#c53030',          // Dark variant of danger color
                    disable: '#d1d5db',       // Disabled variant of danger color
                    hover: '#cc1f1a',         // Slightly darker for hover
                    active: '#b91c1c',        // Darker for active state
                    focus: '#fc8181',         // Lighter, for focus ring or highlights
                },
                info: {
                    DEFAULT: '#17a2b8',       // Info color
                    light: '#63c2de',         // Light variant of info color
                    dark: '#117a8b',          // Dark variant of info color
                    disable: '#d1d5db',       // Disabled variant of info color
                    hover: '#138496',         // Slightly darker for hover
                    active: '#0e7490',        // Darker for active state
                    focus: '#8bd3ea',         // Lighter, for focus ring or highlights
                },
                light: {
                    DEFAULT: '#efe7e7',       // White (primary color in light mode)
                    light: '#d8dadc',         // Light gray (slightly off-white for backgrounds or surfaces)
                    dark: '#e9ecef',          // Darker gray (for borders or secondary elements)
                    disable: '#adb5bd',       // Disabled gray color (muted)
                    hover: '#e5ebf1',         // Slightly darker for hover
                    active: '#e2e6ea',        // Darker for active state
                    focus: '#ece8e8',         // Retain default for focus (no change)
                },
                dark: {
                    DEFAULT: '#000000',       // Black (primary info color in dark mode)
                    light: '#4a4a4a',         // Lighter variant of black
                    dark: '#1a1a1a',          // Darker shade of black (almost pure black)
                    disable: '#6b7280',       // Disabled gray color (muted)
                    hover: '#222222',         // Slightly lighter for hover
                    active: '#111111',        // Darker for active state
                    focus: '#333333',         // Lighter, for focus ring or highlights
                },
                disable: {
                    DEFAULT: '#d1d5db',       // General disabled color
                },
            },

            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};

