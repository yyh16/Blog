<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>博客小站-write</title>
<link href="css/main.css" rel="stylesheet" type="text/css" />
<script src="http://libs.baidu.com/jquery/1.9.0/jquery.js"></script>
<script type="text/javascript" src="javascript/main.js"></script>
<?php /*?><link href="css/button.css" rel="stylesheet" type="text/css" /><?php */?>
</head>
<?php @session_start(); ?>
<body class="mainbg" ><?php
$loginlogout="登陆";
if(isset($_SESSION['id'])){
	$loginlogout="首页";}?>
 <!--悬浮条 -->
  <div  id="flow-left"  class="flow-left" >
    <div class="flowlogo">
      <p>博客小站</p>
    </div>
  </div>
  <!--悬浮条结束 --> 
<!--写博客的页面-->
<div class="write-body"> 


  <!--该部分为标题部分-->
  
  <div class="title" > 
    
    <!--头像-->
    <div class="logo"> </div>
    <!--头像结束--> 
      <div class="intro"> 
    <p>这就是我,<?php  echo $_SESSION['username']; ?>的日志</p>
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
  
  <!--这是撰写博客具体内容的部分，有标题和内容-->
  <div class="edit" id="fl_yushou">  
    <!--一个博客的标题-->
    <div class="edittitle">
 <input id="edit_title"  name="issutitle" type="text" value="在此输入标题"  style="width:1355px;height:50px ;font-size:24px" />
     </div>
    <!--一个博客的标题结束-->
    <!--一个博客的内容-->
    <div class="editneirong">
    
<div id='ss'></div>
<div id='sss'></div>
<script type="text/javascript" src="javascript/edit.js"></script>



     </div>
    <!--一个博客的内容结束--> 
  </div>
  <!--撰写内容结束--> 
  
  <!--这是提交的部分-->
  <div class="editinput"> 

    <!--提交按钮-->
       <div class="setit"><input id='set' value="重置" type="button"  /></div>
    <div class="getit"><input id='get' value="提交" type="button"  /></div>
   
    
      <!--清理用-->
  <div class="clear"></div>

    
    <!--按钮部分结束--> 
  </div>
  <!--提交的部分结束--> 
  
  <!--这是底部-->
  <div class="xiabian"> 
   
  </div>
  <!--底部结束--> 
     
</div>
        
</body>
</html>
