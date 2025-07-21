/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    ],
    theme: {
        extend: {
            colors: {
                brown: {
                    100: "#EFE6DD",
                    200: "#DCC3A4",
                    300: "#C79C6E",
                    400: "#B2783E",
                    500: "#8B4513",
                    600: "#6B3310",
                    700: "#4D230B",
                    800: "#331506",
                    900: "#1A0A03",
                },
                caramel: {
                    100: "#DAA520",
                },
            },
        },
    },
    plugins: [],
};
