<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Javascript Functions </title>
    <style>
      .msgBox {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        width: 242px;
        border-radius: 10px;
        background-color: #eee;
        background-image: linear-gradient(to bottom, rgba(0,0,0,0), rgba(0,0,0,0.1));
      }

      .msgBox p {
        line-height: 1.5;
        padding: 10px 20px;
        color: #333;
        padding-left: 82px;
        background-position: 25px center;
        background-repeat: no-repeat;
      }

      .msgBox button {
        background: none;
        border: none;
        position: absolute;
        top: 0;
        right: 0;
        font-size: 1.1rem;
        color: #aaa;
      }

      input {
      font-size: 2em;
      margin: 10px 1px 0;
    }
.focus {
  color: red;
  font-weight: bolder;

}
    </style>
</head>
<body>
<h1>Building your own function</h1>
<h3>The basic function</h3>
<button>Display message box</button>
<p>Basically JS function have these iterms</p>
<ul>
  <li>keyword: function</li>
  <li>Function name</li>
  <li>Parenthesis <b>()</b></li>
  <li>Callibraket <b>{}</b></li>
  <li>code to be excuted</li>
</ul>

<code>
  <pre>
    function dispalyMessage() {

    }
  </pre>
</code>

<h3>Calling a funtion</h3>
<p>To call a function, we write its name with parenthis</p>
<code class="fun">dispalyMessage() </code>
<p class="note">But this function calling with <b>()</b>, it run immediately when the page load</p>

<p>If you want the function to run until the <b>event occur</b>, we calling the function without <b>()</b> and we add <b>event Listener.</b></p>
<code>
  <pre>
    btn.addEventListener('click', dispalyMessage);
  </pre>
</code>

<h3>Function with parameters:-</h3>
<p>Parameters are just function variables, that can pass from calling a functions.</p>

<code>
  <pre>
    function dispalyMessage(parameter1, paramiter2){
      #code to be excuted!
    }
  </pre>
</code>
<p>Paremeters when it used in function calling it called <b>arguments</b> </p>
<code>
  <pre>
    dispalyMessage(argument1, argument2)
  </pre>
</code>

<h3>How we add event listener to function with parameter?</h3>
<p>Solution is to put it inside an anonymous function</p>

<code>
  <pre>
  btn.addEventListener('click', () => displayMessage('Woo, this is a different message!'));
  </pre>
</code>

<h3>Working example: </h3>
<code>
  <pre>

  const btn = document.querySelector('button');
      btn.addEventListener('click', () => displayMessage('Brian: Hi there, how are you today?', 'chat'));

      function displayMessage(msgText,msgType) {
        const html = document.querySelector('html');

        const panel = document.createElement('div');
        panel.setAttribute('class','msgBox');
        html.appendChild(panel);

        const msg = document.createElement('p');
        msg.textContent = msgText;
        panel.appendChild(msg);

        const closeBtn = document.createElement('button');
        closeBtn.textContent = 'x';
        panel.appendChild(closeBtn);

        closeBtn.onclick = function() {
          panel.parentNode.removeChild(panel);
        }

        if(msgType === 'warning') {
          msg.style.backgroundImage = 'url(icons/warning.png)';
          panel.style.backgroundColor = 'red';
        } else if(msgType === 'chat') {
          msg.style.backgroundImage = 'url(icons/chat.png)';
          panel.style.backgroundColor = 'aqua';
        } else {
          msg.style.paddingLeft = '20px';
        }
      }
  </pre>
</code>
<hr>
<h1>Function Return Values! </h1>
<h2>What are return values ?</h2>
<p class="note">Are the values that a function returns when it completes.</p>
<b class="code">return</b>

<p>This function</p>
<code>
  <pre>
  function random(number) {
    return Math.floor(Math.random() * number);
  }
  </pre>
</code>

<p>This could be written as follows:</p>
<code>
  <pre>
  function random(number) {
    const result = Math.floor(Math.random() * number);
    return result;
}
  </pre>
</code>

<p>But the first version is quiker to write, and more compact.</p>

<h3>Examples:-</h3>
<p>Let's have go....</p>

<input class="numberInput" type="text">
<p id="para"></p>

<hr>
<h1>Introduction to events</h1> <h1 class="fun">addEventHandler();</h1>
<p>Event are thing that happens in the system you are programing, which the system tell you about so your code can react to them</p>
<p>What happen when user clicks a but <span>button</span>on a webpage?</p>
<h2>What is an event?</h2>
<p>Events are things that heppen in the system you are programming</p>
<ul>
  <li>The user selects, clicks, or hovers the cursor over a certain element.</li>
  <li>The user chooses a key on the keyboard.</li>
  <li>The user resizes or closes the browser window.</li>
  <li>A web page finishes loading.</li>
  <li>A form is submitted.</li>
  <li>A video is played, paused, or ends.</li>
  <li>An error occurs.</li>

</ul>

<p>To react to an event, you attch an <span>event handler</span>to it.</p>
<p>This is a block of code (usually a JavaScript function that you as a programmer create) that runs when the event fires.</p>
<p class="note">Event handlers are sometimes called event listeners — they are pretty much interchangeable for our purposes, although strictly speaking, they work together.</p>
<p>The listener listen out for the event happening(action), and the handler is the code that is run in response to it happening(reaction)</p>
<h3>Example:</h3> 
<p>Handling click event</p>
<button class="span" id="btn1">Change B. Color</button>

<h4>Removing Listeners</h4>
<p>If you've added an event handler using addEventListener(), you can remove it again using the removeEventListener() method. For example, this would remove the changeBackground() event handler:</p>
<code>
  <pre>
    btn.removeEventListener("click", changeBackground);
  </pre>
</code>

<h4>Adding multiple listeners for a single event</h4>
<p>By making more than one call to <i class="fun">addEventListener()</i>, providing different handlers, you can have multiple handlers for a single event:</p>
<code>
  <pre>
  myElement.addEventListener("click", functionA);
  myElement.addEventListener("click", functionB);

  </pre>
</code>
<p>Both functions would now run when the element is clicked.</p>

<h2>Event objects</h2>
<p>Sometimes, inside an event handler function, you'll see a parameter specified with a name such as <span>event</span>, <span>evt</span>, or <span>e</span>.
This is called the <span>event object</span>, and it is automatically passed to event handlers to provide extra features and information</p>
<p>Forexample:- Let's rewrite our random color example again slightly:</p>
<p>section of intrest</p>
<code>
  <pre>
  function bgChange(<i class="focus">e</i>) {
    const rndCol = `rgb(${random(255)}, ${random(255)}, ${random(255)})`;
    <i class="focus">e</i>.target.style.backgroundColor = rndCol;
    console.log(<i class="focus">e</i>);
}
  </pre>
</code>
<ul>
  <li>We include an event object <b>e</b> in the function.</li>
  <li>We use <b> "e" </b> property <b> target </b> to reffer the element, here is button itself</li>
  <li>The <span>target</span> property of the event object is always a refference to the element the event occurred upon.</li>
</ul>
<h3>More examples:-</h3>
<p>1. Keyloger</p>
<input id="textBox" type="text" />
<div id="output"></div>
<p>Code below!</p>
<code>
  <pre>
  const textBox = document.querySelector("#textBox");
  const output = document.querySelector("#output");
  textBox.addEventListener(
    "keydown",
  (<i class="focus">event</i>) => (output.textContent = `You pressed "${<i class="focus">event</i>.key}".`)
  );

  </pre>
</code>

<p>2. Prevent Default</p>
<form>
  <div>
    <label for="fname">First name: </label>
    <input id="fname" type="text" />
  </div>
  <div>
    <label for="lname">Last name: </label>
    <input id="lname" type="text" />
  </div>
  <div>
    <input id="submit" type="submit" />
  </div>
</form>
<p></p>

<p id="para2">Code below!</p>
<code>
  <pre>
  const form = document.querySelector("form");
  const fname = document.getElementById("fname");
  const lname = document.getElementById("lname");
  const para = document.querySelector("p");

form.addEventListener("submit", (<i class="focus">event</i>) => {
  if (fname.value === "" || lname.value === "") {
    <i class="focus">event</i>.preventDefault();
    para.textContent = "You need to fill in both names!";
  }
});

  </pre>
</code>


</body>

<script>
const btn = document.querySelector('button');
      btn.addEventListener('click', () => displayMessage('Brian: Hi there, how are you today?', 'chat'));

      function displayMessage(msgText,msgType) {
        const html = document.querySelector('html');

        const panel = document.createElement('div');
        panel.setAttribute('class','msgBox');
        html.appendChild(panel);

        const msg = document.createElement('p');
        msg.textContent = msgText;
        panel.appendChild(msg);

        const closeBtn = document.createElement('button');
        closeBtn.textContent = 'x';
        panel.appendChild(closeBtn);

        closeBtn.onclick = function() {
          panel.parentNode.removeChild(panel);
        }

        if(msgType === 'warning') {
          msg.style.backgroundImage = 'url(icons/warning.png)';
          panel.style.backgroundColor = 'red';
        } else if(msgType === 'chat') {
          msg.style.backgroundImage = 'url(icons/chat.png)';
          panel.style.backgroundColor = 'aqua';
        } else {
          msg.style.paddingLeft = '20px';
        }
      }
// calculation on square/ cube/ fuctorials
  const input = document.querySelector('.numberInput');
  const para = document.querySelector('#para');

  function squared(num){
    return num * num;
  }

  function cubed(num){
    return num * num * num;
  }

  function factorial(num){
    if (num < 0 )return undefined;
    if (num === 0 ) return 1;
    let x = num -1;
    while (x > 1){
      num *= x;
      x--;
    }
    return num;
  }

  input.addEventListener("change", () => {
    const num = parseFloat(input.value);
    if (isNaN(num)){
      para.textContent = "Enter a number!";
    } else {
      para.textContent = `${num} squared is ${squared(num)}. `;
      para.textContent += `${num} cubed is ${cubed(num)}.`;
      para.textContent += `${num} factorial is ${factorial(num)}. `;
    }
  });

// Change background color
const btn1 = document.querySelector('#btn1');

function random(number) {
  return Math.floor(Math.random() * (number + 1));
}

btn1.addEventListener("click", () => {
  const rndCol = `rgb(${random(255)}, ${random(255)}, ${random(255)})`;
  document.body.style.backgroundColor = rndCol;
});
// Alternative is fine to make the handler functiona separate named function.

function changeBackground(){
  const rndCol = `rgb(${random(255)}, ${random(255)}, ${random(255)})`;
  document.body.style.backgroundColor = rndCol;
}

btn1.addEventListener("click", changeBackground());

// Keyloger
const textBox = document.querySelector("#textBox");
const output = document.querySelector("#output");
textBox.addEventListener(
  "keydown",
  (event) => (output.textContent = `You pressed "${event.key}".`)
);
// prevent default
const form = document.querySelector("form");
const fname = document.getElementById("fname");
const lname = document.getElementById("lname");
const para2 = document.querySelector("#para2");

form.addEventListener("submit", (e) => {
  if (fname.value === "" || lname.value === "") {
    e.preventDefault();
    para2.textContent = "You need to fill in both names!";
  }
});

</script>
</html>