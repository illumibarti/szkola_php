<?php
    session_start();
    if(isset($_SESSION['id'])) {
        $db = mysqli_connect("localhost", "root", "", "slawkowabaza");

        $id = $_SESSION['id'];
        $q1 = "SELECT * FROM `users` WHERE `id`=$id";
        $r1 = mysqli_query($db, $q1);
        $row1 = mysqli_fetch_row($r1);

        if(isset($_POST['zmien_haslo'])) {
            $lastpass = $_POST['lastpass'];
            $newpass1 = $_POST['newpass1'];
            $newpass2 = $_POST['newpass2'];
            if($newpass1 == $newpass2) {
                $lastpass = md5($lastpass);
                $q2 = "SELECT * FROM `users` WHERE `id` = $id AND `password` LIKE '$lastpass'";
                $r2 = mysqli_query($db,$q2);
                $row2 = mysqli_num_rows($r2);
                if($row2 == 1) {
                    $newpass = md5($newpass1);
                    $q3 = "UPDATE `users` SET `password`='$newpass1' WHERE `id`=$id";
                    if(mysqli_query($db,$q2)) echo '<h1>Haslo zostalo zmienione</h1>';
                } else echo "<h1>bledne haslo</h1>";
            } else echo "<h1>Nowe hasla nie zgadzaja sie</h1>";
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel</title>
</head>
<body>
<?php
        if($row1[5]==2) { //uczen
?>
            <form action="" method="post">
                <input type="password" name="lastpass" id="">
                <br>
                <input type="password" name="newpass1" id="">
                <input type="password" name="newpass2" id="">
                <input type="submit" value="Zmien haslo" name="zmien_haslo">
            </form>
<?php
        }
        if($row[5]==1) { //nauczyciel
?>
        <h2>Zmiana hasla</h2>
        <form action="" method="post">
            <input type="password" name="lastpass" id="">
            <br>
            <input type="password" name="newpass1" id="">
            <input type="password" name="newpass2" id="">
            <input type="submit" value="Zmien haslo" name="zmien_haslo">
        </form>
        <h2>Zmiana adresu email</h2>
        <form action="" method="post">
            <input type="email" name="lastemail" id="" value="<?php echo $row[1]; ?>" disabled><br>
            <input type="email" name="newemail1" id="">
            <input type="email" name="newemail2" id="">
            <input type="submit" value="Zmien email" name="zmien_email">
        </form> 
<?php
        }
        if($row[5]==3) { //moderator

        }

        mysqli_close($db);  
?>
</body>
</html>
<?php
    } else {
        header("location http://localhost/panel3c2.php?page=login"); 
    }
?>