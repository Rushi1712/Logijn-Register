<?php
    session_start();
    if(!isset($_SESSION['user'])){
        header('location:login.php');
    }
?>
<html>
    <body>
        <h1>welcome user</h1>
        <a href="logout.php">Logout</a>
    </body>
</html>