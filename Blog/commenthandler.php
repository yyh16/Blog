<!DOCTYPE HTML>
<?php session_start(); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>博客小站-login</title>
</head>
<body>
<?php

echo $_POST['name'];
echo $_POST['email'];
echo $_POST['comment'];
echo $_SESSION['post_id'];

         if($_POST['name']=="")
		 {
			 echo "<script language=JavaScript> alert('请输入姓名！');history.go(-1);</script>";
		 }
		$con = mysqli_connect(SAE_MYSQL_HOST_M,SAE_MYSQL_USER,SAE_MYSQL_PASS,SAE_MYSQL_DB,SAE_MYSQL_PORT);
		if (!$con) {
			die('Could not connect: ' . mysql_error());
		} else {
			echo "success connet the mysql";
		}
		//mysql_select_db("web", $con);
		mysqli_query($con,"set names 'utf8'");
		
		$sql = "INSERT INTO comments (post_id,name,email,comment) VALUES ('".$_SESSION['post_id']."','".$_POST['name']."','".$_POST['email']."','".$_POST['comment']."')";
		mysqli_query($con,$sql) or die("数据库查询有误 " . mysql_error());
		mysqli_close($con);
		echo "<script language=JavaScript> parent.location.href='detail.php'; </script>";
		
		
?>
</body>
</html>