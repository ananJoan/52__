<?php
    session_start();
    $db=mysqli_connect("localhost","admin","1234","an52th3");
    mysqli_query($db,"SET NAMES UTF8");
    $id=$_POST["id"];
    $st=$_POST["starts"];
    $le=$_POST["left"];
    $row=mysqli_query($db,"SELECT * FROM `work` WHERE `id` LIKE '$id'");
    $arr=mysqli_fetch_array($row);
    $rwr=$arr[5]-$arr[4];
    $ed=$st+$rwr;
    $row=mysqli_query($db,"UPDATE `work` SET `starts`='$st',`ends`='$ed', `offleft`='$le' WHERE `id` LIKE '$id'");
?>