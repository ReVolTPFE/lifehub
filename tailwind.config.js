// package.json added only for tailwind autocompletion on jetbrains IDEs

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './assets/**/*.js',
        './templates/**/*.html.twig',
    ],
    theme: {
        extend: {
            colors: {
                "primary": '#10b981',
                "primary-hover": '#0f766e',
                "gray": {
                    "light": "#f2f6f9",
                },
            },
        },
    },
    plugins: [],
}
