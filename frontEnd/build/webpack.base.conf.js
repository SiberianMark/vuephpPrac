var path = require('path')  //nodejs路径模块
var config = require('../config')
var utils = require('./utils')//nodejs常用函数库
var webpack = require('webpack')
var projectRoot = path.resolve(__dirname, '../')
var env = process.env.NODE_ENV//利用process模块与当前进程通信获取当前shell的环境变量
// check env & config/index.js to decide weither to enable CSS Sourcemaps for the
// various preprocessor loaders added to vue-loader at the end of this file
//根据环境判断是否使用cssSourceMap(less编译时对css的映射，便于调试),如果是开发环境则使用并加载css loader
var cssSourceMapDev = (env === 'development' && config.dev.cssSourceMap)
var cssSourceMapProd = (env === 'production' && config.build.productionSourceMap)
var useCssSourceMap = cssSourceMapDev || cssSourceMapProd

// define the different HOST between development and production environment
//设置后台开发服务器地址
var DEV_HOST = JSON.stringify('http://www.vuethink.jm:80/')
var PUB_HOST = JSON.stringify('http://www.vuethink.jm:80/')

module.exports = {
  entry: {
    app: './src/main.js'
  },
  output: {
    path: config.build.assetsRoot,
    publicPath: process.env.NODE_ENV === 'production' ? config.build.assetsPublicPath : config.dev.assetsPublicPath,
    filename: '[name].js'
  },
  eslint: {
    configFile: './.eslintrc.json'
  },
  plugins: [
    new webpack.DefinePlugin({
      HOST: process.env.NODE_ENV === 'production' ? PUB_HOST : DEV_HOST
    })
  ],
  resolve: {
    extensions: ['', '.js', '.vue'],
    fallback: [path.join(__dirname, '../node_modules')],
    alias: {
      'vue$': 'vue/dist/vue',
      'src': path.resolve(__dirname, '../src'),//解析为绝对路径输出/E:/github/VueThink/frontEnd/src;部署时输出[网站根目录]/VueThink/frontEnd/src
      'assets': path.resolve(__dirname, '../src/assets'),//解析为绝对路径
      'components': path.resolve(__dirname, '../src/components')//解析为绝对路径
    }
  },
  resolveLoader: {
    fallback: [path.join(__dirname, '../node_modules')]//__dirname获取当前模块所在的完整绝对路径
  },
  module: {
    preLoaders: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        loader: 'eslint'
      },
      {
        test: /\.vue$/,
        exclude: /node_modules/,
        loader: 'eslint'
      }
    ],
    loaders: [
      {
        test: /\.vue$/,
        loader: 'vue'
      },
      {
        test: /\.js$/,
        loader: 'babel',
        include: projectRoot,
        exclude: /node_modules/,
        query: {
          presets: ['es2015', 'stage-3']
        }
      },
      {
        test: /\.json$/,
        loader: 'json'
      },
      {
        test: /\.(png|jpe?g|gif|svg)(\?.*)?$/,
        loader: 'url',
        query: {
          limit: 10000,
          name: utils.assetsPath('img/[name].[hash:7].[ext]')//?
        }
      },
      {
        test: /\.(woff2?|eot|ttf|otf)(\?.*)?$/,
        loader: 'url',
        query: {
          limit: 10000,
          name: utils.assetsPath('fonts/[name].[hash:7].[ext]')
        }
      }
    ]
  },
  vue: {
    loaders: utils.cssLoaders({ sourceMap: useCssSourceMap }),
    postcss: [
      require('autoprefixer')({
        browsers: ['last 2 versions']
      })
    ]
  }
}
