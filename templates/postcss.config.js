module.exports = ctx => ({
  plugins: [
    require('postcss-import'),
    require('postcss-cssnext'),
    require('tailwindcss')('./tailwind.js'),
    ctx.env === 'production' ? require('cssnano')({}) : false
  ]
});
