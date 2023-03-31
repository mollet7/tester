<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>SSE</title>
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
      /*   .note {
            background-color: rgba(178, 254, 1, 0.998);
            color: black;
            padding: 2%;
            margin-right: 55%;
            font-size: 199%;
            font-weight: bolder;
            
        } */
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
<h1>Using server-sent events</h1>
<h2>Creating an <span class="object">EventSource</span> instance.</h2>
<p>To open a connection to the server to begin receiving events from it, create a new <span class="object">EventSource</span> object with the URL of a script that generates the events. </p>

<code>
  <pre>
    const evtSource = new EventSource("ssedemo.php");
  </pre>
</code>

<p>If the event generator script is hosted on a different origin,a new <span class="object">EventSource</span> object should be created with both the URL and an options dictionary.  </p>
<p>For example assuming the client script is on <b>example.com</b>:</p>

<code>
  <pre>
    const evtSource = new EventSource("//api.example.com/ssedemo.php", {
      withCredentials: true,
    });
  </pre>
</code>

<h2>Listening for <b>message</b> events</h2>
<p>Messages sent from the server that don't have an <b>event</b> field are received as <b> message </b> events. To receive message events, attach a handler for the <b> message</b> event:</p>

<code>
  <pre>
    evtSource.onmessage = (event) => {
      const newElement = document.createElement("li");
      const eventList = document.getElementById("list");

      newElement.textContent = `message: ${event.data}`;
      eventList.appendChild(newElement);

    };
  </pre>
</code>
<p>This code listens for incoming message events and appends the message text to a list in the document's HTML</p>

<H2>Listening for custom events</H2>
<p>Messages from the server that do have an <b>event </b> field defined are received as events with the name given in <b> event </b> for example:</p>

<code>
  <pre>
    evtSource.addEventListener("ping", (event) => {
      const newElement = document.createElement("li");
      const eventList = document.getElementById("list");
      const time = JSON.parse(event.data).time;
      newElement.textContent = `ping at ${time}`;
      eventList.appendChild(newElement);

    });
  </pre>
</code>

<p>This code will be called whenever the server sends a message with the <b>event</b> field set to <b> ping; </b>it then parses the JSON in the <b> data </b> field and outputs that information.</p>

<h2>Sending events from the server</h2>
<p>The server-side script that sends events needs to respond using the <b>MIME</b>  type <span class="object">text/event-stream</span>. Each 
notification is sent as a block of text terminated by a pair of newlines. </p>

<code>
  <pre>
  date_default_timezone_set("America/New_York");
  header("Cache-Control: no-store");
  header("Content-Type: text/event-stream");

  $counter = rand(1, 10);
  while (true) {
    // Every second, send a "ping" event.

    echo "event: ping\n";
    $curDate = date(DATE_ISO8601);
    echo 'data: {"time": "' . $curDate . '"}';
    echo "\n\n";

    // Send a simple message at random intervals.

    $counter--;

    if (!$counter) {
      echo 'data: This is a message at time ' . $curDate . "\n\n";
      $counter = rand(1, 10);
    }

    ob_end_flush(); 
    flush();

    // Break the loop if the client aborted the connection (closed the page)

    if (connection_aborted()) break;

    sleep(1);
  }
  </pre>
</code>

<h2>Error handling</h2>
<p>When problems occur (such as a network timeout or issues pertaining to access control), an eror event is generated. You can take action on this programmatically by implementing the <b> onerror </b> callback on the <b>EventSource</b> object:</p>

<code>
  <pre>
    evtSource.onerror = (err) => {
      console.error("EventSource failed:", err);
    };
  </pre>
</code>

<h2>Closing event streams</h2>
<p>By default, if the connection between the client and server closes, the connection is restarted. The connection is terminated with the <b> .close </b> method.</p>

<code>
  <pre>
    <span class="object">evtSource.close();</span>
  </pre>
</code>

<h2>Event stream format</h2>
<p>The event stream is a simple stream of text data which must be encoded using <b>UTF-8</b>. Messages in the event stream are separated by a pair of newline characters.
A colon as the first characters of a line is in essence a comment, and is ignored.
</p>

<p class="note">Note: The comment line can be used to prevent connections from timing out; a server can send a comment periodically to keep connection alive.</p>

<p>Each message consist of one or more lines of text listing the fields for that message. Each field is represented by the field name, followed by a colon, followed by the text data for that message. Each field is represented by the field name, followed by a colon, followed by the text data for that field's value. </p>

<h3>Fields</h3>
<p>Each message received has some combination of the following fields, one per line:</p>

<span class="object">event</span>
<p>A string identifying the type of event described. If this is specified, an event will be dispatched on the browser to the listener for the specified event name; the website source code should use addEventListener() to listen for named events. The onmessage handler is called if no event name is specified for a message.</p>

<span class="object">data</span>
<p>
The data field for the message. When the EventSource receives multiple consecutive lines that begin with data:, it concatenates them, inserting a newline character between each one. Trailing newlines are removed.
</p>

<span class="object">id</span>
<p> 
The event ID to set the EventSource object's last event ID value.
</p>
<span class="object">retry</span>
<p>
The reconnection time. If the connection to the server is lost, the browser will wait for the specified time before attempting to reconnect. This must be an integer, specifying the reconnection time in milliseconds. If a non-integer value is specified, the field is ignored.
</p>

<p>All other field names are ignored.</p>
<span class="note">If a line doesn't contain a colon, the entire line is treated as the field name with an empty value string.</span>
<h1>
<a href="sse-example1.php" target="_blank">Example One</a> | <a href="sse-example2.php" target="_blank">Example two</a> | <a href="sse-example3.php" target="_blank">Example three</a>
</h1>





<script>

</script>
</body>

</html>