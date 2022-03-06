<?php
    session_start();
    $db=mysqli_connect("localhost","admin","1234","an52th3");
    mysqli_query($db,"SET NAMES UTF8");
    $user=$_SESSION["user"];
    $_SESSION["user"]=$user;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jquery-3.6.0.min.js"></script>
    <script src="jquery-ui.min.js"></script>
    <link rel="stylesheet" href="jquery-ui.min.css">
    <link rel="stylesheet" href="jquery-ui.structure.min.css">
    <link rel="stylesheet" href="jquery-ui.theme.min.css">
    <title>工作表</title>
    <style>
         body{margin-top: 0;
        position:relative;}
        #tables{border-collapse: collapse;
        position:absolute;
        margin-top: 0;}
    tr{height: 50px;}
    div{margin-top: 0;
        position:relative;}
    
    </style>
</head>
<body>
<input type="button" id="add" value="新增工作"><input type="button" id="out" value="登出"><br>
<table border="1" id="tables">
<tr>
<th>時間</th>
<th>工作項目</th>
</tr>
    
</table>
</body>
</html>
<script>
    for(i=0;i<=22;i+=2){
        i2=i+1;
        $("#tables").append(`
        <tr>
        <td style="width:50px;">`+i+`~`+(i+2)+`</td>
        <td style="width:700px;">
            <div style="height:25px; width: 500px;" id="work`+i+`"></div>
            <div style="height:25px; width: 500px;" id="work`+i2+`"></div>
        </td>
        </tr>
        `);
    }
    showall();
function showall(){
    $(".work").remove();
    $.ajax({
        url:"worksearth.php",
        success:function(e){
            var n=e.split("##");
            n.pop();
            for(i=0;i<n.length;i++){
                rr=JSON.parse(n[i]);
                $start=rr[4];
                $end=rr[5];
                $se=$end-$start;
                $("#work"+$start+"").append(`
                <div style="height:`+(25*$se)+`px; width: 150px; background-color:pink;" class="work" id="a`+rr[0]+`">
                `+$start+`~`+$end+`<br>`+rr[1]+`<br>`+rr[2]+`,`+rr[3]+`<br>
                </div>
                `);
                $("#a"+rr[0]+"").data("id",rr[0]);
                $("#a"+rr[0]+"").data("st",rr[4]);
                $("#a"+rr[0]+"").css("left",parseInt(rr[7]));
            }
            $(".work").draggable({
                grid:[1,25],
                stop:function(e){
                    $st=$(e.target).data("st");
                    $en=parseInt(parseInt($(e.target).css("top")+50)/25);
                    $en=parseInt($en)+parseInt($st);
                    $.post({
                        async:false,
                        url:"aaa.php",
                        data:{
                            id:$(e.target).data("id"),
                            starts:$en,
                            left:$(this).css("left"),
                        },
                        success:function(e){
                            showall();
                        },
                    });
                }
            });
        }
    });
}
    $("#add").click(function(){
        window.location.href="addwork.php";
    });
    $("#out").click(function(){
        window.location.href="outouo.php";
    });
    $("body").on("click",".work",function(){
        $id=$(this).data("id");
        window.location.href="workfd.php?id="+$id+"";
    });
</script>