# CSS Grid Layouts

Recently I had an interview with Nike and I thought I understood CSS Grid, but during the interviews react coding exercise I was struggling to make a 4 column layout using css grid. As a rule of thumb, if I ever get stumped by a interview question I always make it a point to go and learn whatever it was.

### The requirements for the coding exercise
* Should fetch Photos from: https://jsonplaceholder.typicode.com/photos
  (BONUS): replace url of Photos with https://picsum.photos/600?random={id}
* Only show the first 100 results
* Photos should be in a 4 colum grid
  * if window width < 1024px grid should be 2 column grid
  * if window width < 600px grid should be 1 column grid.
* Should be able to like a photo
* Should display a title

### My solution
```javascript
import React, { useEffect, useState } from "react";
import "./styles.css";

const App = () => {
  const [photos, setPhotos] = useState([]);

  useEffect(() => {
    const getPhotos = async () => {
      try {
        const photosRequest = await fetch(
          "https://jsonplaceholder.typicode.com/photos"
        );

        if (photosRequest.ok) {
          const photosResponse = await photosRequest.json();
          setPhotos(photosResponse.slice(0, 100));
        }
      } catch (e) {
        console.error(e);
      }
    };

    getPhotos();
  });

  return (
    <div className="wrapper">
      {photos.map((photo) => (
        <div className="photo">
          <img
            key={photo.id}
            src={photo.url}
            alt={photo.title}
            title={photo.title}
          />
          <div className="actions">
            <button>Like</button>
          </div>
        </div>
      ))}
    </div>
  );
};

export default App;
```

### The css
```css
.wrapper {
  max-width: 100%;
  display: flex;
  flex-wrap: wrap;
}

img {
  width: 25%;
}

@media (max-width: 720px) {
  img {
    width: 50%;
  }
}

@media (max-width: 400px) {
  img {
    width: 100%;
  }
}
```

After trying a couple things and being about 90% to the solution, for the sake of time I asked the interviewer if I could just use `display: flex` since I was more familiar with it.

### The fix
Afterwards I did a bit more research and found the solution. My hangup was because I didn't understand the `fr unit` of measure, `grid-template-columns: 1fr 1fr 1fr 1fr;` piece. Once I understood that `fr` unit represents a fraction of the available space in the grid container. It all became very easy, below is the post interview solution I came to.

```html
<!doctype html>
<html>
<head>
<title>CSS Grid</title>

<style>
.container {
  gap: 20px;
  display: grid;
  text-align: center;
  grid-template-columns: 1fr 1fr 1fr 1fr;
  grid-auto-rows: 200px;
}

.item {
  background: #f5f5f5;
  align-content: center;
}

@media (max-width: 1024px) {
  .container {
    grid-template-columns: 1fr 1fr;
  }
}

@media (max-width: 600px) {
  .container {
    grid-template-columns: 1fr;
  }
}
</style>
</head>
<body>

<div class="container">
  <div class="item">Item 1</div>
  <div class="item">Item 2</div>
  <div class="item">Item 3</div>
  <div class="item">Item 4</div>
  <div class="item">Item 5</div>
  <div class="item">Item 6</div>
  <div class="item">Item 7</div>
  <div class="item">Item 8</div>
  <div class="item">Item 9</div>
  <div class="item">Item 10</div>
  <div class="item">Item 11</div>
  <div class="item">Item 12</div>
  <div class="item">Item 13</div>
  <div class="item">Item 14</div>
  <div class="item">Item 15</div>
  <div class="item">Item 16</div>
  <div class="item">Item 17</div>
  <div class="item">Item 18</div>
</div>

</body>
</html>
```
