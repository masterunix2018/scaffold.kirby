const webpack = require('webpack');
const merge = require('webpack-merge');
const dev = require('./webpack.config.js');
const CompressionPlugin = require('compression-webpack-plugin');

module.exports = merge(dev, {
  plugins: [new CompressionPlugin({ test: /\.js/ })],
  output: {
    filename: '[name]/js/[name].[chunkhash].js'
  },
  mode: 'production'
});
