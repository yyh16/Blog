<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php @session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>博客小站-detail</title>
<link href="css/main.css" rel="stylesheet" type="text/css" />
<script src="http://libs.baidu.com/jquery/1.9.0/jquery.js"></script>
<script type="text/javascript" src="javascript/main.js"></script>


</head>

<body class="mainbg">
<!--该页面为点击某个博客进行查看的详情页-->
<div class="detail-body"> 
<?php
$loginlogout = "登陆";
if (isset ($_SESSION['id'])) {
	$loginlogout = "首页";
}
if (isset ($_GET['post_id'])) {
	$_SESSION['post_id'] = $_GET['post_id'];
}

$title = $content = "";
$con = mysqli_connect(SAE_MYSQL_HOST_M,SAE_MYSQL_USER,SAE_MYSQL_PASS,SAE_MYSQL_DB,SAE_MYSQL_PORT);
if (!$con) {
	die('Could not connect: ' . mysql_error());
} else {
	//echo "success connet the mysql";
}
//mysql_select_db("web", $con);
mysqli_query($con,"set names 'utf8'");

$sql = "select * from posts where id='" . $_SESSION['post_id'] . "';";
$result = mysqli_query($con,$sql);
mysqli_close($con);

while ($row = mysqli_fetch_array($result)) {
	$title = $row['title'];
	$content = $row['content'];
}
?>
  <!--该部分为标题部分-->
  <!--悬浮条 -->
  <div  id="flow-left"  class="flow-left" >
    <div class="flowlogo">
      <p>博客小站</p>
    </div>
  </div>
  <!--悬浮条结束 --> 
  <div class="title" > 
    
    <!--头像-->
    <div class="logo"> </div>
    <!--头像结束--> 
      <div class="intro"> 
    <p>这就是我，<?php  echo $_SESSION['username']; ?>的日志</p>
    </div>
    <!--个人简介结束-
    <!--菜单-->
    <div class="menu">
    <div class="menuitem"><a href="write.php">写日志</a></div>
      
      <div class="menuitem"><a href="index.php"><?php echo $loginlogout ?></a></div>
      <div class="clear"></div>
    </div>
    <!--菜单结束--> 
       <!--清理用--> 
  <div class="clear"></div>
  </div>
  <!--标题部分结束--> 
  
  <!--这是显示一篇博客具体内容的部分，有标题和内容-->
  <div class="detail" id="fl_yushou">  
    <!--一个博客的标题-->
    <div class="detailtitle">
     <p><?php echo $title ?></p>
     </div>
    <!--一个博客的标题结束--><!--一个博客的内容摘要-->
    <div class="detailneirong">
    
    <p><?php echo $content ?></p>
     </div>
    <!--一个博客的内容结束--> 
  </div>
  <!--具体内容结束--> 
  
  <!--这是发布评论的部分-->
  <div class="talk"> 
  <!--评论列表 -->
  <div class="talktitle"> 
  <p>评论列表</p>
  </div>
  <div class="talklist">
  <?php

$con = mysqli_connect(SAE_MYSQL_HOST_M,SAE_MYSQL_USER,SAE_MYSQL_PASS,SAE_MYSQL_DB,SAE_MYSQL_PORT);
if (!$con) {
	die('Could not connect: ' . mysql_error());
} else {
	//echo "success connet the mysql";
}
//mysql_select_db("web", $con);
mysqli_query($con,"set names 'utf8'");

$sql = "select * from comments where post_id='" . $_SESSION['post_id'] . "';";
$result = mysqli_query($con,$sql);
mysqli_close($con);

while ($row = mysqli_fetch_array($result)) {
	echo "<p>";

	echo $row['name'] . "说：" . $row['comment'];
	echo "</p>";
}
?>
  </div>
  <!--评论列表结束 -->
  <div class="talktitle"> 
  <p>说点什么吧……</p>
  </div>
  <!--评论编辑 -->
  <div class="talkedit">



<form method="post" action="commenthandler.php">
姓名：<input type="text" name="name">*
<br><br>
 电邮：<input type="text" name="email">*
<br><br>
评论：<textarea name="comment" rows="5" cols="80"></textarea>
<br><br>
<div style=" margin: 5px auto">  <input type="submit" name="submit" value="提交"></div>
</form>
</div>



<!--评论编辑结束 -->
</div>
<!--评论的部分结束--> 
</div>
<!--这是底部-->
<div class="xiabian"> 
   
  
  <!--底部结束--> 
     
</div>
        
</body>
</html>
