module.exports = {
  plugins: [
    // eslint-disable-next-line global-require
    require('@csstools/postcss-sass')(/* node-sass options */),
    // eslint-disable-next-line global-require
    require('autoprefixer')(),
    // eslint-disable-next-line global-require
    require('postcss-preset-env')({
      stage: 1,
    }),

    // eslint-disable-next-line global-require
    require('cssnano')({
      preset: 'default',
    }),
  ],
};
