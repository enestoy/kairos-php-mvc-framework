/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './app/Views/**/*.php',
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Inter', 'ui-sans-serif', 'system-ui', 'Segoe UI', 'sans-serif'],
      },
      colors: {
        // Lacivert (navy) ana marka rengi
        brand: {
          50:  '#eef1fa',
          100: '#d7def4',
          200: '#b0bee9',
          300: '#8094d9',
          400: '#5168c2',
          500: '#3346a3',
          600: '#243584', // ana renk (lacivert)
          700: '#1d2a69',
          800: '#172150', // koyu lacivert
          900: '#111838', // sidebar
          950: '#0a0f24',
        },
      },
      boxShadow: {
        card: '0 4px 16px rgba(45, 58, 75, 0.06)',
        'card-hover': '0 12px 30px rgba(45, 58, 75, 0.12)',
        auth: '0 20px 50px rgba(20, 30, 45, 0.35)',
      },
    },
  },
  plugins: [],
}
