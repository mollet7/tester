<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSE- Example-1</title>
</head>
<body>
    <h1 id="list"></h1>
</body>
</html>



<script>
    // Creating event source object.
    const evtSource = new EventSource("sse-server.php");

    evtSource.onmessage = (event) => {
        const newElement = document.createElement("li");
        const eventList = document.getElementById("list");
        
        newElement.textContent = `message: ${event.data}`;
        eventList.appendChild(newElement);
    };

    if (evtSource.error){
        evtSource.onerror = (err) => {
        console.error("EventSource failed:", err);
      };
    }
    

</script>