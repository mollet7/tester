<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Example</title>
</head>
<body>
<p id="one"></p>
</body>
</html>

<script>
const fetchPromise = fetch('https://mdn.github.io/learning-area/javascript/apis/fetching-data/can-store/products.json');

fetchPromise
  .then((response) => {
    if (!response.ok) {
      throw new Error(`HTTP error: ${response.status}`);
    }
    return response.json();
  })
  .then((data) => {
    const result = document.querySelector('#one'); 
    const para = document.createElement('p');
    for (let i = 0; i < data.length; i++){
       const newResult = data[i].price;
       para.textContent += `${newResult}\n`;
    }
    para.textContent += `\nfinished!`;
  })
  .catch((error) => {
    console.error(`Could not get products: ${error}`);
  });

</script>