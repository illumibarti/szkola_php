<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <p>Wprowadź szukany pesel: </p><input type="text" name="pesel"><br>
        <input type="submit" value="Szukaj" name="send">
    </form>
    <?php
        if(isset($_POST['send'])) {
            $pesel = $_POST['pesel'];
            $db = mysqli_connect("localhost", "root", "", "pesel") or die("Unable to connect");
            $q1 = "SELECT `imie`, `nazwisko`, `pesel`, `data_urodzenia` FROM `dane_uzytkownikow` WHERE `pesel` = '$pesel'";
            $result = mysqli_query($db, $q1);
            print_r(mysqli_fetch_row($result));
        }
    ?>
</body>
</html>