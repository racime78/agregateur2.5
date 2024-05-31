/** @type {import('tailwindcss').Config} */
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
