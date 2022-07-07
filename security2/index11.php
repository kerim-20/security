<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>White List</title>
</head>
<body>
    <form action="" method="POST">
        <label for="color">Chose your color:</label>
        <select name="color">
            <option value="red">Red</option>
            <option value="blue">Blue</option>
            <option value="green">Green</option>
            <option value="black">Black</option>
        </select>
        <input type="submit" value="Send your color">
    </form>

    <?php

    # Niz dozvoljenih boja
    $colors = ['red', 'blue', 'green'];

    if(isset($_POST['color'])){
        if(!empty($_POST['color'])){
            $color = $_POST['color'];
            $color = trim($color);
            $color = htmlspecialchars($color);

            # Provjera da li je boja u nizu
            if(in_array($color, $colors)){
                # Nastavljamo izvršavanje jer je tačno(bijela lista)
                echo "Color: " . $color . " is good!";
            }else{
                # Ne nastavljamo izvršavanje ili vraćamo grešku
                echo "Color: " . $color . " is not good!";
            }
        }else{
            echo "Boja je prazna!";
        }
    }else{
        echo "Boja nije setovana!";
    }

    ?>
</body>
</html>