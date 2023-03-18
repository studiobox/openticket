const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './storage/framework/views/*.php', // for cached files
    './resources/views/**/*.blade.php', // all blade files
    './resources/js/**/*.vue', // all vue components
  ],
  theme: {
    fontFamily: {
      barlow: ['"Barlow"', ...defaultTheme.fontFamily.sans]
    },
    extend: {},
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
