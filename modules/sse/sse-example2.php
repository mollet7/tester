<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSE example-2</title>
</head>
<body>
    
</body>
</html>

<script>
    if (!!window.EventSource) {
        console.log("Not supported!");
        var source = new EventSource('stream.php');
            // Result to xhr polling :(
            source.addEventListener('message', function(e){
                console.log(e.data);
            }, false);

            source.addEventListener('open',function(e){
                console.log('Connection was opened');
            }, false);

            source.addEventListener('error', function(e){
            if (e.readystate == EventSource.CLOSED){
                console.log('Connection was closed! Reconecting...');

            }  
            }, false);
    } else{
        console.log("Note supported");
    }
  
</script>