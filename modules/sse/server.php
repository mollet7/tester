<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache'); // recommended to prevent caching of event data.

/**
* Constructs the SSE data format and flushes that data to the client.
*
* @param string $id Timestamp/id of this connection.
* @param string $msg Line of text that should be transmitted.
**/


$time = date('r');
echo "data: The server time is:".$time;
echo "\n\n";
flush();
?>