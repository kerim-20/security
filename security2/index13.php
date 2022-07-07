<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vježba</title>
</head>
<body>
<form action="" method="POST">
    <label for="username">Username:</label>
    <input type="text" name="username" required>
    <br>
    <label for="age">Age:</label>
    <select name="age">
        <?php
            for($i = 18; $i < 100; $i++){
                echo "<option value='{$i}'>" . $i . "</option>";
            }

        ?>
    </select>
    <br><br>
    <input type="submit" value="Send">
</form>

    <?php
        if(isset($_POST['username']) && isset($_POST['age'])){
            if(!empty($_POST['username']) && !empty($_POST['age'])){
                $username = $_POST['username'];
                $username = trim($username);
                $username = htmlspecialchars($username);

                $age = $_POST['age'];
                $age = trim($age);
                $age = htmlspecialchars($age);

                if($age < 35 || $age > 57){
                    echo $username . " : " . $age;
                }else{
                    echo "Sorry you are not qualified!";
                }
            }else{
                echo "Username or age are empty";
            }
        }else{
            echo "Username or age not set!";
        }

     ?>


</body>
</html>