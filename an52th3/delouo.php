<?php
    session_start();
    $db=mysqli_connect("localhost","admin","1234","an52th3");
    mysqli_query($db,"SET NAMES UTF8");
    $user=$_GET["id"];
    mysqli_query($db,"DELETE FROM `adminuser` WHERE `id` LIKE '$user'");
    header("location:admintable.php");
?>