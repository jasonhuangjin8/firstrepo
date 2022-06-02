<?php
 date_default_timezone_set('Asia/shanghai');
 $code = $_GET["code"];
 $db = new MySQLi("localhost","huang","huang520","kefanginfo");
 !mysqli_connect_error() or die("连接失败！");
 $curdate=date("m-d");
 $sql_1 = "update `房间信息` set 清理=concat(清理,'$curdate;') where 房号='{$code}'";
 echo $sql_1;
 $r = $db->query($sql_1);
 $sql_2 = "update `房间信息` set 清理='' where 状态='空房间	'";
 $r1 = $db->query($sql_2);
 if($r)
 {
     header("location:chafang.php");
 }
 else	
 {
     echo "修改失败！";
 }
?>
