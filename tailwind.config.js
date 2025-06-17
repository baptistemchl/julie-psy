// tailwind.config.js
/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './index.html',
    './src/**/*.{js,ts,jsx,tsx,astro}',
    './components/**/*.{js,ts,jsx,tsx,astro}',
  ],
  theme: {
    extend: {
      colors: {
        primary: '#A8DADC',         // Bleu ciel doux
        accent: '#FFE5D9',          // Beige rosé
        neutral: '#F5F5F5',         // Fond très clair
        dark: '#2F2F2F',            // Texte principal
        grayish: '#6E6E6E',         // Texte secondaire
        border: '#EAEAEA',          // Lignes/UI
      },
      fontFamily: {
        serif: ['"Cormorant Garamond"', 'serif'],
        sans: ['Inter', 'sans-serif'],
      },
      borderRadius: {
        DEFAULT: '0.75rem',
        xl: '1.25rem',
      },
      boxShadow: {
        subtle: '0 4px 12px rgba(0,0,0,0.04)',
      },
      gridRow: {
        'span-1': 'span 1 / span 1',
        'span-2': 'span 2 / span 2',
      },
      safelist: ['row-span-1','row-span-2'],
    },
  },
  plugins: [],
}
