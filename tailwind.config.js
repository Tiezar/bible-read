/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./app/Views/**/*.php",  // Olha dentro das Views
    "./public/**/*.php",     // Olha na public
    "./public/**/*.js"       // Olha nos JS
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Inter', 'sans-serif'], // Fonte bonita pra leitura
        serif: ['Merriweather', 'serif'], // Fonte clássica de Bíblia
      },
      colors: {
        'igreja-azul': '#0071ceff',
        'igreja-salmao': '#ffb59eff',
      }
    },
  },
  plugins: [
    require('@tailwindcss/typography'), // DICA: Instale esse plugin depois pra texto longo ficar lindo
  ],
}