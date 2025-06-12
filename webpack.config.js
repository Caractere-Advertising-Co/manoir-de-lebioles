const path = require("path");

module.exports = {
  watch: true,
  entry: {
    main: "./assets/src/js/index.js",
    style: "./assets/src/scss/style.scss",
  },

  mode: "production",
  output: {
    filename: "[name].bundle.js",
    path: path.resolve(__dirname, "assets/dist"),
  },
  module: {
    rules: [
      // Pour les fichiers CSS purs (ex: swiper.css)
      {
        test: /\.css$/i,
        use: ["style-loader", "css-loader"],
      },
      // Pour les fichiers SCSS
      {
        test: /\.s[ac]ss$/i,
        use: [
          "style-loader",
          "css-loader",
          "postcss-loader", // 👈 ici
          "sass-loader",
        ],
      },
    ],
  },
};
