<?php
    session_start();
    $db=mysqli_connect("localhost","admin","1234","an52th3");
    mysqli_query($db,"SET NAMES UTF8");
    $_SESSION["user"]=$_SESSION["user"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jquery-3.6.0.min.js"></script>
    <title>管理帳號</title>
</head>
<body>
    <input type="button" id="add" value="新增帳號"><input type="button" id="out" value="登出"><br>
    <table border="1">
        <tr>
            <th>帳號</th>
            <th>密碼</th>
            <th>權限</th>
            <th>修改</th>
            <th>刪除</th>
            <th>時間</th>
        </tr>
        <?php
            $row=mysqli_query($db,"SELECT * FROM `adminuser` WHERE 1");
            while($arr=mysqli_fetch_array($row)){
                echo"
                <tr>
                <td>$arr[1]</td>
                <td>$arr[2]</td>
                <td>$arr[3]</td>
                <td><a href='fixouo.php?id=$arr[0]'>修改</a></td>
                <td><a href='delouo.php?id=$arr[0]'>刪除</a></td>
                <td><a href='timeouo.php?id=$arr[0]'>時間</a></td>
                </tr>
                ";
            }
        ?>
    </table>
</body>
</html>
<script>
    $("#add").click(function(){
        window.location.href="addouo.php";
    });
    $("#out").click(function(){
        window.location.href="outouo.php";
    });
</script>