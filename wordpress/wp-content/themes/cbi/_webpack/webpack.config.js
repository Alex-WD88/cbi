const webpack = require('webpack');
const path = require('path');
const autoprefixer = require('autoprefixer');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const WriteFilePlugin = require('write-file-webpack-plugin'); //to create folders
const AssetsPlugin = require('assets-webpack-plugin');
const {CleanWebpackPlugin} = require('clean-webpack-plugin');
const TerserPlugin = require('terser-webpack-plugin');
const OptimizeCSSAssetsPlugin = require("optimize-css-assets-webpack-plugin");

const DEV = process.env.NODE_ENV !== 'production'

const env = require('./env.config')

let ENTRY = env.ENTRY;

if(DEV) {
	ENTRY = Object.values(ENTRY);
	ENTRY.push('webpack-hot-middleware/client');
	ENTRY = {'app': ENTRY};
}

let SCSSuse = [
	DEV ? { loader: 'style-loader', options: { sourceMap: true }} : MiniCssExtractPlugin.loader,
	{
		loader: 'css-loader',
		options: { sourceMap: true }
	},
];

if(!DEV)
	SCSSuse.push({
		loader: 'postcss-loader',
		options: {
			ident: "postcss",
			sourceMap: true,
			plugins: () => [
				autoprefixer({}),
			]
		}
	});
SCSSuse.push({
	loader: 'sass-loader',
	options: { sourceMap: true }
});

module.exports = {
	mode: DEV ? 'development' : 'production',
	devtool: 'source-map',
	output: {
		path: path.join(__dirname, '../build'),
		filename: DEV ? 'app.js' : '[name].[hash:8].js',
		publicPath: '/'
	},
	entry: ENTRY,
	module: {
		rules: [
		{
			test: /\.js$/,
			exclude: /node_modules/,
			loader: 'babel-loader',
			options: {
				presets: ['env']
			}
		},
		{
			test: /\.(scss$|css$)/,
			use: SCSSuse
		},
		{
			test: /\.(woff(2)?|ttf|eot|svg)(\?v=\d+\.\d+\.\d+)?$/,
			include: [
				path.resolve(__dirname, "../src/fonts"),
			],
			use: [{
				loader: 'file-loader',
				options: {
					name: '[name].[ext]',
					outputPath: 'fonts',
					publicPath: env.PUBLIC_PATH + 'fonts',
				}
			}]
		},
		{
			test: /\.(png|jpg|gif|svg)$/,
			exclude: [
				path.resolve(__dirname, "../src/fonts"),
			],
			loader: 'file-loader',
			options: {
				name: '[name].[ext]',
				outputPath: 'images',
				publicPath: env.PUBLIC_PATH + 'images',
			}
		},
	]},

	optimization: {
		minimize: !DEV,
		minimizer: [
			new OptimizeCSSAssetsPlugin({
				cssProcessorOptions: {
					map: {
						inline: false,
						annotation: true,
					}
				}
			}),
			new TerserPlugin({
				terserOptions: {
					compress: {
						warnings: false
					},
					output: {
						comments: false
					}
				},
				sourceMap: false
			})
		],
	},
	
	plugins: [
		new CleanWebpackPlugin(),
		DEV && new webpack.HotModuleReplacementPlugin(),
		new WriteFilePlugin({
			// exclude hot-update files
			test: /^(?!.*(hot)).*/,
		}),
		!DEV && new MiniCssExtractPlugin({
			filename: DEV ? '[name].css' : '[name].[hash:8].css'
		}),
		new AssetsPlugin({
			path: path.join(__dirname, '../build'),
			filename: 'assets.json',
		})
	].filter(Boolean),
	
	watch: true,
	//devtool: devMode ? devtool : false
};
