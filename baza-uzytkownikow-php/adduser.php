<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularz</title>
</head>
<body>
    <form action="" method="post">
        <p>Wprowadź swoje imię: </p><input type="text" name="imie"><br>
        <p>Wprowadź swoje nazwisko: </p><input type="text" name="nazwisko"><br>
        <p>Wprowadź swój PESEL: </p><input type="text" name="pesel"><br>
        <p>Wprowadź swoją datę urodzenia: </p><input type="date" name="dataUrodzenia"><br>
        <br>
        <input type="submit" value="Wyślij" name="send">
    </form>
<?php
    if(isset($_POST['send'])) {
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
    }
?>
</body>
</html>

