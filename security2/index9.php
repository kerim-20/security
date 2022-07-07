<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Injection</title>
</head>
<body>
    <form action="" method="POST">
    <label for="username">Username:</label>
    <input type="text" name="username" required>
    <input type="submit" value="Send">
    </form>

    <?php
        try{
            $database = new PDO('mysql:host=localhost;
            dbname=injection2', 'root', '');
        }catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }

        if(isset($_POST['username'])){
            if(!empty($_POST['username'])){
                $username = $_POST['username'];
                $username = trim($username);
                $username = htmlspecialchars($username);
                
                # Zaboravio sam SQL Injection i odmah prelazim na query
                # Ovdje ce se desiti problem!
                #$user = $database->query("SELECT * FROM user WHERE 
                #username = '{$username}'");

                $user = $database->prepare("SELECT * FROM user WHERE
                username = :username AND password = :password");
                $user->execute(
                    [
                        ':username' => $username,
                        ':password' => $password
                    ]
                    );

                # Provjera da li korisnik ne postoji (naravno dalje bi išli ispisi podataka i obrada i slicno)
                if($user->rowCount()){
                    echo "Username found!";
                }
            }else{
                echo "Username empty!";
            }
        }else{
            echo "username not set!";
        }
    ?>
</body>
</html>