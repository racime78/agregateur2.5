/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./**/*.html", 
    "./**/*.php",  
    "./**/*.js",
    "./**/*.tsx", 
  ],
  theme: {
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
