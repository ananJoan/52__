<?php
    session_start();
    $db=mysqli_connect("localhost","admin","1234","an52th3");
    mysqli_query($db,"SET NAMES UTF8");
    $user=$_SESSION["user"];
    if(!empty($_POST)){
        $a=$_POST["name"];
        $b=$_POST["content"];
        $c=$_POST["starts"];
        $d=$_POST["ends"];
        $e=$_POST["conditions"];
        $f=$_POST["types"];
        mysqli_query($db,"INSERT INTO `work`(`works`, `conditions`, `type`, `starts`, `ends`, `content`, `user`) VALUES ('$a','$e','$f','$c','$d','$b','$user')");
        header("location:usertable.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增工作</title>
</head>
<body>
<form action="addwork.php" method="post">
    名稱<input type="text" name="name"><br>
    內容<input type="text" name="content"><br>
    開始<input type="text" name="starts"><br>
    結束<input type="text" name="ends"><br>
    <select name="conditions">
    <option value="未處理">未處理</option>
    <option value="處理中">處理中</option>
    <option value="已處理">已處理</option>
    </select><br>
    <select name="types">
    <option value="普通件">普通件</option>
    <option value="速件">速件</option>
    <option value="最速件">最速件</option>
    </select><br>
    <input type="submit" value="確認">
</form>
</body>
</html>