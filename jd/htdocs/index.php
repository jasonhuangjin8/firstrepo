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
}

table, td, th {
    border: 2px solid black;
	margin:2px;
	color:red;
}
</style>
</head>

<body>
<a href="http://34321js086.imdo.co/">请确保时间是当前时间！点击刷新</a><br>
<a href="http://34321js086.imdo.co/">请确保时间是当前时间！点击刷新</a><br>
<a href="http://34321js086.imdo.co/">请确保时间是当前时间！点击刷新</a><br>
<div>


<?php 
 date_default_timezone_set('Asia/shanghai');
 echo "<h3 style='color:red;'>"."对比手机时间：".date("Y-m-d H:i:s")."</h3>";
 $serverName = "127.0.0.1";
 $connectionInfo = array( "Database"=>"JHFZBH_R2022", "UID"=>"huang", "PWD"=>"huang520","CharacterSet"=>"utf-8");
 $conn = sqlsrv_connect( $serverName, $connectionInfo );
 if( $conn === false ) {
   die( print_r( sqlsrv_errors(), true));
 }
 echo '<a href="http://34321js086.imdo.co/"><h3>订房平台统计（包含当日预订房）：</h3></a>'; 
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
 $sql1 = "SELECT TOP 1000 [房号],[退房时间] FROM [JHFZBH_R2022].[dbo].[房间信息] WHERE 状态='打扫中'  and 退房时间>CONVERT(VARCHAR(100),GETDATE()-1,23) order by 退房时间 desc" ;
 $stmt1 = sqlsrv_query( $conn, $sql1 );
 if( $stmt1 === false) {
   die( print_r( sqlsrv_errors(), true) );
 }

$sql9 = "SELECT count(*) FROM dbo.房间信息 WHERE 状态='打扫中' and 房号 !='8888'";
 $stmt9 = sqlsrv_query( $conn, $sql9 );
 if( $stmt9 === false) {
   die( print_r( sqlsrv_errors(), true) );
 }

 while($row9 = sqlsrv_fetch_array($stmt9))
	{$dasao=$row9[0];
		$e9=(int)$dasao;
	
	echo '<a href="http://34321js086.imdo.co/"><h3>需要打扫的空房间:'.($e9).'</h3></a>'; }
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

 $sql2 = "SELECT * FROM dbo.房间信息 WHERE 状态='入住房' and 房号 !='8888'";
 $stmt2 = sqlsrv_query( $conn, $sql2 );
 if( $stmt2 === false) {
   die( print_r( sqlsrv_errors(), true) );
 }
 
 echo '<a href="http://34321js086.imdo.co/"><h3>有人住的房间:</h3></a>'; 
 echo "<table><tbody>";
 $zero1=strtotime (date('y-m-d')); //当前时间
 
  //60s*60min*24h
 echo "<tr><td>房号&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;姓名&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;已住天数&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;可能续住天数</td></tr>";
 while($row = sqlsrv_fetch_array($stmt2)){
 $zero2= strtotime($row[27]->format('Y-m-d'));
 //$zero2= strtotime("2021-12-01");
 //echo gettype($zero2);
 $guonian=(($zero1-$zero2)/86400); 
 
 //echo "==".$guonian;
 
	 echo "<tr><td>".$row[1]."&nbsp;---&nbsp;&nbsp;".$row[17]."&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;".$guonian."天</td><td>".$row[16]."</td></tr>";
	 
	 }
 echo "</tbody></table>";

?>
</div>
</body>
</html>