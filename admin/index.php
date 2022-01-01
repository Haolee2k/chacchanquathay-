<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>H&N Admin</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<style media="all" type="text/css">
@import "css/all.css";
</style>
<link rel="stylesheet" href="css/bootstrap.min.css" />
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/popper.min.js"></script>
</head>
<body>
<?php
include_once("../config/config.php");
include_once("../classes/Db.class.php");
?>
<div id="main">
<div id="header"> 
    <a href="#" class="logo"><img src="img/logo.gif" width="101" height="29" alt="" /></a>
    <ul id="top-navigation">
      <li><span><span><a href="index.php?mo=loai">Quản lý loại</a></span></span></li>
      <li><span><span><a href="index.php?mo=dt">Quản lý điện thoại </a></span></span></li>
      <li><span><span><a href="#">Quản lý đơn hàng</a></span></span></li>
      
      
    </ul>
  </div>
 
     
      
     
      <?php 
	  
	  if(isset($_REQUEST['mo']))
	  	$mo=$_REQUEST['mo'];
      else
        $mo="loai";
		switch($mo){
			case "loai":
				include "loai.php";
				break;
      case "dt":
        include "dienthoai.php";
        break;
					
		};
	  
	  ?>
 
    </div>
    
    </div>
  </div>
  <div id="footer"></div>
</div>



<div class="modal" id="myModal">
<form action="xllogin.php" method="post">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">FORM LOGIN</h4>
          
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          Email: <input type="text" name="txtEmail" /><br />
          Pass <input type="password" name="txtPass" />
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <input type="submit" value="Login">
        </div>
        
      </div>
    </div>
    </form>
  </div>
</body>
</html>


 