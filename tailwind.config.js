/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    "./node_modules/tw-elements/dist/js/**/*.js"
  ],
  theme: {
    extend: {},
    //#2dd3c7
  },
  plugins: [require("@tailwindcss/forms"), require("tw-elements/dist/plugin.cjs")],
  darkMode: 'class',
  
}

