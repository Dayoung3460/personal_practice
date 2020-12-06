const path = require('path');
// 로더는 그냥 모듈 안에 넣어서 사용하면 되는데
// 플러그인은 이렇게 변수에 넣어서 가져와야함.
// 문서에 다 나와잇음. 변수랑 리콰이어 어떻게 가져와야하는지.
var HtmlWebpackPlugin = require("html-webpack-plugin");


module.exports = {
  // mode: "development",
  entry: {
    index: "./source/index.js",
    about: "./source/about.js",
  },
  output: {
    path: path.resolve(__dirname, "public"),
    // [name] means entry's file name.
    filename: "[name]_bundle.js",
  },
  module: {
    rules: [
      {
        // 확장자가 css 파일이라는 뜻
        test: /\.css$/,
        use: [
          // css style 요소도 같이 번들링되서 네트웤에서
          // css 파일 안가져와도 됨ㅇㅇ
          // css-loader 먼저 실행(뒤쪽부터) css파일을 실행시키고
          // style-loader 통해서 스타일을 html 헤더에 스타일 넣는 것 처럼 스타일이 주입됨.
          // 크롬 개발자모드에서 elements 확인해보삼.
          "style-loader",
          "css-loader",
        ],
      },
    ],
  },
  plugins: [
    new HtmlWebpackPlugin({
      // 템플릿 파일을
      template: "./source/index.html",
      // 어떤 이름으로 번들링 할 것인가.
      filename: "./index.html",
      // 필요없는 파일을 한 번더 걸러줌. 위에 엔트리에서 정했던 파일이름.
      chunks: ["index"],
    }),
    new HtmlWebpackPlugin({
      template: "./source/about.html",
      filename: "./about.html",
      chunks: ["about"]
    }),
  ],
};