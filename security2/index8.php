<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MIME Type Checks</title>
</head>
<body>
    
<form action="" method="POST" enctype="multipart/form-data">
     <label for="image">Select image to upload</label>
     <input type="text" name="username" placeholder="Username:">
     <input type="file" name="image" id="image">
     <input type="submit" value="Upload File">
</form>

<?php
    if(isset($_FILES['image']) && isset($_POST['username'])){
        # Provjera username i ispisivanje na izlaz
        if(!empty($_POST['username'])){
            $username = $_POST['username'];
            $username = trim($username);
            $username = htmlspecialchars($username);
            # $username = $connection->real_escape_string($username);

            # Radite dalje sa bazom i usernameom
            echo $username . ":<br>";
        }



        # Pravimo direktorijum za upload, i kreiramo punu putanju do uploadanog fajla
      $upload_directory = "uploads/";
      $destination = $upload_directory . basename($_FILES
      ['image']['name']);
      
      # Testiranje da li je fajl stvarno uploadan kroz POST
      if(is_uploaded_file($_FILES['image']['tmp_name'])){
            # Preuzimamo MIME tip (text/css, text/js)
            $mime_type = mime_content_type($_FILES['image']
            ['tmp_name']);

            # Pravimo bijelu listu dozvoljenih tipova 
            $allowed_types = ['image/png', 'image/jpeg'];

            # Testiranje da li se mime tip nalazi u bijeloj listi
            if(!in_array($mime_type, $allowed_types)){
                echo "Sorry! This file is not allowed!";
                return;
            }

            # Ako je sve okej, pomjeramo fajl iz tamporary u destinacioni folder
          if(move_uploaded_file($_FILES['image']['tmp_name'],
          $destination)){
              echo "Good! File uploaded!";
              return;
          }else{
              echo "Error! File not uploaded!";
          }
      }

    }

?>


</body>
</html>