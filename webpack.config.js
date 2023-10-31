'use strict'

'use strict'

const path = require('path')
const autoprefixer = require('autoprefixer')

module.exports = {
  mode: 'development',
  entry: './assets/src/library/js/bootstrap.js',
  output: {
    filename: 'bootstrap.min.js',
    path: path.resolve(__dirname, 'assets/src/library')
  },
    module: {
    rules: [
      {
        test: /\.(scss)$/,
        use: [
          {
            // Adds CSS to the DOM by injecting a `<style>` tag
            loader: 'style-loader'
          },
          {
            // Interprets `@import` and `url()` like `import/require()` and will resolve them
            loader: 'css-loader'
          },
          {
            // Loader for webpack to process CSS with PostCSS
            loader: 'postcss-loader',
            options: {
              postcssOptions: {
                plugins: [
                  autoprefixer
                ]
              }
            }
          },
          {
            // Loads a SASS/SCSS file and compiles it to CSS
            loader: 'sass-loader'
          }
        ]
      }
    ]
  }
}