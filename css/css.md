# CSS, Sass, Less

## Flex grow property
Flex grow allows you to make columns of an infinite number of divisions. Take this markup for example:

```
<div class="content-wrapper">
  <div class="content"></div>
  <div class="sidebar"></div>
</div>
```

First lets start by putting some basic styles onto the code in order to setup for using flex properties:

```
.content-wrapper {
  display: flex;
  flex-direction: row;
}

.content {}
.sidebar {}
```

Now `display: flex;` is what is directly responsible for notating that this `div` should be treated as a flex element. Next we `flex-direction: row;` this tells the browser that all items inside of the `div` should be treated as columns and sit side by side. The same can be achieved in pre flex code by saying something like:

```
.content, .sidebar {
  display: inline-block;
}
```

Next let's say for instance we want to make both the `.content` and `.sidebar` divs equal width, to do this we would make our `flex-grow` property equal. This could be any set of numbers as long as they equal, for instance the `flex-grow` property could be 1 to 1, 50 to 50 or 100 to 100 and so on and so forth. Here's an example below:

```
.content, .sidebar {
  flex-grow: 1;
}
```

But let's say that we want to divide this up, let's say that we want the content area to be 9/12 of the entire space of the wrapper and the sidebar to be 3/12. We could do this with the following code:

```
.content {
  flex-grow: 12;
}

.sidebar {
  flex-grow: 3;
}
```

This could be simplified further to:

```
.content {
  flex-grow: 4;
}

.sidebar {
  flex-grow: 1;
}
```
