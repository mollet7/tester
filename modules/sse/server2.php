<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

// Fanya mambo yako yote hapa.
$data = array (
    "msg" => "Hello World",
    "id" => 1234,
);

$name = '{"name":"Suhaila","age":12, "name":"Rahila","age":11 }';

// send data kwa client hapa.
echo "id: 0001\n";
echo "event: greetings\n";
echo "data:".json_encode($data)."\n\n";

echo "id: 0002\n";
echo "event: name\n";
echo "data:".$name."\n\n";


flush();





?>