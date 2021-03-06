module.exports = {
  content: [
    './resources/views/guest/index.blade.php',
    './resources/js/guest.js',
    './resources/js/**/*.vue',
  ],
  theme: {
    screens: {
      'xxs': '390px',

      'xs': '540px',
      
      'sm': '640px',
      // => @media (min-width: 640px) { ... }

      'md': '768px',
      // => @media (min-width: 768px) { ... }

      'lg': '1024px',
      // => @media (min-width: 1024px) { ... }

      'xl': '1280px',
      // => @media (min-width: 1280px) { ... }

      '2xl': '1536px',
      // => @media (min-width: 1536px) { ... }
    },
    extend: {
      colors: {
        'deliveroo': '#00CCBC',
        'viola': '#440063',
        'bgcheck': '#d1ff777a',
      },
      container: {
        center: true,
      }
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
