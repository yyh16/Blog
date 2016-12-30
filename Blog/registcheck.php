<?php  
        
			
        $user = $_POST["username"];  
        $psw1 = $_POST["pwd1"]; 
		$psw2 = $_POST["pwd2"];
		$em=$_POST["email"]; 
		
           
            $con = mysqli_connect(SAE_MYSQL_HOST_M,SAE_MYSQL_USER,SAE_MYSQL_PASS,SAE_MYSQL_DB,SAE_MYSQL_PORT);
			
			if (!$con) {
			die('Could not connect: ' . mysql_error());} 
			else {
			echo "success connet the mysql";
	
            mysqli_query($con,"set names 'utf8'");
			$sql = "INSERT INTO user (username,pwd,email) VALUES ('" . $user . "', '" . $psw1 . "','".$em."')";             
            mysqli_query($con,$sql) or die("数据库查询有误 " . mysql_error());
		    mysqli_close($con);
			echo "<script language=JavaScript> alert('注册成功');history.go(-1);</script>";
           
			}
  
?>  