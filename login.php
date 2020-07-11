<?php
require("conn.php");

// $time = time();
// echo date('m/d/Y H:i:s', $time);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Login form</h1>
    <form action="LoginStart.php" method="POST">
    <p>Username : <input type="text" name="Username"></p>
    <p>Password : <input type="text" name="Password"></p>
    <button type="submit">Login</button>

    </form>

</body>
</html>