/** @type {import('tailwindcss').Config} */
const colors = require('tailwindcss/colors')


module.exports = {
  content: [
    "./**/*.html", 
    "./**/*.php",  
    "./**/*.js",
    "./**/*.tsx", 
  ],
  theme: {
    darkMode: 'class',
    extend: {
      fontFamily: {
        'poppins': ['Poppins', 'sans-serif'],
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms'), 
  ],
}
