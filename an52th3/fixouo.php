<?php
    session_start();
    $db=mysqli_connect("localhost","admin","1234","an52th3");
    mysqli_query($db,"SET NAMES UTF8");
    $id=$_GET["id"];
    if(!empty($_POST)){
        $b=$_POST["pas"];
        $c=$_POST["lockadmin"];
        $row1=mysqli_query($db,"SELECT * FROM `adminuser` WHERE `id` LIKE '$id'");
        $arr1=mysqli_fetch_array($row1);
        mysqli_query($db,"UPDATE `adminuser` SET `password`='$b',`lockadmin`='$c' WHERE `account` LIKE '$arr1[1]'");
        header("location:admintable.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改帳號</title>
</head>
<body>
<form action="fixouo.php" method="post">
    密碼<input type="text" name="pas"><br>
    權限<input type="text" name="lockadmin"><br>
    <input type="submit" value="確認">
</form>
</body>
</html>