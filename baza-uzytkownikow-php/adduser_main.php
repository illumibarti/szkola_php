<?php
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $pesel = $_POST['pesel'];
    $dataUrodzenia = $_POST['dataUrodzenia'];
    $db = mysqli_connect("localhost", "root", "", "pesel") or die("Unable to connect");
    $q1 = "INSERT INTO `dane_uzytkownikow`(`imie`, `nazwisko`, `pesel`, `data_urodzenia`) VALUES ('$imie', '$nazwisko', '$pesel', '$dataUrodzenia')";
    
    if(mysqli_query($db,$q1)) {
        echo "New record created successfully";
    } else {
        echo "New record created not successfully";
    }
?>