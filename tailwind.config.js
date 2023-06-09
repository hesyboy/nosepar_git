const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },


        screens: {
            'sm': '640px',
            // => @media (min-width: 640px) { ... }

            'md': '768px',
            // => @media (min-width: 768px) { ... }

            'lg': '1000px',
            // => @media (min-width: 1024px) { ... }

            'xl': '1200px',
            // => @media (min-width: 1280px) { ... }

            '2xl': '1200px',
            // => @media (min-width: 1536px) { ... }
          },


    },

            daisyui: {
                rtl: true,
                themes: [
                {
                    mytheme: {

                        "primary": "#1d4ed8",

                        "secondary": "#30dd92",

                        "accent": "#f4165c",

                        "neutral": "#271627",

                        "base-100": "#FCFCFD",

                        "info": "#59AAD9",

                        "success": "#27D3BC",

                        "warning": "#F3C459",

                        "error": "#EB376A",
                    },
                },
                ],
            },

    plugins: [require('daisyui')],
};
