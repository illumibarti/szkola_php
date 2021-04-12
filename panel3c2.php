<?php
    session_start();
    if(isset($_SESSION['id'])) {
        $db = mysqli_connect("localhost", "root", "", "slawkowabaza");

        $id = $_SESSION['id'];

        if(isset($_POST['zmien_haslo_m'])) {
            $newpass1 = $_POST['newpass1'];
            $newpass2 = $_POST['newpass2'];
            if($newpass1 == $newpass2) {
                $newpass = md5($newpass1);
                $id_u = $_GET['zmien'];
                $q8 = "UPDATE `users` SET `password` = '$newpass1' WHERE `id`=$id_u";
                if(mysqli_query($db,$q8)) echo '<h1>Haslo zostalo zmienione</h1>';
            } else "<h1>blad baszy danych</h1>";
        } else echo "<h1>Nowe haslo nie zostalo powtorzoe prawidlowo</h1>";
    }

    if(isset($_POST['zmien_email_m'])) {
        $newemail1 = $_POST['newemail1'];
        $newemail2 = $_POST['newemail2'];
        if($newemail1 == $newemail2) {
            $id_u = $_GET['zmien'];
            $q9 = "UPDATE `users` SET `email`='$newemail1' WHERE `id`=$id_u";
            if(mysqli_query($db,$q9)) echo "<h1>email zmieniony prawidlowo</h1>";
            else "<h1>blad bazy danych</h1>";
        } else echo "<h1>Nowe emaile nie zostaly powtorzone prawidlowo";
    } 

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

        if(isset($_POST['zmien_email'])) {
            $newemail1 = $_POST['newemail1'];
            $newemail2 = $_POST['newemail2'];
            if($newemail1 == $newemail2) {
                $q4 = "UPDATE `users` SET `email`='$newemail1' WHERE `id`=$id";
                if(mysqli_query($db,$q4)) echo "<h1>email zmieniony prawidlowo</h1>";
                else "<h1>blad bazy danych</h1>";
            } else echo "<h1>Nowe emaile nie zostaly powtorzone prawidlowo";
        } 

    $q1 = "SELECT * FROM `users` WHERE `id`=$id";
    $r1 = mysqli_query($db, $q1);
    $row1 = mysqli_fetch_row($r1);
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
            if(isset($_GET['zmien'])) {
                $id_u = $_GET['zmien'];
                $q7 = "SELECT `email` FROM `users` WHERE `id`=$id_u";
                $r7 = mysqli_query($db, $q7);
                $row7 = mysqli_fetch_row($r7);
?>
                <h2>Zmiana hasla</h2>
                <form action="" method="post">
                    <input type="password" name="newpass1" id="">
                    <input type="password" name="newpass2" id="">
                    <input type="submit" value="Zmien haslo" name="zmien_haslo_m">
                </form>
                <h2>Zmiana adresu email</h2>
                <form action="" method="post">
                    <input type="email" name="lastemail" id="" value="<?php echo $row7[0]; ?>" disabled><br>
                    <input type="email" name="newemail1" id="">
                    <input type="email" name="newemail2" id="">
                    <input type="submit" value="Zmien email" name="zmien_email_m">
                </form> 
<?php
            }
            echo "<h2>Lista uzytkownikow</h2>";
            $q5 = "SELECT `id`, `email`, `id_profile` FROM `users` WHERE `id_profile`<3";
            $r5 = mysqli_query($db, $q5);
            echo '<table>';
            while($row5=mysqli_fetch_row($r5)) {
                $q6 = "SELECT `funkcja` FROM `profile` WHERE `id`=$row5[2]";
                $r6 = mysqli_query($db,$q6);
                $row6 = mysqli_fetch_row($r6);
                echo '<tr>
                    <td>'.$row5[1].'</td>
                    <td>'.$row6[0].'</td>
                    <td><a href="?zmien='.$row5[0].'">zmien</a></td>
                <tr>';
            }
            echo '</table>';
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