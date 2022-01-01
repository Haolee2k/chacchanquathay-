<?php
    session_start();
    include "config/config.php";
    function myautoload($classname)
    {
        include "classes/".$classname.".class.php";
    }
    spl_autoload_register("myautoload");
    $db=new Db();
   
    $dienthoaiDB=new Dienthoai();


   
if(isset($_GET['catdt']))
{ 
    //$tam=$db->exeQuery("select count(*) from sach where maloai=?",array($_GET['loai']),PDO::FETCH_NUM);
    $tongDT=$dienthoaiDB->tongSoDienthoai1Loai($_GET['loai']);
}else
{
    //$tam=$db->exeQuery("select count(*) from sach",array(),PDO::FETCH_NUM);
    $tongDT=$dienthoaiDB->tongSoDienthoai();
}
//$tongSach=$tam[0][0];
$page=isset($_GET['p'])?$_GET['p']:1;
$bd=($page-1)*DT_1_TRANG;

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
              <a href="giohang.php">
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


  

  <section class="feature_section layout_padding">
    <div class="container">
      <div class="row">
        
<?php
  $dienthoais=$db->exeQuery("select maloai,tenloai, hinhloai from loai limit 4");
  foreach($dienthoais as $dienthoai)
  {
?>
    <div class="col-sm-6 col-lg-3">
       <a href="loaidt.php?catdt=<?php echo $dienthoai['maloai']; ?>"> 
      <div class="box">
          <div class="img-box">
            <img src="images/<?php echo $dienthoai['hinhloai'];?>" alt="">
          </div>
          <div class="detail-box">
            <h5>
              <?php echo $dienthoai['tenloai']; ?>
            </h5>
            
          </div>
        </div>
        </a>
      </div>


<?php } ?>
     
      
      </div>
    </div>
  </section>
  




  <!-- shop section -->

  <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Sản phẩm
        </h2>
      </div>
      <div class="row">
        <?php  $dienthoais=$db->exeQuery("select madt,tendt,mota, luotxem,hinh,gia from dienthoai limit $bd,".DT_1_TRANG);

foreach($dienthoais as $dienthoai)            
{
    $giadt=$dienthoai['gia'];
    $fmgia=number_format($giadt);
?>

<div class="col-sm-6 col-xl-3">
    <div class="box">
        <a href="detaildt.php?dt=<?php echo $dienthoai['madt']; ?>">
        <div class="img-box">
            <img src="images/dienthoai/<?php echo $dienthoai['hinh'];?>" alt="">
        </div>
        <div class="detail-box">
            <h6>
                <?php echo $dienthoai['tendt']; ?>
            </h6>
        </div>
        <div class="detail-box">
            <h6>
                Giá:
                <span>
                <?php echo $fmgia; ?>đ
                </span>
            </h6>
        </div>
        <div class="new">
            <span>
                 Hot
            </span>
        </div>
        </a>
        <div class="btn-box">
        <form action="giohang.php" method="post">
            
        <input type="submit" name="btndathang" value="Đặt hàng">
        <input type="hidden" name="tendthoai" value="<?php echo $dienthoai['tendt'] ?>" />
        <input type="hidden" name="madthoai" value="<?php echo $dienthoai['madt'] ?>" />
        <input type="hidden" name="giadthoai" value="<?php echo $dienthoai['gia'] ?>" />
        <input type="hidden" name="hinhdthoai" value="<?php echo $dienthoai['hinh'] ?>" />
        <input type="hidden" name="soluongdt" value="1" />	
        </form>
    </div>
    </div>
</div>  

<?php } ?>
       
       
      
    </div>
    
    
  </section>
  <div style="clear:both"></div>
<div class="phantrang" style="text-align:center">
    <?php
    $sotrang=ceil($tongDT/DT_1_TRANG);
    if($sotrang>1)
    for($i=1;$i<=$sotrang;$i++)
        if($i==$page)
            echo " ",$i," ";
        else    
        if(isset($_GET['catdt']))
        echo '<a href="dienthoai.php?catdt='.$_GET['catdt'].'&p='.$i.'"> ',$i,' </a>';
        else
            echo '<a href="dienthoai.php?p='.$i.'"> ',$i,' </a>';
    ?>
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