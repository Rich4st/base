/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./**/*.php', './**/*.js'],
  theme: {
    extend: {
      fontFamily: {
        rockwell: [ 'Rockwell', 'Courier Bold', 'Courier', 'Georgia', 'Times', 'Times New Roman', 'serif'],
        bondoni: [ 'Bondoni', 'Courier Bold', 'Courier', 'Georgia', 'Times', 'Times New Roman', 'serif'],
      }
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
    require('daisyui')
  ],
}

