<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Asynchronous</title>
    <style>
        .container {
            display: grid;
            grid-template-columns: auto auto;
        }
        .side-a {
            border: 1px dotted green;
            
        }
        .side-b {
            border: 1px dotted blue;
        }
        .note {
            background-color: rgba(178, 254, 1, 0.998);
            color: black;
            padding: 2%;
            margin-right: 55%;
            font-size: 199%;
            font-weight: bolder;
            
        }
        button {
            background-color: chocolate;
            color: black;
            border-bottom: red;
            border-radius: 5px;
            padding: 1%;
            font-size: 200%;
            margin: 0 auto;
            width: 100%;


        }
        .horizontal {
            display: grid;
            grid-template-columns: auto auto auto auto auto auto auto auto auto auto auto auto;
        }
    </style>
</head>
<body>    
<a href="../../../tester/javascript/index.php"><button>HOME</button></a>
<p>There is the basic problem with long-running <span> synchronous functions. </span>  What we need is a way for our program to:</p>
<ul>
    <li>Start a long-running operation by calling a function.</li>
    <li>Have that function start the operation and return immediately, so that our program can still be responsive to other events.</li>
    <li>Notify us with the result of the operation when it eventually completes.</li>
</ul>

<q>That's precisely what asynchronous functions can do.</q>

<h2>These are technique used to applyie <span>asynchronous</span></h2>
<ul>
    <li>xmlHttpRequest. </li>
    <li>CallBack Function. </li>
    <li>Promise. </li>
</ul>

<h1>Promise</h1>
<p>A promise is an object returned by an asynchronous function, which represents the current state of the operation.</p>
<p>At the time the promise is returned to the caller, the operation often isn't finished, but the promise object provides methods to handle the eventual success or failure of the operation.</p>

<h3>How to Promise operate?</h3>
<p>With promise based API, <li>the asynchronous function starts operation </li> and <li>return a promise object</li>you can than <li>attach handlers to this promise object.</li>and this <li>these handlers will be excuted when the operation has succeeded or failed. </li></p>

<h3>Using the <i class="fun">fetch()</i>API</h3>
<b>Basic syntax:</b>
<code>
    <pre>
    const fetchPromise = <i class="fun">fetch('products.json');</i>
    
    console.log(fetchPromise);

    fetchPromise.then((response) => {
        console.log(`Received response: ${response.status}`);
        
    });

    console.log("Started request..");
    </pre>
</code>

<p>Here we are-:
    <ul>
        <li>1. Calling the <i class="fun">fetch()</i>API and assigning the return value to the <i>fetchPromise</i> value</li>
        <li>2. immediately after, logging the <i>fetchPromise</i> variable. This should output something like:
    <p><i>Promise { state : "pending"},</i> telling us that we have <b>promise</b> object, and has a state whose value is <b>"pending"</b> state </p>means that the fetch operation is still going on.</li>
    <li>3. Passing a handler function into the Promises <b class="fun">then()</b>method. When (and if) the fetch operation succeeds, the promise will call our handler, passing in a <b>response</b>object, which contain the servers response.</li>
    <li>4. logging a message that we have started the request.</li>
    </ul>
</p>
<p>The complete output should be something like:</p>
<code>
    <pre>
    Promise { state: "pending" }
    Started request…
    Received response: 200
    </pre>
</code>

<p>Note that <b> Started request… </b> is logged before we receive the response. Unlike a synchronous function, <i> fetch() </i> while the request is still going on, enabling our program to stay responsive. The response shows the 200 (OK) status code, meaning that our request succeeded.</p>

<h3>chaining Promises</h3>
<p>With the <i> fetch() </i> API, once you get a <b> Response object </b>, you need to call another function to get the response data. In this case, we want to get the response data as JSON, so we would call the json() method of the Response object. It turns out that json() is also asynchronous. So this is a case where we have to call two successive asynchronous functions.</p>

<code>
    <pre>
    const fetchPromise = fetch('products.json');

    fetchPromise.then((response) => {
    const jsonPromise = response.json();
    jsonPromise.then((data) => {
        console.log(data[0].name);
        });
    });
    </pre>
</code>

<p>But wait! Remember the last article, where we said that by calling a callback inside another callback, we got successively more nested levels of code? And we said that this "callback hell" made our code hard to understand? Isn't this just the same, only with then() calls?</p>
<p>It is, of course. But the elegant feature of promises is that then() itself returns a promise, which will be completed with the result of the function passed to it. This means that we can (and certainly should) rewrite the above code like this:</p>
<code>
    <pre>
const fetchPromise = fetch('products.json');

fetchPromise
  .then((response) => response.json())
  .then((data) => {
    console.log(data[0].name);
  });

    </pre>
</code>
<b>Instead of calling the second then() inside the handler for the first then(), we can return the promise returned by json(), and call the second then() on that return value. This is called promise chaining and means we can avoid ever-increasing levels of indentation when we need to make consecutive asynchronous function calls.</b>
<p>Before we move on to the next step, there's one more piece to add. We need to check that the server accepted and was able to handle the request, before we try to read it. We'll do this by checking the status code in the response and throwing an error if it wasn't "OK":</p>

<code>
    <pre>
    const fetchPromise = fetch('products.json');

fetchPromise
  .then((response) => {
    if (!response.ok) {
      throw new Error(`HTTP error: ${response.status}`);
    }
    return response.json();
  })
  .then((data) => {
    console.log(data[0].name);
  });

    </pre>
</code>
<p>Try this version of our fetch() code. We've added an error handler using catch(), and also modified the URL so the request will fail.</p>

<code>
    <pre>
const fetchPromise = fetch('products.json');

fetchPromise
  .then((response) => {
    if (!response.ok) {
      throw new Error(`HTTP error: ${response.status}`);
    }
    return response.json();
  })
  .then((data) => {
    console.log(data[0].name);
  })
  .catch((error) => {
    console.error(`Could not get products: ${error}`);
  });

    </pre>
</code>

<h2>Summary of Asynchronous JS</h2>
<ul>
    <li>Asynchronous JavaScript allows for non-blocking execution of code.</li>
    <li>It is commonly used in web development for tasks like fetching data and handling events.</li>
    <li>Asynchronous JavaScript uses callbacks, promises, and async/await functions.</li>
    <li>Callbacks are functions passed as arguments to other functions and executed when an operation is complete.</li>
    <li>Promises represent the eventual completion or failure of an asynchronous operation and allow for chaining.</li>
    <li>Async/await allows for writing asynchronous code in a synchronous-like manner.</li>
    <li>Asynchronous programming can be more complex than synchronous programming but leads to more efficient and responsive web applications.</li>
</ul>
    
<h2>More on <span>promises</span></h2>
<ul>
    <li>Promises have three states: pending, fulfilled, or rejected. A promise starts in a pending state, then transitions to either fulfilled (resolved) or rejected (rejected) state depending on whether the asynchronous operation succeeded or failed.</li>
    <li>Promises are created using the Promise constructor function, which takes a single argument: a function that defines the asynchronous operation to be performed.</li>
    <li>The Promise constructor function returns a promise object that has a then() method. The then() method takes two functions as arguments: one for handling the successful fulfillment of the promise (the onFulfilled() function) and another for handling any errors that might occur during the fulfillment of the promise (the onRejected() function).</li>
    <li>Promises can be chained together using the then() method to handle a series of asynchronous operations. The value returned from one then() call can be passed to the next then() call in the chain.</li>
    <li>The catch() method can be used to handle errors that occur at any point in the chain of promises.</li>
    <li>The Promise.all() method can be used to run multiple asynchronous operations in parallel and wait for all of them to complete before continuing.</li>
    <li>The Promise.race() method can be used to run multiple asynchronous operations in parallel and resolve the promise as soon as the first operation completes, regardless of whether it succeeded or failed.</li>
    <li>Promises are supported by all modern browsers and are a fundamental building block of many popular JavaScript libraries and frameworks.</li>
</ul>

<h2>Promise syntax</h2>
<h3><span>Basic syntax with error catching</span></h3>
<code>
    <pre>
    const promise = new Promise((resolve, reject) => {
  // Asynchronous operation here...
  if (/* operation succeeds */) {
    resolve(/* result */);
  } else {
    reject(/* error */);
  }
});

promise
  .then(result => {
    // Handle successful fulfillment of the Promise here...
  })
  .catch(error => {
    // Handle any errors that occur during the Promise's execution here...
  });

    </pre>
</code>
<h4>What this code do!</h4>
<ul>
    <li>This code creates a Promise object by invoking the Promise constructor with a function that takes two arguments: resolve and reject. </li>
    <li>Inside this function, an asynchronous operation is performed, and if it succeeds, resolve is called with the resulting value. Otherwise, reject is called with an error.</li>
    <li>After creating the Promise, the 'then' method is called on it to handle the successful fulfillment of the Promise, passing in a function that takes the resulting value as an argument.</li>
    <li>If an error occurs during the Promise's execution, the 'catch' method is called, passing in a function that takes the error as an argument.</li>
</ul>

<h2 class="fun"><a href="example.php">Practicle example</a> </h2>
    <!-- <a href="time_server.html"><h2>TimeServer</h2></a>
    <a href="client.php"><h2>SERVER-TIME-2</h2></a> -->
<script>
    const fetchPromise = fetch('names.json');
    console.log(fetchPromise);

    fetchPromise.then((response) => {
        console.log(`Received response: ${response.status}`);
    });

    console.log("Started request...");

    // chaining promises
    const fetchPromise1 = fetch('https://mdn.github.io/learning-area/javascript/apis/fetching-data/can-store/products.json');

    fetchPromise1.then((response) => {
    const jsonPromise = response.json();
    jsonPromise.then((data) => {
        console.log(data[0].name);
  });
});

</script>
</body>

</html>