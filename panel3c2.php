<?php
    session_start();
    if(isset($_SESSION['id'])) {
        $db = mysqli_connect("localhost", "root", "", "slawkowabaza");

        $id = $_SESSION['id'];
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
    <title>Document</title>
</head>
<body>
<?php
        if($row1[5]==2) { //uczen
?>

<?php
        }
        if($row[5]==1) { //nauczyciel

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