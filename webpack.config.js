const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

const jsConfig = {
    entry: {
        Main: ['./assets/js/script.js'],
        FadeInBottom: ['./assets/js/FadeAnimation/FadeInBottom.js'],
        FormLabel: ['./assets/js/Form/FormLabel/FormLabel.js'],
        FormRodo: ['./assets/js/Form/FormRodo/FormRodo.js'],
        HeaderPosition: ['./assets/js/HeaderPosition/HeaderPosition.js'],
        StringLimitation: ['./assets/js/StringLimitation/StringLimitation.js'],
        SwiperCarousels: ['./assets/js/SwiperCarousels/SwiperCarousels.js'],
        VideoHandler: ['./assets/js/Video/VideoHandler.js'],
        WaveStore: ['./assets/js/WaveDecoration/WaveStore/WaveStore.js'],
    },
    output: {
        path: path.resolve(__dirname, 'assets/public/dist/js'),
        filename: '[name].js'
    },
    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: ['@babel/preset-env'],
                        plugins: ['@babel/transform-runtime', "@babel/plugin-proposal-class-properties"]
                    }
                }
            },
        ]
    },
    devServer: {
        contentBase: path.resolve(__dirname, 'assets'),
        publicPath: '/public/dist/js/'
    }
}

const scssConfig = {
    entry: {
        style: ['./assets/sass/style.scss'],
    },
    output: {
        path: path.resolve(__dirname, 'assets/public/dist/css'),
    },
    module: {
        rules: [
            {
                test: /\.(png|svg|jpg|gif)$/,
                loader: 'file-loader',
                options: {
                    outputPath: 'images',
                },
            },
            {
                test: /\.s[ac]ss$/i,
                use: [
                    'style-loader',
                    {
                        loader: MiniCssExtractPlugin.loader,
                    },
                    {
                        loader: 'css-loader',
                        options: {
                            sourceMap: true,
                        },
                    },
                    {
                        loader: 'postcss-loader',
                        options: {
                            ident: 'postcss',
                            sourceMap: true,
                            plugins: [
                                require('autoprefixer'),
                            ]
                        }
                    },
                    {
                        loader: 'sass-loader',
                        options: {
                            sourceMap: true,
                            implementation: require('dart-sass'),
                            sassOptions: {
                                fiber: false,
                                sourceMap: true,
                            },
                        },
                    },
                ],
            },
        ],
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: '[name].css',
        }),
    ],
}

module.exports = [jsConfig, scssConfig];