/** @type {import('tailwindcss').Config} */
export default {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      "./node_modules/flowbite/**/*.js"
    ],
    theme: {
      extend: {
        colors: {
          blueJR: '#277FC6',
        },
        fontFamily: {
          jakartaSans: ['"Plus Jakarta Sans"', 'sans-serif'],
          newSosis: ['"New Sosis"', 'sans-serif'],
          comicComoc: ['"Comiccomoc"', 'sans-serif'],
        },
      },
    },
    plugins: [require("daisyui"), require("flowbite/plugin")],
  };