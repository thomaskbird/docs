# Programmatically grabbing srcs

1. Run a script that grabs all of the items in the page you are looking for.
2. Convert those to an array
3. Reduce the array down to the values you want
4. Use javascript to iterate through the array of values and open a browser window with each item

### Example:
*1. Find the items*
```javascript
const items = document.querySelectorAll('<SELECTOR>')
```

*2. Convert to array*
```javascript
const itemsArray = [...items]
```

*3. Reduce to the values you want*
```javascript
const srcs = itemsArray.map(item => item.attributes.src.nodeValue)
```

*4. Use javascript to open new tab with each one of the array values*
```javascript
srcs.forEach(url => {
  window.open(url)
})
```
