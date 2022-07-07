<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Black List</title>
</head>
<body>
    <form action="" method="POST">
        <label for="text">Insert something</label>
        <input type="text" name="text">
        <input type="submit" value="Send">
    </form>

    <?php

    # Niz vrijednosti koje nam trigeruju problem
    $problem = ['gun', 'shotgun', 'rifle', 'knife', 'bomb'];

    # Preuzimanje i validiranje ulazne vrijednsoti kao i sanaciju
    if(isset($_POST['text'])){
        if(!empty($_POST['text'])){
            $text = $_POST['text'];
            $text = trim($text);
            $text = str_replace(" ", "", $text);
            $text = htmlspecialchars($text);

            # Nakon toga ide filtracija 
            if(!in_array($text, $problem)){
                # Nastavi sa izvršavanjem
                echo " You inserted " . $text . " and that is good!";
            }else{
                # Nemoj nastaviti sa izvršavanjem
                echo $text . " is not good! No, no!";
            }

        }else{
            echo "Text is empty!";
        }
    }else{
        echo "Text is not set!";
    }


    ?>
</body>
</html>