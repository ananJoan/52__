<?php
    session_start();
    $db=mysqli_connect("localhost","admin","1234","an52th3");
    mysqli_query($db,"SET NAMES UTF8");
    header("Content-type:text/html;charset=utf-8");
    if(!empty($_POST)){
        $code=$_SESSION["piccode"];
        $a=$_POST["acc"];
        $b=$_POST["pas"];
        $c=$_POST["piccode"];
        $fail=$_SESSION["fail"];
        $row=mysqli_query($db,"SELECT * FROM `adminuser` WHERE `account` LIKE '$a'");
        $arr=mysqli_fetch_array($row);
        if(empty($arr[0])){
            echo "帳號錯誤";
            $_SESSION["fail"]=$_SESSION["fail"]+1;
            if($_SESSION["fail"]==3) header("location:fail.htm");
        }else if($b!=$arr[2]){
            echo "密碼錯誤";
            $_SESSION["fail"]=$_SESSION["fail"]+1;
            if($_SESSION["fail"]==3) header("location:fail.htm");
        }else if($c!=$code){
            echo "驗證碼錯誤";
            $_SESSION["fail"]=$_SESSION["fail"]+1;
            if($_SESSION["fail"]==3) header("location:fail.htm");
        }else{
            date_default_timezone_set('Asia/Taipei');
            $time=date('Y/m/d H:i:s');
            mysqli_query($db,"INSERT INTO `inouttime`( `account`, `time`, `inorout`) VALUES ('$arr[1]','$time','登入')");
            $_SESSION["user"]=$arr[1];
            if($arr[3]=="管理者"){
                header("location:admintable.php");
            }else{
                header("location:usertable.php");
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jquery-3.6.0.min.js"></script>
    <title>登入</title>
</head>
<body>
    <form action="login.php" method="post">
    帳號<input type="text" name="acc"><br>
    密碼<input type="password" name="pas"><br>
    <img src="pro.php" id="pro"><input type="button" value="更換驗證碼" id="newpro"><br>
    驗證碼<input type="text" name="piccode"><br>
    <input type="submit" value="登入">
    </form>
</body>
</html>
<script>
    $("#newpro").click(function(){
        $("#pro").attr('src','pro.php');
    });
</script>