# ExpressJS

### GET Routes
You can easily define routes using any of the http request methods such as `get`, `post`, `put` and `delete`. So for instance you could create an about page like so:

```
app.get('/about', (req, res) => {
	res.send("About us");
});
```

Let's take this one step further and say you have a page template that displays inside pages of a website and to get to each page you have a slug. Here is how a route for that might look:

```
app.get('/page/:slug', (req, res) => {
	res.send(`Slug: ${req.params.slug}`);
})
```