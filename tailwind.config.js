const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        container: {
                center: true,
                padding: "1rem",
            },

         screens: {
            sm: "640px",
            // => @media (min-width: 640px) { ... }

            md: "768px",
            // => @media (min-width: 768px) { ... }

            lg: "1024px",
            // => @media (min-width: 1024px) { ... }

            xl: "1248px",
            // => @media (min-width: 1280px) { ... }
        },
        
        fontFamily: {
            sans: ["'Exo 2'", "Open Sans", "Helvetica", "Arial", "sans-serif"],
            josefin: ["Josefin Sans", "sans-serif"],
            serif: ["serif"],
        },

        extend: { 
            colors: {
                primary: {
                    default: "#1adfff",
                },
                dark: { default: "#323232" },
                black: { default: "#212121" },
            },
            boxShadow: {
                dark: "0 20px 25px -2px rgba(0,0,0,.4)",
            },
        },
    },

    variants: {
        opacity: ['responsive', 'hover', 'focus', 'disabled'],
    },

    plugins: [require('@tailwindcss/ui')],
};
