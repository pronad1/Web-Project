/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    extend: {
      colors:{
        "black" : "#000000",
      },
      fontFamily: {
        "hanken-grotesk": ["Hanken Grotesk", "sans-serif"],
      },
    },
  },
  plugins: [],
}

