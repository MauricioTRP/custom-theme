'use strict'

const path = require('path')
const autoprefixer = require('autoprefixer')
const miniCssExtractPlugin = require('mini-css-extract-plugin')

module.exports = {
  mode: 'development',
  entry: './assets/src/library/js/bootstrap.js',
  output: {
    filename: 'bootstrap.min.js',
    path: path.resolve(__dirname, 'assets/src/library')
  },
  plugins: [
    new miniCssExtractPlugin()
  ],
    module: {
    rules: [
      {
        test: /\.(css|scss)$/,
        use: [
          {
            // extracts css for each JS file that includes CSS
            loader: miniCssExtractPlugin.loader,
            options: {
              publicPath: path.resolve(__dirname, 'assets/src/library')
            }
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