<?php

# Provjera dostupnih algoritama za šifrovanje
# print_r(hash_algos());

# MD5()
echo hash("md5", "Konvertovanje ovog stringa u hash!") . "<hr>";
# MD5() funkcija
echo md5("Konvertovanje ovog stringa u hash!") . "<hr>";
# hash_file i md5 za fajlove (potpis za fajlove)
echo hash_file("md5", "test.php") . "<hr>";
# crypt() koji koristi DES ili drugi algoritam - Blowfishm MD5
echo crypt("konvertovanje ovog stringa u hash!", "MojSalt") . "<hr>";

# Kako raditi sa korisničkim passwordom
$password = "12345678";
$salt = "OvoJeMojSaltKojegNecesZaobiciNemaSanse.DobarTi?";
$passwordHash = md5($password . $salt);

# Ispis čistog korisničkog passworda
echo md5($password) . "<br><br>";
echo $passwordHash . "<hr>";

# Bitno je da ovaj salt isto koristite i prilikom logovanja korisnika
# Prilikom logovanja uzmete ono što je unio korisnik,dodate salt,ponovo hashujete i onda upoređujete sa onim što je u bazi.

# password_hash() funkcija
echo password_hash("MojPassword!", PASSWORD_DEFAULT) . "<br>";
echo password_hash("MojPassword!", PASSWORD_BCRYPT) . "<br>";
echo password_hash("MojPassword!", PASSWORD_ARGON2I) . "<br>";
# echo password_hash("MojPassword!", PASSWORD_ARGON2ID) . "<br>";
echo "<hr>";

# password_hash() i password_verify() funkcije zajedno
$lozinka = password_hash("MojaLozinka!", PASSWORD_DEFAULT);
# Sad ja ispitujem da li je ono što je korisnik unio isti kao ono što već imamo u varijabli $lozinka
$unioKorisnik = "MojaLozinka!";
# Ispitivanje
if(password_verify($unioKorisnik, $lozinka)){
    echo "Tačna lozinka!<hr>";
}else{
    echo "Netačna lozinka!<hr>";
}

# Neko finalno rješenje za ovaj dio
# Random generisani salt za vaše passworde
$salt = "MojNeobicnoDugiSaltSaKojimSamUvijekSiguran2021!!!";
# Hashovanje ulazne lozinke koristeći password_hash() i salt prvi put prilikom registracije, prije prvog unosa u bazu
$ulaznaLozinkaOdKorisnika = "MojPassword";
# Kreiranje hash-a prije unosa u bazu podataka
$hashovanaLozinka = password_hash($ulaznaLozinkaOdKorisnika . $salt, PASSWORD_DEFAULT);
# Sad hashovanu lozinku unosimo u bazu podataka

# Situacija prilikom logina
$ulaznaLozinkaLogin = "MojPassword";
# Dodavanje salt-a i provjera passworda sa hashovanim iz baze
if(password_verify($ulaznaLozinkaLogin . $salt, $hashovanaLozinka)){
    echo "Korisnik je unio istu lozinku!<hr>";
}else{
    echo "Korisnik nije unio istu lozinku!<hr>";
}


?>