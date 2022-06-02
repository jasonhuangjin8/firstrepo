<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 
 <html xmlns="http://www.w3.org/1999/xhtml">
  <meta charset="utf-8">
<title>酒店</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=1" />
<meta name="format-detection" content="telephone=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<style>

table {
    border-collapse: collapse;
}

.ruzhu{
	background: rgb(255,128,128);
}
.qs{
    background: rgb(160,160,160);
    }
.fc{
	background: rgb(255,0,255);
}
.wx{
	background: rgb(128,0,255);
}
tr td{
	border:3px #000 solid;
}
div{
	width=30px;
	height=50px;
}

li{
	list-style: none;
}
</style>
 <head>
  
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  
   <title>无标题文档</title>
  
 </head>
  
  
  
 <body>
  
 <table width="1000px" border="3" cellpadding="0" cellspacing="0">
  

 
 <?php
  ini_set("mssql.datetimeconvert","0");
 date_default_timezone_set('Asia/shanghai');
 echo date("Y-m-d H:i:s");
 $serverName = "127.0.0.1";
 $connectionInfo = array( "Database"=>"JHFZBH_R2022", "UID"=>"huang", "PWD"=>"huang520","CharacterSet"=>"utf-8");
 $conn = sqlsrv_connect( $serverName, $connectionInfo );
 if( $conn === false ) {
   die( print_r( sqlsrv_errors(), true));
 }
 //echo "<h3>订房平台统计（包含当日预订房）：</h3>"; 
 $sql33 = "SELECT TOP 1000 [ID]
	  ,[房号]
      ,[类别]
      ,[状态]
      ,[楼层]
      ,[状态2]
      ,[留言]
      ,[特殊要求]
      ,[房客姓名]
	  ,[订房平台]
	  ,[房间备注]
  FROM [JHFZBH_R2022].[dbo].[房间信息]";
 //echo "<table><tbody>";
 $stmt3 = sqlsrv_query( $conn, $sql33 );
 if( $stmt3 === false) {
   die( print_r( sqlsrv_errors(), true) );
 }
//id fanghao	leibie	zhuangtai1	louceng	zhuangtai2	liuyan	teshuyaoqiu	guest_name	

 //'UPDATE runoob_tbl SET runoob_title="学习 Python"  WHERE runoob_id=3'
$servername = "localhost";
$username = "huang";
$password = "huang520";
$dbname = "roominfo";
 
// 创建连接
$conn1= new mysqli($servername, $username, $password, $dbname);
// 检测连接

 


 while($row = sqlsrv_fetch_array($stmt3))
 {$foo=$row[0];
    $a = (int)$foo;
    //echo "<tr><td>"."<li style='color:red;list-style: none;'>".$row[0].$row[1].$row[2].$row[3].$row[4].$row[5].$row[6].$row[7]."</td></tr>";
	if ($conn1->connect_error) {
		die("连接失败: " . $conn1->connect_error);
		echo "error111111111111111";
		} 
 
	$sql = "UPDATE roominfo SET id='$row[0]',fanghao='$row[1]',leibie='$row[2]',zhuangtai1='$row[3]',louceng='$row[4]',zhuangtai2='$row[9]',liuyan='$row[6]',teshuyaoqiu='$row[7]',guest_name='$row[8]',cldays='$row[9]' WHERE id='$row[0]'";
	
	if ($conn1->query($sql) === TRUE) {
		echo "";
	} else {
		echo "Error: " . $sql . "<br>" . $conn1->error;
		}
	$sql22 ="UPDATE roominfo SET id='$row[0]',fanghao='$row[1]',leibie='$row[2]',zhuangtai1='$row[3]',louceng='$row[4]',zhuangtai2='$row[9]',liuyan='$row[6]',teshuyaoqiu='$row[7]',guest_name='$row[8]' WHERE id='$row[0]'";
	
 }
  //echo "</tbody></table>";
  $conn1->close();
  
  
  
  
  
 $db = new MySQLi("localhost","huang","huang520","roominfo");
 //连接数据库
 $sql1 = "select * from roominfo where louceng='1楼'";
  $sql2 = "select * from roominfo where louceng='2楼'";
   $sql3 = "select * from roominfo where louceng='3楼'";
    $sql5 = "select * from roominfo where louceng='5楼'";
	 $sql6 = "select * from roominfo where louceng='6楼'";
	  $sql7 = "select * from roominfo where louceng='7楼'";
 //写sql语句
 $r1 = $db->query($sql1);
   $r2 = $db->query($sql2);
    $r3 = $db->query($sql3);
	 $r5 = $db->query($sql5);
	  $r6 = $db->query($sql6);
	   $r7 = $db->query($sql7);
 //执行sql语句返回给r
echo"<tr>";
 if($r1)//条件
 {
   while ($attr = $r1->fetch_row())
   {
	   if(($attr[3]) == '入住房'){
		   echo "<td  class= 'ruzhu'><div><li >{$attr[1]}</li><br><li>{$attr[2]}</li>	<br><li>{$attr[8]}</li>	<br><li>【{$attr[5]}】</li></div></td>";
	   }elseif(($attr[3]) == '打扫中'){
		echo "<td  class= 'qs'><div><li >{$attr[1]}</li><br><li>{$attr[2]}</li>	<br><li>{$attr[8]}</li>	<br></div></td>";
		}
		elseif(($attr[3]) == '封存房'){
		echo "<td  class= 'fc'><div><li >{$attr[1]}</li><br><li>{$attr[2]}</li>	<br><li>{$attr[8]}</li>	<br></div></td>";
		}
		elseif(($attr[3]) == '修理中'){
		echo "<td  class= 'wx'><div><li >{$attr[1]}</li><br><li>{$attr[2]}</li>	<br><li>{$attr[8]}</li>	<br></div></td>";
		}
		else{
		echo "<td  ><div><li >{$attr[1]}</li><br><li>{$attr[2]}</li>	<br><li>{$attr[8]}</li>	<br></div></td>";
		}
	}
 }
echo"</tr><tr>";

 if($r2)//条件
 {
   while ($attr = $r2->fetch_row())
   {
	   if(($attr[3]) == '入住房'){
		   echo "<td  class= 'ruzhu'><div><li >{$attr[1]}</li><br><li>{$attr[2]}</li>	<br><li>{$attr[8]}</li>	<br><li>【{$attr[5]}】</li></div></td>";
	   }elseif(($attr[3]) == '打扫中'){
		echo "<td  class= 'qs'><div><li >{$attr[1]}</li><br><li>{$attr[2]}</li>	<br><li>{$attr[8]}</li>	<br></div></td>";
		}
		elseif(($attr[3]) == '封存房'){
		echo "<td  class= 'fc'><div><li >{$attr[1]}</li><br><li>{$attr[2]}</li>	<br><li>{$attr[8]}</li>	<br></div></td>";
		}
		elseif(($attr[3]) == '修理中'){
		echo "<td  class= 'wx'><div><li >{$attr[1]}</li><br><li>{$attr[2]}</li>	<br><li>{$attr[8]}</li>	<br></div></td>";
		}
		else{
		echo "<td  ><div><li >{$attr[1]}</li><br><li>{$attr[2]}</li>	<br><li>{$attr[8]}</li>	<br></div></td>";
		}
	}
}
echo"</tr><tr>";
 if($r3)//条件
 {
   while ($attr = $r3->fetch_row())
   {
	   if(($attr[3]) == '入住房'){
		   echo "<td  class= 'ruzhu'><div><li >{$attr[1]}</li><br><li>{$attr[2]}</li>	<br><li>{$attr[8]}</li>	<br><li>【{$attr[5]}】</li></div></td>";
	   }elseif(($attr[3]) == '打扫中'){
		echo "<td  class= 'qs'><div><li >{$attr[1]}</li><br><li>{$attr[2]}</li>	<br><li>{$attr[8]}</li>	<br></div></td>";
		}
		elseif(($attr[3]) == '封存房'){
		echo "<td  class= 'fc'><div><li >{$attr[1]}</li><br><li>{$attr[2]}</li>	<br><li>{$attr[8]}</li>	<br></div></td>";
		}
		elseif(($attr[3]) == '修理中'){
		echo "<td  class= 'wx'><div><li >{$attr[1]}</li><br><li>{$attr[2]}</li>	<br><li>{$attr[8]}</li>	<br></div></td>";
		}
		else{
		echo "<td  ><div><li >{$attr[1]}</li><br><li>{$attr[2]}</li>	<br><li>{$attr[8]}</li>	<br></div></td>";
		}
	}
}
echo"</tr><tr>";
 if($r5)//条件
 {
   while ($attr = $r5->fetch_row())
   {
	   if(($attr[3]) == '入住房'){
		   echo "<td  class= 'ruzhu'><div><li >{$attr[1]}</li><br><li>{$attr[2]}</li>	<br><li>{$attr[8]}</li>	<br><li>【{$attr[5]}】</li></div></td>";
	   }elseif(($attr[3]) == '打扫中'){
		echo "<td  class= 'qs'><div><li >{$attr[1]}</li><br><li>{$attr[2]}</li>	<br><li>{$attr[8]}</li>	<br></div></td>";
		}
		elseif(($attr[3]) == '封存房'){
		echo "<td  class= 'fc'><div><li >{$attr[1]}</li><br><li>{$attr[2]}</li>	<br><li>{$attr[8]}</li>	<br></div></td>";
		}
		elseif(($attr[3]) == '修理中'){
		echo "<td  class= 'wx'><div><li >{$attr[1]}</li><br><li>{$attr[2]}</li>	<br><li>{$attr[8]}</li>	<br></div></td>";
		}
		else{
		echo "<td  ><div><li >{$attr[1]}</li><br><li>{$attr[2]}</li>	<br><li>{$attr[8]}</li>	<br></div></td>";
		}
	}
}
echo"</tr><tr>";
 if($r6)//条件
 {
   while ($attr = $r6->fetch_row())
   {
	   if(($attr[3]) == '入住房'){
		   echo "<td  class= 'ruzhu'><div><li >{$attr[1]}</li><br><li>{$attr[2]}</li>	<br><li>{$attr[8]}</li>	<br><li>【{$attr[5]}】</li></div></td>";
	   }elseif(($attr[3]) == '打扫中'){
		echo "<td  class= 'qs'><div><li >{$attr[1]}</li><br><li>{$attr[2]}</li>	<br><li>{$attr[8]}</li>	<br></div></td>";
		}
		elseif(($attr[3]) == '封存房'){
		echo "<td  class= 'fc'><div><li >{$attr[1]}</li><br><li>{$attr[2]}</li>	<br><li>{$attr[8]}</li>	<br></div></td>";
		}
		elseif(($attr[3]) == '修理中'){
		echo "<td  class= 'wx'><div><li >{$attr[1]}</li><br><li>{$attr[2]}</li>	<br><li>{$attr[8]}</li>	<br></div></td>";
		}
		else{
		echo "<td  ><div><li >{$attr[1]}</li><br><li>{$attr[2]}</li>	<br><li>{$attr[8]}</li>	<br></div></td>";
		}
	}
}
echo"</tr><tr>";
 if($r7)//条件
 {
   while ($attr = $r7->fetch_row())
   {
	   if(($attr[3]) == '入住房'){
		   echo "<td  class= 'ruzhu'><div><li >{$attr[1]}</li><br><li>{$attr[2]}</li>	<br><li>{$attr[8]}</li>	<br><li>【{$attr[5]}】</li></div></td>";
	   }elseif(($attr[3]) == '打扫中'){
		echo "<td  class= 'qs'><div><li >{$attr[1]}</li><br><li>{$attr[2]}</li>	<br><li>{$attr[8]}</li>	<br></div></td>";
		}
		elseif(($attr[3]) == '封存房'){
		echo "<td  class= 'fc'><div><li >{$attr[1]}</li><br><li>{$attr[2]}</li>	<br><li>{$attr[8]}</li>	<br></div></td>";
		}
		elseif(($attr[3]) == '修理中'){
		echo "<td  class= 'wx'><div><li >{$attr[1]}</li><br><li>{$attr[2]}</li>	<br><li>{$attr[8]}</li>	<br></div></td>";
		}
		else{
		echo "<td  ><div><li >{$attr[1]}</li><br><li>{$attr[2]}</li>	<br><li>{$attr[8]}</li>	<br></div></td>";
		}
	}
}

?>

 </table>
 
 </body>
 </html>