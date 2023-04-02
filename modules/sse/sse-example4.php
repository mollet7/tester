<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>SErver sent event Example-4</title>
</head>
<body>
    <div id="div1"></div>
    <div id="div2"></div>
</body>
</html>


<script>
const div = document.getElementById('div1')
const para = document.createElement('p')

para.textContent = "Here is Content in Paragraph one"
div.appendChild(para)

// Example 2 of creating an  element.
const ul = document.createElement('ul')
const li = document.createElement('li')

li.textContent = "Here is the first list"
ul.appendChild(li)
document.body.appendChild(ul)
    /* const div = document.createElement('div');
    const body = document.body;
    body.appendChild(div);
    div.textContent = "Hello world";

    const ul = document.createElement('ul');
    const li = document.createElement('li');
    ul.appendChild(li);
    li.textContent = "Here are the list";
    document.body.appendChild(ul); */


    // Server sent event here!
const evtSource = new EventSource('server2.php')
const div2 = document.querySelector('#div2');


evtSource.addEventListener('greetings', (e) => {
    let data = JSON.parse(e.data);
    console.log(data.id, data.msg);
},false);

evtSource.addEventListener('name', (e) => {
    let name = JSON.parse(e.data);
    //console.log(name.name, name.age);
    for (const key in name) {
        console.log(name.name, name.age)
        const ul = document.createElement('ul');
        const li = document.createElement('li');
        ul.appendChild(li);
        li.textContent = name.name + " : " + name.age;
        document.body.appendChild(ul);
    
    }
},false);


</script>