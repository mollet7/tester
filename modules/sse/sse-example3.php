<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Example-3 Client side!</title>
</head>
<body>
<h1 class="object">Basic Syntax:</h1>
<p class="fun" id="result"></p>
<p id="error"></p>

<script>
    const source = new EventSource('server.php');
    let counter = 0;
    source.onmessage = function(event){
        /* for (const event_properties in event){
            console.log(event_properties);
            document.getElementById('error').innerHTML += event_properties + "<br>";
        } */
        result = document.getElementById('result');
        result.innerHTML += event.data + "<br>"; 
        counter +=1;
        if (counter > 9){
            console.log(counter);
            source.close();
        }
    };
    
    /* for(const property in source){
        console.log(property);
         const para = document.createElement('p');
        para.textContent += property;
        document.body.appendChild(para);
        
    } */   
</script>

</body>
</html>