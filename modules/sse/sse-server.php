<?php 
date_default_timezone_set("America/New_York");
header("Cache-Control: no-store");
header("Content-Type: text/event-stream");

$counter = rand(1, 10);
while (true){
    echo "event: ping\n";
    $curDate = date('d-m-Y');
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

?>