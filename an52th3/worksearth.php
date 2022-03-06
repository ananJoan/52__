<?php
    session_start();
    $db=mysqli_connect("localhost","admin","1234","an52th3");
    mysqli_query($db,"SET NAMES UTF8");
    $user=$_SESSION["user"];
    $row=mysqli_query($db,"SELECT * FROM `work` WHERE `user` LIKE '$user'");
    while($arr=mysqli_fetch_array($row)){
        $ar=array();
        array_push($ar,$arr[0]);
        array_push($ar,$arr[1]);
        array_push($ar,$arr[2]);
        array_push($ar,$arr[3]);
        array_push($ar,$arr[4]);
        array_push($ar,$arr[5]);
        array_push($ar,$arr[6]);
        array_push($ar,$arr[8]);
        echo json_encode($ar)."##";
    }
?>