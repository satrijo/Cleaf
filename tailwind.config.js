/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./views/**/*.php", "./public/**/*.html"],
  theme: {
    extend: {},
  },
  plugins: [require("@tailwindcss/forms")],
};
