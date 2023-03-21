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
    <title>Cookies </title>
</head>
<body>
<H1>PHP Cookies</H1> <hr>
<p>Often used to <span>identify</span>a user. A cookies is a small file that the server embeds on the user's computer</p>
<p>Each time the same computer requests a page wuth a browser, it will send the cookie too. With PHP, you can both create and retrieve cookie values</p>

<h3>Create Cookies With PHP</h3>
<p>A cookie is created with the <i class="fun">setcookie()</i> function</p>

<h4 class="fun">setcookie(name, value, expire, path, domain, secure, httponly);</h4>
<p>Only the name parameter is required. All other parameters are optional</p>

<h3>PHP Create / Retrieve a Cookie</h3>
<p>Create cookies named "user" with the value "Ahmad". The cookie will expire after 30 days (86400 * 30). The "/" means tha the cookie is available in entire website(otherwise, select the directory you prefer)</p>

<p>We then retrieve the value of the cookie "user" (using the global variable <span> $_COOKIE </span> ). We also use the <i class="fun">isset()</i>  function to find out if the cookie is set:</p>
<code>
    <pre>
        $cookie_name = "user";
        $cookie_value = "Ahmad Maulid";
        setcookie($cookie_name, $cookie_value, time()+(86400 * 30), "/");
    </pre>
</code>
<p>Check if cookie is set.</p>
<code>
    <pre>
        if(!isset($_COOKIE[$cookie_name])){
            echo "Cookie named '". $cookie_name. "'is not set!";
        } else {
            echo "Cookie '" .$cookie_name . "' is set! br ";
            echo "Value is: " . <i class="fun">$_COOKIE[$cookie_name]</i> ;
        }
    </pre>
</code>

<h3>Real code result!</h3>
<?php
$cookie_name = "user";
$cookie_value = "Maulid Hamad";
setcookie($cookie_name, $cookie_value, time()+(86400 * 30), "/" );
?>

<?php
if (!isset($cookie_name)){
    echo "Cookie is not set".$cookie_name;
}else{
    echo "Cookie is seted for ". $cookie_name. "<br>";
    echo "Value is: "."<b>". $_COOKIE[$cookie_name]."</b>";
}
?>

<p>See here we retriview value of  cookies using and we got the cookies value</p>

<p class="note">The <i class="fun">setcookie() </i> function must appear BEFORE the <b>html</b> tag</p>

<h3>Delete a Cookie</h3>
<p>To delete a cookie, use the same function with an expiration date in the past</p>
<code>
    <pre>
        //set the expiration date to one hour ago
        php
        setcookie("user", "", time()- 3600);
        ?
    </pre>
</code>
<?php
setcookie("test_cookie", "test", time() + 3600, '/');

?>
<h3>Check if Cookies are Enabled</h3>
<?php
if (count($_COOKIE) > 0 ){
    echo "Cookies are enabled.";
}else {
    echo "Cookies are disabled.";
}

?>

<code>
    <pre>
    if (count($_COOKIE) > 0 ){
    echo "Cookies are enabled.";
    }else {
    echo "Cookies are disabled.";
}
    </pre>
</code>
</body>
</html>