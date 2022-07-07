<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XSS Attack</title>
</head>
<body>
 
<form action="" method="POST">
    <label for="username">Username:</label>
    <input type="text" name="username" required>
    <input type="submit" value="Insert">
</form>


<?php

    if(isset($_POST['username'])){
        if(!empty($_POST['username'])){
            # Zaboravio sam uraditi zaštitu od XSS-a
            # ovdje će se desiti problem!
            # echo "username: " . $_POST['username'];
        
           $username = htmlspecialchars($_POST['username']);
        echo "Username: " . $username;
        }else{
            echo "Username is empty!";
        }
    }else{
        echo "Username is not set!";
    }

?>


</body>
</html>