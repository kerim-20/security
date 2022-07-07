<?php

$error = ""; # Stavlajmo da ne bi dobili grešku varijabla ne postoji prilikom prvog otvaranja
if(isset($_POST['username']) && isset($_POST['password'])){
    if(!empty($_POST['username']) && !empty($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);

        # Uraditi SQL Injection zaštitu

        # Ranije kreirani podaci
        $salt = "MojSuperFiniDragiMaliSalt2021!";
        $usernameDatabase = "korisnik";
        $passwordDatabase = password_hash("12345678" . $salt, PASSWORD_DEFAULT);

        if($username === $usernameDatabase){
            if(password_verify($password . $salt, $passwordDatabase)){
                # Sve uredu korisnik ide dalje
                echo "Sve super,hvala!";
            }else{
                $error = "Netačan username ili password!";
            }
        }else{
            $error = "Netačan username ili password!";
        }

    }else{
        $error = "Poslani prazni podaci za logovanje!";
    }
}else{
    $error = "Nisu poslani podaci za logovanje ";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vježba 1t</title>
</head>
<body>
    <form action="" method="POST">
    <label for="username">Unesi username:</label>
    <input type="text" name="username">
    <br>
    <label for="password">Unesi password:</label>
    <input type="password" name="password">
    <br>
    <input type="submit" value="Login">
    <br>
    <span class="error"><?php echo $error; ?></span>

    </form>
</body>
</html>

<?php
/**
 * Naoraviti formu sa usernamom i passwordom
 * Napraviti PHP dio koji prima username i password,i provjerava da li se unijeta lozinka poklapa sa lozinkom koja se nalazi negdje u fajlu.
 * password_hash() i password_verify() koristiti
 *
 */
?>