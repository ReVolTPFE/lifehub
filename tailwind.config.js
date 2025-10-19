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
                "primary": '#1e40af',
                "primary-dark": '#600b0b',
            },
        },
    },
    plugins: [],
}
