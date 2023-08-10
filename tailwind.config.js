/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./**/*.php', './**/*.js'],
  theme: {
    extend: {
      fontFamily: {
        rockwell: ['Rockwell', 'Courier Bold', 'Courier', 'Georgia', 'Times', 'Times New Roman', 'serif'],
        bondoni: ['Bodoni MT', 'Didot', 'Courier Bold', 'Courier', 'Georgia', 'Times', 'Times New Roman', 'serif'],
        copp: ['Copperplate', 'Copperplate Gothic Light', 'fantasy'],
        papyrus: ['Papyrus', 'fantasy'],
        courier: ['Courier New', 'Courier', 'Lucida Sans Typewriter', 'Lucida Typewriter', 'monospace'],
        meshed: ['MeshedDisplayBlack', 'Georgia', 'Times', 'Times New Roman', 'serif'],
        meshedLight: ['MeshedDisplayLight', 'Georgia', 'Times', 'Times New Roman', 'serif'],
        news: ['Newsreader', 'Georgia', 'Times', 'Times New Roman', 'serif'],
        pop: ['Poppins', 'Georgia', 'Times', 'Times New Roman', 'serif'],
      }
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
    require('daisyui')
  ],
}

