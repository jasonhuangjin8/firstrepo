<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>酒店</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width, initial-scale=0.7, maximum-scale=3.0, user-scalable=1" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<style>
body{font-size:17px;font-family:"Microsoft YaHei",Arial; overflow-x:auto; overflow-y:auto;}
.viewport{ max-width:940px; min-width:600px; margin:0 auto;}
table {
    border-collapse: collapse;
	text-align:center

}

table, td, th {
    border: 2px solid black;
	margin:2px;
	color:red;
}
</style>
</head>

<body>
<a href="http://34321js086.imdo.co/chafang.php">请确保时间是当前时间！点击刷新</a><br>
<a href="http://34321js086.imdo.co/chafang.php">请确保时间是当前时间！点击刷新</a><br>
<a href="http://34321js086.imdo.co/chafang.php">请确保时间是当前时间！点击刷新</a><br>
<div>


<?php 
 date_default_timezone_set('Asia/shanghai');

 $serverName = "127.0.0.1";
 $connectionInfo = array( "Database"=>"JHFZBH_R2022", "UID"=>"huang", "PWD"=>"huang520","CharacterSet"=>"utf-8");
 $conn = sqlsrv_connect( $serverName, $connectionInfo );
 if( $conn === false ) {
   die( print_r( sqlsrv_errors(), true));
 }
 echo '<a href="http://34321js086.imdo.co/chafang.php"><h3>订房平台统计（包含当日预订房）：</h3></a>'; 
 $sql3 = "SELECT count(*) FROM dbo.房间信息 WHERE  状态='入住房' AND 订房平台='美团'";
 $stmt3 = sqlsrv_query( $conn, $sql3 );
 if( $stmt3 === false) {
   die( print_r( sqlsrv_errors(), true) );
 }

 while($row = sqlsrv_fetch_array($stmt3))
 {$foo=$row[0];
 $a = (int)$foo;
 echo "<li style='color:red;list-style: none;'>"."美团：".$row[0]."</li>";}


 $sql4 = "SELECT count(*) FROM dbo.房间信息 WHERE  状态='入住房' AND 订房平台='携程（预付）'";
 $stmt4 = sqlsrv_query( $conn, $sql4 );
 if( $stmt4 === false) {
   die( print_r( sqlsrv_errors(), true) );
 }
 
 while($row = sqlsrv_fetch_array($stmt4))
 $foo=$row[0];
 $b = (int)$foo;


 $sql5 = "SELECT count(*) FROM dbo.房间信息 WHERE 状态='入住房' AND 订房平台='携程（闪住）'";
 $stmt5 = sqlsrv_query( $conn, $sql5 );
 if( $stmt5 === false) {
   die( print_r( sqlsrv_errors(), true) );
 }
 
 while($row = sqlsrv_fetch_array($stmt5))

 $foo=$row[0];
 $c = (int)$foo;
 {echo "<li style='color:red;list-style: none;'>"."携程：".($b+$c)."</li>";}

 $sql6 = "SELECT count(*) FROM dbo.房间信息 WHERE  状态='入住房' AND 订房平台='飞猪'";
 $stmt6 = sqlsrv_query( $conn, $sql6 );
 if( $stmt6 === false) {
   die( print_r( sqlsrv_errors(), true) );
 }
 
 while($row = sqlsrv_fetch_array($stmt6))
 
 {echo "<li style='color:red;list-style: none;'>"."飞猪：".$row[0]."</li>";}


	

 $sql7 = "SELECT count(*) FROM dbo.房间信息 WHERE 状态='入住房' AND 订房平台=''";
 $stmt7 = sqlsrv_query( $conn, $sql7 );
 if( $stmt7 === false) {
   die( print_r( sqlsrv_errors(), true) );
 }

 while($row = sqlsrv_fetch_array($stmt7))
	{$xianxia=$row[0];
		$e=(int)$xianxia;
		echo "<li style='color:red;list-style: none;'>"."线下：".($e)."</li>";}

 $sql8 = "SELECT count(*) FROM dbo.房间信息 WHERE 状态='入住房' and 房号 !='8888'";
 $stmt8 = sqlsrv_query( $conn, $sql8 );
 if( $stmt8 === false) {
   die( print_r( sqlsrv_errors(), true) );
 }

 while($row = sqlsrv_fetch_array($stmt8))
	{$ruzhu=$row;
		$f=(int)$ruzhu;
		echo "<li style='color:red;list-style: none;'>"."已入住总数：".$row[0]."</li>";}
		
 echo "<a href='test/list.php'> 查看房态图</a>";
 $sql1 = "SELECT TOP 1000 [房号],[退房时间] FROM [JHFZBH_R2022].[dbo].[房间信息] WHERE 状态='打扫中' and 退房时间>CONVERT(VARCHAR(100),GETDATE()-1,23) order by 退房时间 desc";
 $stmt1 = sqlsrv_query( $conn, $sql1 );
 if( $stmt1 === false) {
   die( print_r( sqlsrv_errors(), true) );
 }

$sql9 = "SELECT count(*) FROM dbo.房间信息 WHERE 状态='打扫中'";
 $stmt9 = sqlsrv_query( $conn, $sql9 );
 if( $stmt9 === false) {
   die( print_r( sqlsrv_errors(), true) );
 }

 while($row9 = sqlsrv_fetch_array($stmt9))
	{$dasao=$row9[0];
		$e9=(int)$dasao;
	
	echo '<a href="http://34321js086.imdo.co/chafang.php"><h3>需要打扫的空房间:'.($e9).'</h3></a>'; }
 echo "<table><tbody>";
 echo "<tr><td style='color:black;'>房号</td><td>&nbsp;&nbsp;离店时间</td></tr>";
 while($row = sqlsrv_fetch_array($stmt1)){
	if ($row) {
		$outtime=date($row[1]->format('H:i:s'));
		echo "<tr><td style='color:black;'>".$row[0]."&nbsp;&nbsp;</td><td>&nbsp;&nbsp;".$outtime."</td></tr>";
		}
	else{
		echo "房间全部干净";
		}
	}

  echo "</tbody></table>";

 $sql_map = "SELECT [ID]
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
  
 $msql_map = sqlsrv_query( $conn, $sql_map );
  if( $msql_map === false) {
   die( print_r( sqlsrv_errors(), true) );
 }
 $mysql_servername = "localhost";
$mysql_username = "huang";
$mysql_password = "huang520";
$mysql_dbname = "kefanginfo";
$mysql_conn= new mysqli($mysql_servername, $mysql_username, $mysql_password, $mysql_dbname);
 while($mysql_row = sqlsrv_fetch_array($msql_map))
 {

	$checkouttime = $mysql_row[10]->format('Y-m-d H:i:s.u');
	$checkintime=$mysql_row[11]->format('Y-m-d H:i:s.u');
	$timeout=$mysql_row[12]->format('Y-m-d H:i:s.u');
	$mysql_sql11 = "UPDATE kefanginfo.房间信息 SET 类别='$mysql_row[2]',状态='$mysql_row[3]',楼层='$mysql_row[4]',系统房='$mysql_row[5]',留言='$mysql_row[6]',特殊要求='$mysql_row[7]',房客姓名='$mysql_row[8]',团购='$mysql_row[9]',退房时间='$checkouttime',抵达时间='$checkintime',预离日期='$timeout',订房平台='$mysql_row[14]' WHERE ID=$mysql_row[0]";
	
	if ($mysql_conn->query($mysql_sql11) === TRUE) {
		echo "";
	} else {
		echo "Error: " . $mysql_sql11 . "<br>" . $mysql_conn->error;
		}
 }
 $mysql_list = "SELECT * FROM kefanginfo.房间信息 WHERE 状态='入住房' and 房号 !='8888'";
 $stmt2mysql =$mysql_conn->query($mysql_list);

 
 echo '<a href="http://34321js086.imdo.co/chafang.php"><h3>有人住的房间:</h3></a>'; 
  echo "<h3 style='color:red;'>"."对比手机时间：".date("Y-m-d H:i:s")."</h3>";
 echo "<table><tbody>";



 $zero1=strtotime (date('y-m-d')); //当前时间
 echo '<table  action="UpworkChuLi.php" method="post">';
 echo "<tr><td>房号&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;姓名&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;已住天数&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;续住</td><td>&nbsp;&nbsp;&nbsp;打扫日期&nbsp;&nbsp;&nbsp;</td><td>点击记录</td><td>清除记录</td></tr>";


 
 if($stmt2mysql)//条件
 {
    while ($attr1 = $stmt2mysql->fetch_row()){
		
		$d1=new DateTime($attr1[27]);
		$zero2= strtotime($d1->format('Y-m-d'));
		$guonian=(($zero1-$zero2)/86400); 
		$rmnb=$attr1[1];
		$link1='update.php?code='.$rmnb;
		$link2='clear.php?code='.$rmnb;
		echo "<tr><td>".$attr1[1]."&nbsp;---&nbsp;&nbsp;".$attr1[17]."&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;".$guonian."天</td><td>".$attr1[16]."</td><td>$attr1[38]</td><td><a href='$link1' onclick='bton'>$attr1[1]已清理</a> </td><td>&nbsp;&nbsp;&nbsp;<a href='$link2' onclick='bton2'>清除记录</a> </td></tr>";
	}
 }
  echo "</table></tbody>";
?>
</div>
</body>
</html>