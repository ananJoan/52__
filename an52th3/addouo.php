<?php
    session_start();
    $db=mysqli_connect("localhost","admin","1234","an52th3");
    mysqli_query($db,"SET NAMES UTF8");
    $user=$_SESSION["user"];
    if(!empty($_POST)){
        $a=$_POST["acc"];
        $b=$_POST["pas"];
        $c=$_POST["lockadmin"];
        mysqli_query($db,"INSERT INTO `adminuser`(`account`, `password`, `lockadmin`) VALUES ('$a','$b','$c')");
        header("location:admintable.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增帳號</title>
</head>
<body>
<form action="addouo.php" method="post">
    帳號<input type="text" name="acc"><br>
    密碼<input type="text" name="pas"><br>
    權限<input type="text" name="lockadmin"><br>
    <input type="submit" value="確認">
</form>
</body>
</html>