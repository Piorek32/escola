
const path = require("path");
const BrowserSyncPlugin = require("browser-sync-webpack-plugin");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const { CleanWebpackPlugin } = require("clean-webpack-plugin");

module.exports = {
  context: __dirname,
  entry:  {

    app : "./src/app.js",
    contact : "./src/contactValidation.js",
    singup : "./src/singupValidation.js",
    

  },
  output: {
    path: path.resolve(__dirname, "dist"),
    filename: "[name].[contentHash].js"
  },
 
  plugins: [
     new BrowserSyncPlugin({
      
       proxy : 'http://localhost/escola/',
       host: 'localhost',
        port: 7070,
       files: [
        '**/*.php','**/*.css','**/*.js'
      ]

    //   //server: { baseDir: ['public'] }
     }),
    new MiniCssExtractPlugin({
      filename: "[name].[contentHash].css"
    }),
    new CleanWebpackPlugin({})
  ],
  module: {
    rules: [
      {
        test: /\.css$/,
        use: [
          MiniCssExtractPlugin.loader,
          { loader: "css-loader" },
          {
            loader: "postcss-loader",
            options: {
              config: {
                path: "postcss.config.js"
              }
            }
          }
        ]
      },
      
      {
        test: /\.(svg|png|JPG|jpg|gif)$/,
        use: {
          loader: "file-loader",
          options: {
            name: "[name].[hash].[ext]",
            outputPath: "imgs"
          }
        }
      },
      {
        test: /\.(otf|ttf|woff)$/,
        use: {
          loader: "file-loader",
          options: {
            name: "[name].[hash].[ext]",
            outputPath: "fonts"
          }
        }
      }
    ]
  }
};