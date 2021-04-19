<?php
// JAK COS TO SLAWKOWY KOD NIE  SERIO?? SERIO???? SERIOO???????????????????BEDZIE TUTAJ DZIALAL BO NIE MA XAMPA SKALA OBCHOXXXDDXDYDXDXD = 100000000
$db = mysqli_connect("localhost", "root", "", "slawkowabaza");
    if(isset($_POST['rejestracja'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $profile = $_POST['profile'];

        $password = md5($password);
       // echo $password;

        $date = date('Y-m-d');
       // echo $date;

        $q2 ="INSERT INTO `users`(`email`, `password`, `register`, `id_profile`) VALUES ('$email', '$password', '$date', $profile)";
        if(mysqli_query($db,$q2)){
            echo '<h1>REJESTRACJA EPICKA POWIODŁA SIĘ</h1>';
            echo '<p><a href="?page=login">Zaloguj się</a></p>';
        
        }else{
            echo '<h1>ten email jest juz zarejestrowany</h1>';
        }
    }
    if(isset($_POST['logowanie'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $password = md5($password);

        $q3 = "SELECT * FROM `users` WHERE `email` LIKE '$email' AND `password` LIKE '$password'";
        $r3 = mysqli_query($db,$q3);
        $row3 = mysqli_num_rows($r3);
        if($row3 == 1){
            $id = mysqli_fetch_row($r3);
            $date = date('Y-m-d');
            $q4 = "UPDATE `users` SET `last_login`='$date' WHERE `id`='$id[0]'";
            mysqli_query($db, $q4);
            session_start();
            $_SESSION['id'] = $id[0];
            header("Location: http://localhost/panel3c2.php",5);
        }else{
            echo '<h1>zle haslo albo email</h1>';
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php
    if(isset($_GET['page'])){
        if($_GET['page']=='login'){  //stronka do loginu
?>
        <form action="" method="post">
            <input type="email" name="email" id="">
            <input type="password" name="password" id="">
            <input type="submit" name="logowanie" value="zaloguj">
        </form>
<?php
        }
    }else{
?>
    <form action="" method="post">
        <input type="email" name="email" id="">
        <input type="password" name="password" id="">
        <select name="profile" id="">
<?php
            $q1 = "SELECT * FROM `profile`";
            $r1 = mysqli_query($db,$q1);
            while($row1 = mysqli_fetch_row($r1))
            echo '<option value="'.$row1[0].'">'.$row1[1].'</option>';
?>
        </select>
        <input type="submit" value="ZAREJESTRUJ" name="rejestracja">
    </form>
    <p><a href="?page=login">Zaloguj się</a></p>
<?php
    }
?>

</body>
</html>

<?php
    mysqli_close($db);
	
?>