# ES6

### New changes
- Enhanced Object Properties
  - Shorter syntax for common object property defintion
  - `{x,y}` instead of `{x: x, y: y}`
- Template literals
  - Allows for multiline strings using tick marks instead of having to write code to tell it is a multiline string
  - `some string
    end of string`
  - `'some string'+`
    `'end of string'`
- Spead operator
  - An easy way to merge two objects/arrays into one. Works like `jQuery.extend(...obj, ...obj)`
  - `{...obj1, ...obj2}` instead of 
- Arrow functions
  - Shorter cleaner looking syntax for writing anonymous functions and callbacks, not to mention allows for reference to outside scope vars and `this` reference
  - `.map(num => num + 1)` instead of `.map(function(num) { num = num++; })`
