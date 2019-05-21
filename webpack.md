# Webpack

## Main concepts
- Entry
	- Indicates which module webpack should use to being building out its internal dependency graph. This should be the root funnel point for the app. In the case of the `react-boilerplate` it points to `src/index.tsx`.
- Output
	- This is where the bundled resource gets placed, defaults to `./dist/main.js`
- Loaders
	- Loaders allow webpack to understand filetypes other than js and json like sass, css, etc.
	- Loaders have to main properties:
		- `test` example `/\.tsx$/` this is a regex expression
		- `use` example `raw-loader`
	- Example
		```
		module: {
			rules: [
				{ test: /\.tsx$/, use: 'some_loader' }
			]
		}
		```
	- This basically says:
		```
		"Hey webpack compiler, when you come across a path that resolves to a '.txt' file inside of a require()/import statement, use the raw-loader to transform it before you add it to the bundle."
		```
- Plugins
	- These are used to further extend webpacks capabilities, `html-webpack-plugin` is a plugin that creates an html file and injects the bundle files.
	- Here is an example:
		```
		plugins: [
			new HtmlWebpackPlugin({ template: './src/index.html' })
		]
		```
- Mode
	- Runs webpack in either `development`, `production` or `none`. If production webpack enables built-in optimizations when bundling
- Browser Compatibility
	