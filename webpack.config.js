const path = require('path');

const UglifyJSPlugin = require('uglifyjs-webpack-plugin');

const MiniCssExtractPlugin = require('mini-css-extract-plugin');

module.exports = {
  entry: [
    './src/js/main.js',
    './src/css/main.scss',
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
        use: [MiniCssExtractPlugin.loader, 'css-loader', 'sass-loader']
      },
      // Css rules
      {
        test: /\.css$/,
        loader: 'style-loader'
      },
      {
        test: /\.css$/,
        loader: 'css-loader',
        options: {
          minimize: true
        }
      }
    ]
  },
  plugins: [
    new UglifyJSPlugin(),
    new MiniCssExtractPlugin({
      filename: 'main.min.css'
    })
  ],
};

// Add css and JS minification plugin

// Configure babel



// const path = require('path');

// // include the js minification plugin
// const UglifyJSPlugin = require('uglifyjs-webpack-plugin');

// // include the css extraction and minification plugins
// const MiniCssExtractPlugin = require("mini-css-extract-plugin");
// const OptimizeCSSAssetsPlugin = require("optimize-css-assets-webpack-plugin");

// module.exports = {
//   entry: ['./assets/js/src/app.js', './css/src/app.scss'],
//   output: {
//     filename: './assets/js/build/app.js',
//     path: path.resolve(__dirname)
//   },
//   module: {
//     rules: [
//       // perform js babelization on all .js files
//       {
//         test: /\.js$/,
//         exclude: /node_modules/,
//         use: {
//           loader: "babel-loader",
//           options: {
//             presets: ['@babel/preset-env']
//          }
//         }
//       },
//       // compile all .scss files to plain old css
//       {
//         test: /\.(sass|scss)$/,
//         use: [MiniCssExtractPlugin.loader, 'css-loader', 'sass-loader']
//       }
//     ]
//   },
//   plugins: [
//     // extract css into dedicated file
//     new MiniCssExtractPlugin({
//       filename: './assets/css/build/main.min.css'
//     })
//   ],
//   optimization: {
//     minimizer: [
//       // enable the js minification plugin
//       new UglifyJSPlugin({
//         cache: true,
//         parallel: true
//       }),
//       // enable the css minification plugin
//       new OptimizeCSSAssetsPlugin({})
//     ]
//   }
// };