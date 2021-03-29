<?php
    session_start();
    if(isset($_SESSION['id'])) {

        

    } else {
        header("location http://localhost/panel3c2.php?page=login"); 
    }
?>