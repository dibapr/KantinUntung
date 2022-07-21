/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{php,js}"],
  theme: {
    extend: {
      colors: {
        "light-green": "#86efac",
        "mid-green": "#86efac",
        "dark-green": "#166534",
        "logout": "#ef4444",
      },
    },
  },
  plugins: [require("@tailwindcss/forms")],
};
