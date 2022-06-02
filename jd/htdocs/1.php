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
   <script type="text/javascript" language="javascript">
	 function btn1($rmnb) {
		$tmp=$rmnb;
		alert($tmp);
	}
	</script>
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

 $sql = "SELECT [ID]
	  ,[房号]
      ,[类别]
      ,[状态]
      ,[楼层]
	  ,[系统房]
      ,[留言]
      ,[特殊要求]
      ,[房客姓名]
	  ,[团购]
	  ,[退房时间]
	  ,[抵达时间]
	  ,[预离日期]
	  ,[入住价]
	  ,[订房平台]
	  
  FROM [JHFZBH_R2022].[dbo].[房间信息] where (ID between 10 and 54) and ID !=51";
  
 $stmt = sqlsrv_query( $conn, $sql );
 if( $stmt === false) {
   die( print_r( sqlsrv_errors(), true) );
 }

 //mysql
$servername = "localhost";
$username = "huang";
$password = "huang520";
$dbname = "kefanginfo";
$conn1= new mysqli($servername, $username, $password, $dbname);
 while($row = sqlsrv_fetch_array($stmt))
 {
	//echo "UPDATE kefanginfo.房间信息 SET 类别='$row[2]',状态='$row[3]',楼层='$row[4]',系统房='$row[5]',留言='$row[6]',特殊要求='$row[7]',房客姓名='$row[8]',团购='$row[9]',退房时间=$row[10],抵达时间=$row[11],预离日期=$row[12],入住价='$row[13]' ,订房平台='$row[14]'  WHERE ID=$row[0]";抵达时间=date_format(('$row[11]'),'%Y-%m-%d %T'),退房时间=('$row[10]'),

	$checkouttime = $row[10]->format('Y-m-d H:i:s.u');
	$checkintime=$row[11]->format('Y-m-d H:i:s.u');
	$timeout=$row[12]->format('Y-m-d H:i:s.u');
	$sql11 = "UPDATE kefanginfo.房间信息 SET 类别='$row[2]',状态='$row[3]',楼层='$row[4]',系统房='$row[5]',留言='$row[6]',特殊要求='$row[7]',房客姓名='$row[8]',团购='$row[9]',退房时间='$checkouttime',抵达时间='$checkintime',预离日期='$timeout',订房平台='$row[14]' WHERE ID=$row[0]";
	
	if ($conn1->query($sql11) === TRUE) {
		echo "";
	} else {
		echo "Error: " . $sql11 . "<br>" . $conn1->error;
		}
 }
	
 
 //连接数据库
 $sql1 = "select * from kefanginfo.房间信息 where 楼层='1楼'";
  $sql2 = "select * from kefanginfo.房间信息 where 楼层='2楼'";
   $sql3 = "select * from kefanginfo.房间信息 where 楼层='3楼'";
    $sql5 = "select * from kefanginfo.房间信息 where 楼层='5楼'";
	 $sql6 = "select * from kefanginfo.房间信息 where 楼层='6楼'";
	  $sql7 = "select * from kefanginfo.房间信息 where 楼层='7楼'";
 //写sql语句
 $r1 = $conn1->query($sql1);
   $r2 = $conn1->query($sql2);
    $r3 = $conn1->query($sql3);
	 $r5 = $conn1->query($sql5);
	  $r6 = $conn1->query($sql6);
	   $r7 = $conn1->query($sql7);
 //执行sql语句返回给r
echo"<tr>";
 if($r1)//条件
 {
   while ($attr = $r1->fetch_row())
   {
	   if(($attr[4]) == '入住房'){
		   echo "<td  class= 'ruzhu'><div><li >{$attr[1]}</li><br><li>{$attr[3]}</li>	<br><li>{$attr[8]}</li>	<br><li>【{$attr[5]}】</li></div></td>";
	   }elseif(($attr[4]) == '打扫中'){
		echo "<td  class= 'qs'><div><li >{$attr[1]}</li><br><li>{$attr[3]}</li>	<br><li>{$attr[8]}</li>	<br></div></td>";
		}
		elseif(($attr[4]) == '封存房'){
		echo "<td  class= 'fc'><div><li >{$attr[1]}</li><br><li>{$attr[3]}</li>	<br><li>{$attr[8]}</li>	<br></div></td>";
		}	
		elseif(($attr[4]) == '修理中'){
		echo "<td  class= 'wx'><div><li >{$attr[1]}</li><br><li>{$attr[3]}</li>	<br><li>{$attr[8]}</li>	<br></div></td>";
		}
		else{
		echo "<td  ><div><li >{$attr[1]}</li><br><li>{$attr[3]}</li>	<br><li>{$attr[8]}</li>	<br></div></td>";
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
echo "</table>";


echo '<a href="http://34321js086.imdo.co/1.php"><h3>有人住的房间:</h3></a>'; 
echo "<table><tbody>";
$zero1=strtotime (date('y-m-d')); //当前时间
$sqla = "Select 房号,房客姓名,楼层,特殊要求,date_format(抵达时间,'%Y-%m-%d') from kefanginfo.房间信息 WHERE 状态='入住房'";
$re1= $conn1->query($sqla);
//echo $zero1;
 //执行sql语句返回给r
echo"<tr>";
echo "<tr><td>房号&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;姓名&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;已住天数&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;可能续住天数</td></tr>";

 if($re1)//条件
 {
   while ($attr1 = $re1->fetch_row()){

	$zero2= strtotime($attr1[4]);
//	echo $zero2;
	$guonian=(($zero1-$zero2)/86400); 
	$rmnb=$attr1[0];
	echo "<tr><td>".$attr1[0]."&nbsp;---".$attr1[2]."&nbsp;&nbsp;".$attr1[1]."&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;".$guonian."天</td><td>".$attr1[3]."</td><td></td><td><a href='' onclick='btn1($rmnb)'>del</a> </td></tr>";
	}
} 	
 echo "</tbody></table>";
?>
 </body>
 </html>