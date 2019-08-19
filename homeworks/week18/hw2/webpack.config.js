const path = require('path');

module.exports = {
  entry: './index.js',
  output: {
    filename: 'bundle.js',
    path: path.resolve(__dirname, 'dist')
  }
};

/*
Webpack 使用方法
1. 先安裝 webpack 封包，npm install webpack webpack-cli --save-dev
2. 更改 package.json，在 script 裡面加入 "start": "webpack --mode development", "build" : "webpack --mode production"
3. 用 npm run start / npm run build 執行，後者會進行壓縮
*/
