<!DOCTYPE HTML>
<?php session_start(); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>博客小站-login</title>
</head>
<body>
<?php
/*
 * Created on 2015��1��6��
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
$title=$_POST['title'];
$content=$_POST['content'];

$con = mysqli_connect(SAE_MYSQL_HOST_M,SAE_MYSQL_USER,SAE_MYSQL_PASS,SAE_MYSQL_DB,SAE_MYSQL_PORT);
if (!$con) {
	die('Could not connect: ' . mysql_error());
} else {
	echo "success connet the mysql";
}
//mysql_select_db("web", $con);
mysqli_query($con,"set names 'utf8'");//设置数据库查询时的编码


$sql = "INSERT INTO posts (user_id,title,content) VALUES ('".$_SESSION['id']."', '".addslashes($title)."','".addslashes($content)."');";
if(mysqli_query($con,$sql)){
	//select max(id) as id from posts where title='haode';
	$sql="select max(id) as id from posts where title='".$title."';";
	$result=mysqli_query($con,$sql);
	mysqli_close($con);
	$row = mysqli_fetch_array($result);
	
	$_SESSION['post_id']=$row['id'];
	
	mysqli_close($con);
	echo "<script language=JavaScript> parent.location.href='index.php'; </script>";
	
} else{
	mysqli_close($con);
	die("数据库查询有误 " . mysql_error());
}


?>




</body>

</html>
