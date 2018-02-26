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
