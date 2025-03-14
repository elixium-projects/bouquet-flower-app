import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                playfair: ['"Playfair Display"', "serif"],
            },
        },
        colors: {
            default: "var(--default)",
            second: "var(--second)",
            tertiary: "var(--tertiary)",
            "accent-1": "var(--accent-1)",
            "accent-2": "var(--accent-2)",
            light: "var(--light)",
            white: "#FFF",
            black: "#000",
            "gray-100": "var(--gray-100)",
            "background-100": "var(--background-100)",
            "background-400": "var(--background-400)",
            "background-300": "var(--background-300)",
            "background-200": "var(--background-200)",
            "background-100": "var(--background-100)",
            "primary-900": "var(--primary-900)",
            "primary-800": "var(--primary-800)",
            "primary-700": "var(--primary-700)",
            "primary-600": "var(--primary-600)",
            "primary-500": "var(--primary-500)",
            "primary-400": "var(--primary-400)",
            "primary-300": "var(--primary-300)",
            "primary-200": "var(--primary-200)",
            "primary-100": "var(--primary-100)",
            "surface-900": "var(--surface-900)",
            "surface-800": "var(--surface-800)",
            "surface-700": "var(--surface-700)",
            "surface-600": "var(--surface-600)",
            "surface-500": "var(--surface-500)",
            "surface-400": "var(--surface-400)",
            "surface-300": "var(--surface-300)",
            "surface-200": "var(--surface-200)",
            "surface-100": "var(--surface-100)",
            "danger-900": "var(--danger-900)",
            "danger-800": "var(--danger-800)",
            "danger-700": "var(--danger-700)",
            "danger-600": "var(--danger-600)",
            "danger-500": "var(--danger-500)",
            "danger-400": "var(--danger-400)",
            "danger-300": "var(--danger-300)",
            "danger-200": "var(--danger-200)",
            "danger-100": "var(--danger-100)",
            "info-100": "var(--info-100)",
            "info-500": "var(--info-500)",
            "success-500": "var(--success-500)",
            "warning-500": "var(--warning-500)",
            "green-500": "rgb(34 197 94 / var(--tw-bg-opacity, 1))",
        },
    },
    plugins: [],
};
