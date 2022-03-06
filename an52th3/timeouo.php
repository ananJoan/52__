<?php
    session_start();
    $db=mysqli_connect("localhost","admin","1234","an52th3");
    mysqli_query($db,"SET NAMES UTF8");
    $id=$_GET["id"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>時間</title>
</head>
<body>
    <table border="1">
    <tr>
        <th>狀態</th>
        <th>時間</th>
    </tr>
    
        <?php
        $row1=mysqli_query($db,"SELECT * FROM `adminuser` WHERE `id` LIKE '$id'");
        $arr1=mysqli_fetch_array($row1);
            $row=mysqli_query($db,"SELECT * FROM `inouttime` WHERE `account` LIKE '$arr1[1]'");
            while($arr=mysqli_fetch_array($row)){
                echo "
                <tr>
                <td>$arr[3]</td>
                <td>$arr[2]</td>
                </tr>
                ";
            }
        ?>
    </table>
</body>
</html>