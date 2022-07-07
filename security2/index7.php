<?php

$ulazniPodatak = "  testniPodatak ";

# Trimovanje podataka (odsijecanje praznih polja)
$ulazniPodatak = trim($ulazniPodatak);

# XSS zaštita (Cross Site Scripting zaštita)
$ulazniPodatak = htmlspecialchars($ulazniPodatak);

#SQL Injection zaštita (potrebno napraviti validnu konekciju na bazu podatka)
$ulazniPodatak = $konekcija->real_escape_string
($ulazniPodatak); # Objektna varijanta
$ulazniPodatak = mysqli_real_escape_string($connection, $ulazniPodatak);

# Funkcija koja bi očistila sve specijalne karaktere
function cleanString($ulazniPodatak){
    $ulazniPodatak = str_replace(" ", "", $ulazniPodatak);
    $ulazniPodatak = preg_replace(' /[^A-Za-z0-9\-]/', "", $ulazniPodatak);
    return $ulazniPodatak;
}


# Sveobuhvatna funkcija za trim, xss i sql injection
function cleaner($podatak, $konekcija, $empty, $special){ #empty radi primjera moze i ne mora i specijal radi specijalnih karaktera
    $podatak = trim($podatak);
    $podatak = htmlspecialchars($podatak);
    $podatak = mysqli_real_escape_string($konekcija, $podatak);


    if($empty == TRUE){
        $podatak = str_replace(" ", "", $podatak);
    }

    if($special == TRUE){
        $podatak = preg_replace(' /[^A-Za-z0-9\-]/', '', $podatak);
    }

    return $podatak;
}

# Klasa Security koja ima metodu cleaner za čišćenje stringova
class Security{
    
    public static  function cleaner($string, $connection, $empty, $special){
        $string = trim($string);
        $string = htmlspecialchars($string);
        $string = $connection->real_escape_string($string);
        if($empty == TRUE){
            $string = str_replace(" ", "", $string);
        }
        if($special == TRUE){
            $string = preg_replace(" /[^A-Za-z0-9\-]/", "", $string);
        }

        return $string;
    }
}

# Pozivanje
Security::cleaner("<script src='xyz.com/script.js'></script>",
$connection, TRUE, FALSE);








?>