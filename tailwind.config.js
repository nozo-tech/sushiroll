/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
        "./node_modules/flowbite-vue/**/*.{js,jsx,ts,tsx,vue}",
        "./node_modules/flowbite/**/*.{js,jsx,ts,tsx,vue}"
    ],
    plugins: [
        require("flowbite/plugin"),
        require("@catppuccin/tailwindcss")
    ],
}
