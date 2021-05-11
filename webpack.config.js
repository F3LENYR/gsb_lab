const path = require("path");
const webpack = require("webpack");
const devMode = process.env.NODE_ENV !== "production";

module.exports = {
  // Tells Webpack which built-in optimizations to use
  // In 'production' mode, Webpack will minify and uglify our JS code
  // If you leave this out, Webpack will default to 'production'
  mode: devMode ? "development" : "production",
  // Webpack needs to know where to start the bundling process,
  // so we define the main JS and Sass files, both under
  // the './src' directory
  entry: ["./src/index.ts"],
  // This is where we define the path where Webpack will place
  // the bundled JS file
  resolve: {
    extensions: [".ts", ".js"],
  },
  output: {
    path: path.resolve(__dirname, "dist/app"),
    // Specify the base path for all the assets within your
    // application. This is relative to the output path, so in
    // our case it will be ./public/assets
    publicPath: "",
    // The name of the output bundle. Path is also relative
    // to the output path
    filename: "js/app.min.js",
  },
  module: {
    // Array of rules that tells Webpack how the modules (output)
    // will be created
    rules: [
      {
        test: /\.ts?$/,
        use: "ts-loader",
      },
      {
        test: /\.(sa|sc|c)ss$/,
        use: ["style-loader", "css-loader", "postcss-loader", "sass-loader"],
      },
    ],
  },
  plugins: [
    // Configuration options for MiniCssExtractPlugin. Here I'm only
    // indicating what the CSS outputted file name should be and
    // the location
    new webpack.ProvidePlugin({
      $: ["jquery", "jquery.validation"],
      jQuery: ["jquery", "jquery.validation"],
      "window.$": ["jquery", "jquery.validation"],
      "window.jQuery": ["jquery", "jquery.validation"],
    }),
  ],
};
