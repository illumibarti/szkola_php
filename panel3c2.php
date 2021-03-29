<?php
    session_start();
    if(isset($_SESSION['id'])) {
        $db = mysqli_connect("localhost", "root", "", "slawkowabaza");

        $id = $_SESSION['id'];
        $q1 = "SELECT * FROM `users` WHERE `id`=$id";
        $r1 = mysqli_query($db, $q1);
        $row1 = mysqli_fetch_row($r1);
        //print_r($row1);

        if($row1[5]==2) { //uczen

        }
        if($row[5]==1) { //nauczyciel

        }
        if($row[5]==3) { //moderator

        }

        mysqli_close($db);
    } else {
        header("location http://localhost/panel3c2.php?page=login"); 
    }
?>