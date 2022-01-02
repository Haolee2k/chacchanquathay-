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

 
 
 }elseif(isset($_POST['thanhtoandangnhap'])){
  $madonhang = rand(0,9999);	
 	$emailkhachhang = $_SESSION['email'];
  $tenngnhan= $_POST['name'];
  $diachingnhan = $_POST['address'];
  $dtngnhan= $_POST['phone'];
  $sql_lay_giohang = $db->exeQuery("SELECT * FROM giohang ORDER BY idgiohang DESC");
	$i = 0;
	$total = 0;
	foreach($sql_lay_giohang as $row_fetch_giohang){ 

		$subtotal = $row_fetch_giohang['soluong'] * $row_fetch_giohang['giadienthoai'];
		$total+=$subtotal;
		$i++;}
  $tongtien= $total;
 	for($i=0;$i<count($_POST['madthoai']);$i++){
	 		$sanpham_id = $_POST['madthoai'][$i];
	 		$soluong = $_POST['soluong'][$i];
	 		$sql_donhang = $db->exeQuery("INSERT INTO donhang(maDon,email,tenngnhan,diachinhan,dtnguoinhan,tongtien) values ('$madonhang','$emailkhachhang','$tenngnhan','$diachingnhan','$dtngnhan','$tongtien')");
	 		$sql_chitietdonhang = $db->exeQuery("INSERT INTO chitietdonhang(maDon,madt,soluong) values ('$madonhang','$sanpham_id','$soluong')");
	 		$sql_delete_giohang = $db->exeQuery("DELETE FROM giohang WHERE madt='$sanpham_id'");
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
           echo 'Bạn cần đăng nhập để thanh toán';
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
  
   </tr> 
  
  </tfoot>
 </table>

 </form>
</div>
<form action="" method='POST'>
  <table>
  <?php
			if(isset($_SESSION['email'])){ 
?>
 <div class="first-row">
		<div class="controls form-group">
			<input class="billing-address-name form-control" type="text" name="name" placeholder="Điền tên người nhận..." required="">
		</div>
		<div class="w3_agileits_card_number_grids">
				<div class="w3_agileits_card_number_grid_left form-group">
						<div class="controls">
							<input type="text" class="form-control" placeholder="Số điện thoại người nhận..." name="phone" required="">
						</div>
				</div>
				<div class="w3_agileits_card_number_grid_right form-group">
						<div class="controls">
								<input type="text" class="form-control" placeholder="Địa chỉ người nhận..." name="address" required="">
						</div>
				</div>
		</div>	
    <?php
      $sql=$db->exeQuery("select * from giohang");
      foreach($sql as $dh){
    ?>
    <input class="form-control text-center" value="<?php echo $dienthoai['soluong'] ?>" type="hidden" min="0" max="100" name="soluong[]">
    <input type="hidden" name="madthoai[]" value="<?php echo $dienthoai['madt'] ?>">				
		<?php } ?>
    <div class="controls form-group">
				<textarea style="resize: none;" class="form-control" placeholder="Ghi chú..." name="note" required=""></textarea>  
		</div>
    <input type="submit" name="thanhtoandangnhap" class="btn btn-danger" style="width: 20%" value="Thanh toán">
								
	</div>
<?php } ?>
  </table>
</form>



  <!-- end shop section -->

  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-3 footer-col">
          <div class="footer_detail">
            <h4>
              H&N
            </h4>
            <p>
              Mang lại những trải nghiệm tốt nhất cho người dùng
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
              Tìm đến...
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
                  Call +0898445228
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  lahao11062000@gmail.com
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
          &copy; <span id="displayYear"></span> Đồ án chuyên ngành được thực hiện bởi
          <a href="https://html.design/">Lê Anh Hào x Phạm Hoàng Nam</a>
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