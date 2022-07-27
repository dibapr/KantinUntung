# KantinUntung
### Tugas Kuliah - A project I made for college exam

Basically this is a canteen website where you can make an online menu order.

> Tools used in this project
- PHP
- MySQL
- phpMyAdmin
- TailwindCSS (CSS Framework)
- Flowbite (Component for TailwindCSS)
- Bootstrap Icon (Icons)

Installed using node.js package moduler

> Installation
## Tailwind CSS
1. ### Install Tailwind CSS
Install tailwindcss via npm, and create your tailwind.config.js file.
  - type `npm install -D tailwindcss`
  - type `npx tailwindcss init`
2. ### Configure your template paths
Add the paths to all of your template files in your tailwind.config.js file.
`
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
   plugins: [require('@tailwindcss/forms')],
};
`
3. ### Add the Tailwind directives to your CSS
Add the @tailwind directives for each of Tailwind’s layers to your main CSS file.
  - `@tailwind base;`
  - `@tailwind components;`
  - `@tailwind utilities;`
4. ### Start the Tailwind CLI build process
Run the CLI tool to scan your template files for classes and build your CSS.
  - `npx tailwindcss -i ./src/css/input.css -o ./dist/output.css --watch`
 
 ## CDN Link
 1. Bootstrap Icon
 - Include the icon fonts stylesheet—in your website <head>
 `<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">`
 
 2. Flowbite
 - Require the following minified stylesheet inside the `head` tag:
 `<link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.1/dist/flowbite.min.css" />`
 - And include the following javascript file before the end of the `body` element:
 `<script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>`
 
 # Thanks for coming!!
