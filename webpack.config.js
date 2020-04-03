const webpack = require('webpack');
const path = require('path');
const UglifyJSPlugin = require('uglifyjs-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const OptimizeCSSAssetsPlugin = require('optimize-css-assets-webpack-plugin');

module.exports = {
  entry: [
    './src/js/main.js'
  ],
  output: {
    filename: 'bundle.js',
    path: path.resolve(__dirname, 'dist'),
  },
  module: {
    rules: [
      // Js rules
      {
        test: /\.js$/,
        exclude: /(node_modules|bower_components)/,
        use: {
          loader: 'babel-loader',
          options: {
            presets: ['@babel/preset-env']
          }
        }
      },
      // Scss rules
      {
        test: /\.scss$/,
        use: [
          MiniCssExtractPlugin.loader,
          'css-loader',
          'sass-loader'
        ]
      },
      // Css rules
      {
        test: /\.css$/,
        use: [
          {
            loader: 'style-loader'
          },
          {
            loader: 'css-loader',
            options: {
              minimize: true
            }
          }
        ]
      },
      { 
        test: /\.(png|svg|jpg|gif)$/i,
        use: [
          {
            loader: 'file-loader',
            options: {
              name: '[name].[ext]',
              outputPath: 'images/',
              publicPath: '/wp-content/themes/woobits/dist/images',
            }
          }
        ] 
      }
    ]
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: 'main.min.css'
    }),
    new webpack.ProvidePlugin({
      $: 'jquery',
      jQuery: 'jquery',
      'window.jQuery': 'jquery'
    })
  ],
  externals: {
    jquery: 'jQuery'
  },
  optimization: {
    minimizer: [
      new UglifyJSPlugin({
        cache: true,
        parallel: true
      }),
      new OptimizeCSSAssetsPlugin({})
    ]
  }
};