<?php  
         session_start();    
        // error_reporting(E_ERROR | E_PARSE);     
			$nameErr = $pwdErr = "";	
        $user = $_POST["username"];  
        $psw = $_POST["password"];  
        if($user == "" || $psw == "")  
        {  
            echo "<script>alert('请输入用户名或密码！'); history.go(-1);</script>";  
        }  
        else  
        {  
            $con = mysqli_connect(SAE_MYSQL_HOST_M,SAE_MYSQL_USER,SAE_MYSQL_PASS,SAE_MYSQL_DB,SAE_MYSQL_PORT);
            mysqli_query($con,"set names 'utf8'");
			$sql="select * from user where username='$_POST[username]' and pwd='$_POST[password]';";               
            $result = mysqli_query($con,$sql);  
            $num = mysqli_num_rows($result); 
			mysqli_close($con); 
            if($num)  
            {  
                $row = mysqli_fetch_array($result);  //将数据以索引方式储存在数组中  
                $_SESSION['id']=$row['id'];
			    $_SESSION['username']=$row['username'];
			   echo "<script language=JavaScript> alert('sucess');parent.location.href='index.php'; </script>";
			  /* //echo "<script>url="index.php";window.location.href=url;</script>";
			    
			  //echo "<script language=JavaScript> self.location(index.php);</script>"; */
			
            }  
            else  
            {  
                echo "<script language=JavaScript> alert('用户名或密码不正确！');history.go(-1);</script>";  
            }  
        }  
?>  