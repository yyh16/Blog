<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php @session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>博客小站-index</title>
<script type="text/javascript" src="javascript/main.js"></script>

<script src="http://libs.baidu.com/jquery/1.9.0/jquery.js"></script>

<link href="css/main.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="assets/css/reset.css">
        <link rel="stylesheet" href="assets/css/supersized.css">
        <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>
<?php
$title[0]=$content[0]=$post_id[0]="";
$loginlogout="登陆";
if(isset($_SESSION['id'])){
	$loginlogout="注销";
	$con = mysqli_connect(SAE_MYSQL_HOST_M,SAE_MYSQL_USER,SAE_MYSQL_PASS,SAE_MYSQL_DB,SAE_MYSQL_PORT);
	if (!$con) {
		die('Could not connect: ' . mysql_error());
	} else {
		//echo "success connet the mysql";
	}
	
	mysqli_query($con,"set names 'utf8'");
	
	$sql="select * from posts where user_id='".$_SESSION['id']."';";
	$result=mysqli_query($con,$sql);
	mysqli_close($con);
	$i=0;
	while($row = mysqli_fetch_array($result))
	{
		$title[$i]=$row['title'];
		$content[$i]=$row['content'];
		$post_id[$i]=$row['id'];
		$i++;
	}
}

?>
<!--此页面显示登录后的主界面，显示最上部的标题，左边的博客列表和右边的摘要部分-->
<div class="index-body"> 
  <!--悬浮条 -->
  <div  id="flow-left"  class="flow-left" >
    <div class="flowlogo">
      <p>博客小站</p>
    </div>
  </div>
  <!--悬浮条结束 --> 
  <!--该部分为标题部分-->
  <div class="title" > 
    
    <!--头像-->
    <div class="logo"> </div>
    <!--头像结束--> 
    <!--个人简介-->
    <div class="intro">
      <p>这就是我，<?php  echo $_SESSION['username']; ?>的日志</p>
    </div>
    <!--个人简介结束-->
    <!--菜单-->
    <div class="menu">
    <div class="menuitem"><a href="write.php">写日志</a></div>
      
      <div class="menuitem"><a href="index.html"><?php echo $loginlogout ?></a></div>
      <div class="clear"></div>
    </div>
    <!--菜单结束--> 
    <!--清理用-->
    <div class="clear"></div>
  </div>
  <!--标题部分结束--> 
  <!--中间部分-->
  <div class="center" id="fl_yushou"> 
    <!--该部分为列出所有的博客列表部分-->
    <div class="bloglist"> 
      <!--具体的一个项目-->
      <div class="item"> 
        <!--此处为该部分一个模块的标题-->
        <div class="itemtitle">
          <p>最近发表</p>
        </div>
        <!--该部分的模块标题结束--> 
        <?php  
for($i=0;$i<count($title);$i++){
?>
        <!--此处为一个具体项目的标题-->
        <div class="itemneirong">
          <a href="detail.php?post_id=<?php echo $post_id[$i]; ?>"><p><?php echo $title[$i]; ?></p></a>
        </div>
<?php } ?>
        <!--一个项目标题结束--> 
      </div>
      <!--具体的一个项目的结束--> 
    </div>
    <!--该部分结束--> 
    <!--此处为每个博客的摘要界面-->
    <div class="zhaiyao"> 
<?php  
for($i=0;$i<count($title);$i++){
?>
      				<!--一个博客的摘要界面-->
				      <div class="onezhaiyao"> 
				        <!--一个博客的标题-->
				        <div class="zhaiyaotitle">
				          <a href="detail.php?post_id=<?php echo $post_id[$i]; ?>"><p><?php echo $title[$i]; ?></p></a>
				        </div>
				        <!--一个博客的标题结束--> 
				         <div class="zhaiyaoneirong">
				          <p><?php echo $content[$i]; ?></p>
				        </div>
				        <!--一个博客的内容摘要--><!--一个博客的内容摘要结束--> 
				      </div>
<?php } ?>
    </div>
    <!--摘要界面结束--> 
    <!--清理用-->
    <div class="clear"></div>
  </div>
  <!--中间部分结束--> 
  <!--这是底部-->
  <div class="xiabian"> </div>
  <!--底部结束--> 
  <!--清理用-->
  <div class="clear"></div>
</div>
        <script src="assets/js/jquery-1.8.2.min.js"></script>
        <script src="assets/js/supersized.3.2.7.min.js"></script>
        <script src="assets/js/supersized-init.js"></script>
        <script src="assets/js/scripts.js"></script>
</body>
</html>
