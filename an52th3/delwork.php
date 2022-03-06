<?php
    session_start();
    $db=mysqli_connect("localhost","admin","1234","an52th3");
    mysqli_query($db,"SET NAMES UTF8");
    $id=$_SESSION["id"];
    mysqli_query($db,"DELETE FROM `work` WHERE `id` LIKE '$id'");
    header("location:usertable.php");
?>