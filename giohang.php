<?php
session_start();
  include "config/config.php";
  function myautoload($classname)
  {
      include "classes/".$classname.".class.php";
  }
  spl_autoload_register("myautoload");
  $db=new Db();

 if(isset($_POST['btndathang'])){
 	$tensanpham = $_POST['tendthoai'];
 	$sanpham_id = $_POST['madthoai'];
 	$hinhanh = $_POST['hinhdthoai'];
 	$gia = $_POST['giadthoai'];
 	$soluong = $_POST['soluongdt'];	
 	$sql_select_giohang =$db->exeQuery("SELECT * FROM giohang WHERE madt='$sanpham_id'");
 	$count = $db->getRowCount($sql_select_giohang);
 	if($count != null){
 		
 		$soluong = $count['soluong'] + 1;
 		$sql_giohang = "UPDATE giohang SET soluong='$soluong' WHERE madt='$sanpham_id'";
 	}else{
 		$soluong = $soluong;
 		$sql_giohang = "INSERT INTO giohang(madt,tendienthoai,giadienthoai,soluong,hinhdienthoai) values ('$sanpham_id','$tensanpham','$gia','$soluong','$hinhanh')";

 	}
  $db->exeQuery($sql_giohang);
 }elseif(isset($_POST['capnhatsoluong'])){
 	
 	for($i=0;$i<count($_POST['madthoai']);$i++){
 		$sanpham_id = $_POST['madthoai'][$i];
 		$soluong = $_POST['soluong'][$i];
 		if($soluong==0){
 			$sql_delete = $db->exeQuery("DELETE FROM giohang WHERE madt='$sanpham_id'");
 		}else{
 			$sql_update =$db->exeQuery("UPDATE giohang SET soluong='$soluong' WHERE madt='$sanpham_id'");
 		}
 	}

 }elseif(isset($_GET['xoa'])){
 	$id = $_GET['xoa'];
 	$sql_delete = $db->exeQuery("DELETE FROM giohang WHERE idgiohang='$id'");

 }elseif(isset($_GET['dangxuat'])){
 	$id = $_GET['dangxuat'];
 	if($id==1){
 		unset($_SESSION['dangnhap_home']);
 	}

 
 }elseif(isset($_POST['thanhtoan'])){
 	$name = $_POST['name'];
 	$phone = $_POST['phone'];
 	$email = $_POST['email'];
 	$password = md5($_POST['password']);
 	$note = $_POST['note'];
 	$address = $_POST['address'];
 	$giaohang = $_POST['giaohang'];
 
 	$sql_khachhang = mysqli_query($con,"INSERT INTO tbl_khachhang(name,phone,email,address,note,giaohang,password) values ('$name','$phone','$email','$address','$note','$giaohang','$password')");
 	if($sql_khachhang){
 		$sql_select_khachhang = mysqli_query($con,"SELECT * FROM tbl_khachhang ORDER BY khachhang_id DESC LIMIT 1");
 		$mahang = rand(0,9999);
 		$row_khachhang = mysqli_fetch_array($sql_select_khachhang);
 		$khachhang_id = $row_khachhang['khachhang_id'];
 		$_SESSION['dangnhap_home'] = $row_khachhang['name'];
 		$_SESSION['khachhang_id'] = $khachhang_id;
 		for($i=0;$i<count($_POST['thanhtoan_product_id']);$i++){
	 		$sanpham_id = $_POST['thanhtoan_product_id'][$i];
	 		$soluong = $_POST['thanhtoan_soluong'][$i];
	 		$sql_donhang = mysqli_query($con,"INSERT INTO tbl_donhang(sanpham_id,khachhang_id,soluong,mahang) values ('$sanpham_id','$khachhang_id','$soluong','$mahang')");
	 		$sql_giaodich = mysqli_query($con,"INSERT INTO tbl_giaodich(sanpham_id,soluong,magiaodich,khachhang_id) values ('$sanpham_id','$soluong','$mahang','$khachhang_id')");
	 		$sql_delete_thanhtoan = mysqli_query($con,"DELETE FROM tbl_giohang WHERE sanpham_id='$sanpham_id'");
 		}

 	}
 }elseif(isset($_POST['thanhtoandangnhap'])){

 	$khachhang_id = $_SESSION['khachhang_id'];
 	$mahang = rand(0,9999);	
 	for($i=0;$i<count($_POST['thanhtoan_product_id']);$i++){
	 		$sanpham_id = $_POST['thanhtoan_product_id'][$i];
	 		$soluong = $_POST['thanhtoan_soluong'][$i];
	 		$sql_donhang = mysqli_query($con,"INSERT INTO tbl_donhang(sanpham_id,khachhang_id,soluong,mahang) values ('$sanpham_id','$khachhang_id','$soluong','$mahang')");
	 		$sql_giaodich = mysqli_query($con,"INSERT INTO tbl_giaodich(sanpham_id,soluong,magiaodich,khachhang_id) values ('$sanpham_id','$soluong','$mahang','$khachhang_id')");
	 		$sql_delete_thanhtoan = mysqli_query($con,"DELETE FROM tbl_giohang WHERE sanpham_id='$sanpham_id'");
 		}

 	
 }
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/crowns.png" type="image/x-icon">

  <title>Điện thoại</title>


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>
<style>
  img {
    width:200px;
    height: 200px;
  }
  .actions {
    text-align:center;
  }
  .namedt{
   
    font-weight: bold;
   
  }
  .giadt{
    font-weight: bold;
  }
  .giadthoai{
    font-weight: bold;
    text-align:center;
  }
  .dnkh{
    text-align: right;
  }
</style>

<body class="sub_page">

  <div class="hero_area">

    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.php">
            <span>
              H&N
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Trang chủ </a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="dienthoai.php"> Điện thoại <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.html"> Về chúng tôi </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.html">Liên hệ</a>
              </li>
            </ul>
            <div class="user_option-box">
              <form action="search.php" method="post" name="search">
                  <input type="text" name="searchtitle" placeholder="Tìm kiếm..." required>
                  <a href="search.php">
                  <i class="fa fa-search" aria-hidden="true"></i>
                  </a>
              </form>
              <a href="dangnhap.php">
                <i class="fa fa-user" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-cart-plus" aria-hidden="true"></i>
              </a>
              
            </div>
          </div>
        </nav>
      </div>
      <div class="dnkh">
      <?php 
       if (isset($_SESSION['email']) && $_SESSION['email']){
           echo 'Xin chào: '.$_SESSION['email'].'</br>';
           echo '<a href="logout.php">Logout</a>';
       }
       else{
           echo 'Bạn chưa đăng nhập';
       }
       ?>
      </div>
    </header>
    <!-- end header section -->
  </div>

  <!-- shop section -->

  
<div class="container"> 
  <form action="" method="POST">
 <table id="cart" class="table table-hover table-condensed"> 
  <thead> 
   <tr> 
    <th style="width:40">Sản phẩm</th>
    <th style="width:10%">Giá</th> 
    <th style="width:10%">Số lượng</th> 
    <th style="width:20%" class="text-center">Thành tiền</th> 
    <th style="width:20%"> </th> 
   </tr> 
  </thead> 
 
  <tbody><tr>
  <?php 
 $dienthoais=$db->exeQuery("select idgiohang,madt,tendienthoai,giadienthoai,hinhdienthoai,soluong from giohang");
 $i=0;
 $total=0;
foreach($dienthoais as $dienthoai)
{
    $giadt=$dienthoai['giadienthoai'];
    $fmgia=number_format($giadt);



    $tong=$dienthoai['giadienthoai'] * $dienthoai['soluong'];
    $tongn=number_format($tong);

    
    $total+=$tong;
    $i++;

    

?>
 
    <td data-th="Product"> 
    
       <div class="rows">
         <div>
             <img src="images/dienthoai/<?php echo $dienthoai['hinhdienthoai'] ?>" alt="">
             <div class="namedt"><?php echo $dienthoai['tendienthoai'] ?></div>
         </div> 
         <div class="col-sm-10"> 
           <h4 class="nomargin"></h4> 
         </div> 
       </div> 
   </td> 
   <td data-th="Price"><div class ="giadt"><?php echo $fmgia; ?>đ</div></td>
   <td data-th="Quantity">
      <input class="form-control text-center" value="<?php echo $dienthoai['soluong'] ?>" type="number" min="0" max="100" name="soluong[]">
      <input type="hidden" name="madthoai[]" value="<?php echo $dienthoai['madt'] ?>">
   </td> 
  
   <td data-th="Subtotal" class="giadthoai"><?php echo $tongn;?>đ</td> 
   <td class="actions" data-th="">
    <a href="giohang.php?xoa=<?php echo $dienthoai['idgiohang']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
   </td> 
  </tr> 
  <?php } ?>
  
    <td>
      <a href="dienthoai.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng</a>
      <a href="giohang.php"><input type="submit" class="btn btn-success" value="Cập nhật giỏ" name="capnhatsoluong"></a>
    </td> 
    
    <td colspan="2" class="hidden-xs"> </td>
    <td class="hidden-xs text-center">
      <strong>Tổng tiền: <?php echo number_format($total); ?></strong>
    </td> 
    <td><a href="" class="btn btn-danger btn-block">Thanh toán</a></td>
   </tr> 
  
  </tfoot> 
  

 </table>
 </form>
</div>

  <!-- end shop section -->

  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-3 footer-col">
          <div class="footer_detail">
            <h4>
              About
            </h4>
            <p>
              Necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with
            </p>
            <div class="footer_social">
              <a href="">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-twitter" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-linkedin" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-instagram" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 footer-col">
          <div class="footer_contact">
            <h4>
              Reach at..
            </h4>
            <div class="contact_link_box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                  Location
                </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Call +01 1234567890
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  demo@gmail.com
                </span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 footer-col">
          <div class="footer_contact">
            <h4>
              Subscribe
            </h4>
            <form action="#">
              <input type="text" placeholder="Enter email" />
              <button type="submit">
                Subscribe
              </button>
            </form>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 footer-col">
          <div class="map_container">
            <div class="map">
              <div id="googleMap"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-info">
        <p>
          &copy; <span id="displayYear"></span> All Rights Reserved By
          <a href="https://html.design/">Free Html Templates</a>
        </p>
      </div>
    </div>
  </footer>
  <!-- footer section -->

  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- custom js -->
  <script src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
  <!-- End Google Map -->

</body>

</html>