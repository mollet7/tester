<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>WebSocket</title>
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
<h1>The WebSocket API (WebSockets)</h1>

<p>The WebSocket API is an advanced technology that makes it possible to open a two-way interactive communication session between the user's browser and a server. With this API, you can send messages to a server and receive event-driven responses without having to poll the server for a reply.</p>
<p>WebSocket client applications use the WebSocket API to communicate with WebSocket servers using the WebSocket protocol.</p>
<h2>Creating a WebSocket object</h2>
<p> In order to communicate using the WebSocket protocol , you need to create a <span class="object">WebSocket object</span> ; this will automatically attempt to open the connection to the server.</p>
<p>The WebSocket constructor accepts one required and one optional parameter:</p>
<code>
  <pre>
    WebSocket_variable = new WebSocket(url, protocols); 
  </pre>
</code>
<b>url:</b>
<p>
The URL to which to connect; this should be the URL to which the WebSocket server will respond. This should use the URL scheme wss://, although some software may allow you to use the insecure ws:// for local connections.
</p>
<b>protocols(optional)</b>
<p>
Either a single protocol string or an array of protocol strings. These strings are used to indicate sub-protocols, so that a single server can implement multiple WebSocket sub-protocols (for example, you might want one server to be able to handle different types of interactions depending on the specified protocol). If you don't specify a protocol string, an empty string is assumed.
</p>
<i> The constructor will throw a SecurityError if the destination doesn't allow access. This may happen if you attempt to use an insecure connection (most user agents now require a secure link for all WebSocket connections unless they're on the same device or possibly on the same network). </i>

<h3>Connection errors</h3>
<p>If an error occurs while attempting to connect, first a simple event with the name <code>error</code> is sent to the <a href="/en-US/docs/Web/API/WebSocket"><code>WebSocket</code></a> object (thereby invoking its <a href="/en-US/docs/Web/API/WebSocket/error_event" title="onerror"><code>onerror</code></a> handler), and then the <a href="/en-US/docs/Web/API/CloseEvent"><code>CloseEvent</code></a> is sent to the <code>WebSocket</code> object (thereby invoking its <a href="/en-US/docs/Web/API/WebSocket/close_event" title="onclose"><code>onclose</code></a> handler) to indicate the reason for the connection's closing.</p>

<h3>Examples</h3>
<p>
  This simple example creates a new WebSocket, connecting to the server at <code>wss://www.example.com/socketserver</code>.
  A custom protocol of "protocolOne" is named in the request for the socket in this example, though this can be omitted.
</p>
<code>
  <pre>
  <span class="token keyword">const</span> exampleSocket <span class="token operator">=</span> <span class="token keyword">new</span> <span class="token class-name">WebSocket</span><span class="token punctuation">(</span>
  <span class="token string">"wss://www.example.com/socketserver"</span><span class="token punctuation">,</span>
  <span class="token string">"protocolOne"</span>
<span class="token punctuation">)</span><span class="token punctuation">;</span>

  </pre>
</code>

<h3>Sending data to the server</h3>
<p>
  Once you've opened your connection, you can begin transmitting data to the server.
  To do this, call the <code>WebSocket</code> object's <a href="/en-US/docs/Web/API/WebSocket/send" title="send()"><code>send()</code></a> method for each message you want to send:
</p>
<code>
  <pre>
  exampleSocket.send("Here's some text that the server is urgently awaiting!");
 
  </pre>
</code>
<p>You can send data as a string, <a href="/en-US/docs/Web/API/Blob"><code>Blob</code></a>, or <a href="/en-US/docs/Web/JavaScript/Reference/Global_Objects/ArrayBuffer"><code>ArrayBuffer</code></a>.</p>

<p>
  As establishing a connection is asynchronous and prone to failure there is no guarantee that calling the <code>send()</code> method immediately after creating a WebSocket object will be successful.
  We can at least be sure that attempting to send data only takes place once a connection is established by defining an <a href="/en-US/docs/Web/API/WebSocket/open_event" title="onopen"><code>onopen</code></a> event handler to do the work:
</p>
<code>
  <pre>
  exampleSocket.onopen = (event) => {
  exampleSocket.send("Here's some text that the server is urgently awaiting!");
};

  </pre>
</code>











<script>
  // creating contractor object and open the connection.
const exampleSocket = new WebSocket(
  "wss://www.example.com"
);
// sending data to server.
exampleSocket.onopen = (event) => {
exampleSocket.send("Here's some text that the server is urgently awaiting!");
};
</script>
</body>

</html>