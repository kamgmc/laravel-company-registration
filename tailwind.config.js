module.exports = {
    purge: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    plugins: [
        require('@tailwindcss/forms')
    ],
}
