# Javascript

### Array.map() && Array.forEach()
These two functions are nearly the same and can be used to accomplish the same tasks. They essentially let you iterate over an array of values, while iterating through the values you have the capability to manipulate the values, and run comparisons on them.

```
var users = [
  {
    firstName: 'Thomas',
    lastName: 'Bird',
    email: 'Godoploid@gmail.com',
    qty: 2
  },
  {
    firstName: 'Kim',
    lastName: 'Tran',
    email: 'kimtran.sj@gmail.com',
    qty: 5
  }
];

console.log(users);

users.map((user) => {
  user.qty = user.qty + 2;
});

users.forEach((user) => {
  user.qty = user.qty + 1;
});

console.log(users);
```

What you'll notice about `.map()` and `.forEach()` is that the code is exactly the same minus the function name and still end up with the same exact result.

**Reference:** `https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/map`

----------

### Javascripts `fetch()`

Fetch is a built in method for creating ajax requests

```
fetch(url, {
    body: JSON.stringify(data), // must match 'Content-Type' header
    cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
    credentials: 'same-origin', // include, *omit
    headers: {
      'user-agent': 'Mozilla/4.0 MDN Example',
      'content-type': 'application/json'
    },
    method: 'POST', // *GET, PUT, DELETE, etc.
    mode: 'cors', // no-cors, *same-origin
    redirect: 'follow', // *manual, error
    referrer: 'no-referrer', // *client
  })
  .then(response => response.json())
  .then(data => console.log(data)) 
  .catch(error => console.error(error));
```

**Reference:** `https://developer.mozilla.org/en-US/docs/Web/API/Fetch_API/Using_Fetch`

----------

### Difference between .call() & .apply()

The difference is very simple, the first parameter to each of the methods is what you want to designate as the `this` property inside of the actual function being called. `.apply()` can only receive two arguments, first the `this` context and second an array of values. `.call()` receives as its first parameter the `this` context and can receive any number of props after that separated by comma.

So let's take this example:
```
function Foo(arg1, arg2, arg3) {
  // do something
}
```

Using `.call()`

```
Foo.call(this, arg1, arg2, arg3);
```

Using `.apply()`

```
Foo.call(this, [arg1, arg2, arg3]);
```

----------

### Understanding .bind()

Let's take this code for example:

```
function user() {
  this.model = {};

  function setModel(key, val) {
    this.model[key] = val;
  }
}
```
Now if we were to try to call at any point the `setModel()` function we would run into the issue that `this.model` would be `undefined`. This is because the innerscope of `setModel()` does not know the context of the outside scope. We can fix this easily by telling it this should be your scope.

```
function user() {
  this.model = {};

  function setModel(key, val) {
    this.model[key] = val;
  }.bind(this);
}
```

`.bind(this);` this forces the function to listen to the outside scopes `this` rather than it's own `this`.
----------