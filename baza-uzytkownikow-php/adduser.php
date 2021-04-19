<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularz</title>
</head>
<body>
    <form action="adduser_main.php" method="post">
        <p>Wprowadź swoje imię: </p><input type="text" name="imie"><br>
        <p>Wprowadź swoje nazwisko: </p><input type="text" name="nazwisko"><br>
        <p>Wprowadź swój PESEL: </p><input type="text" name="pesel"><br>
        <p>Wprowadź swoją datę urodzenia: </p><input type="date" name="dataUrodzenia"><br>
        <br>
        <input type="submit" value="Wyślij" name="send">
    </form>
</body>
</html>

