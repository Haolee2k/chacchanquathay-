<?php session_start();?>
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

  <title>H&N</title>

  <?php 
    include "config/config.php";
    function myautoload($classname)
    {
        include "classes/".$classname.".class.php";
    }
    spl_autoload_register("myautoload");
    $db=new Db();
   
    $dienthoaiDB=new Dienthoai();
    $dienthoais=$dienthoaiDB->tenloai();

?>

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
    text-align:right;
  }
</style>

<body>

  <div class="hero_area">
    <div class="hero_social">
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
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Trang ch??? <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="dienthoai.php"> ??i???n tho???i </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.html"> V??? ch??ng t??i </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.html">Li??n h???</a>
              </li>
              <?php 
                if(isset($_SESSION['email'])){ 
              ?>
              <li class="nav-item">
                <a class="nav-link" href="xemdonhang.php">Xem ????n h??ng</a>
              </li>
              <?php } ?>
            </ul>
            <div class="user_option-box">
              <input  type="text" name="searchtitle" placeholder="T??m ki???m..." required>
              <a href="">
                <i class="fa fa-search" aria-hidden="true"></i>
              </a>
              <a href="dangnhap.php">
                <i class="fa fa-user" aria-hidden="true">
                
                </i>
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
           echo 'Xin ch??o: '.$_SESSION['email'].'</br>';
           echo '<a href="logout.php">Logout</a>';
       }
       else{
           echo 'B???n ch??a ????ng nh???p';
       }
       ?>
      </div>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    <section class="slider_section ">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container-fluid ">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                    <h1>
                      Apple
                    </h1>
                    <p>
                      H??y suy ngh?? kh??c bi???t
                    </p>
                    <div class="btn-box">
                      <a href="loaidt.php?catdt=ip" class="btn1">
                        Xem s???n ph???m
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="images/slide/slideip.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item ">
            <div class="container-fluid ">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                    <h1>
                      Samsung
                    </h1>
                    <p>
                      H??y t?????ng t?????ng nh???ng ??i???u tuy???t v???i m?? ch??ng ta c?? th??? th???c hi???n
                    </p>
                    <div class="btn-box">
                      <a href="loaidt.php?catdt=ss" class="btn1">
                        Xem s???n ph???m
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="images/slide/slidess.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item ">
            <div class="container-fluid ">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                    <h1>
                      Oppo
                    </h1>
                    <p>
                      M???u m?? sang tr???ng t???o n??n ?????ng c???p ng?????i d??ng
                    </p>
                    <div class="btn-box">
                      <a href="loaidt.php?catdt=op" class="btn1">
                        Xem s???n ph???m
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="images/slide/slideoppo.jpg" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <ol class="carousel-indicators">
          <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
          <li data-target="#customCarousel1" data-slide-to="1"></li>
          <li data-target="#customCarousel1" data-slide-to="2"></li>
        </ol>
      </div>

    </section>
    <!-- end slider section -->
  </div>

  <!-- shop section -->
  
  <section class="shop_section layout_padding">
    <div class="container">
      
      <div class="heading_container heading_center">
        <h2>
          S???n ph???m n???i b???c
          <img src="images/hott.png" alt="">
        </h2>
      </div>
      <div class="row">
        <?php 
 $dienthoais=$db->exeQuery("select madt,tendt,mota, luotxem,hinh,gia from dienthoai ORDER BY luotxem DESC limit 4");

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
            Gi??:
            <span>
            <?php echo $fmgia; ?>??
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
            
        <input type="submit" name="btndathang" value="?????t h??ng">
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
    <div class="btn-box">
      <a href="dienthoai.php">Xem th??m</a>
    </div>
    
  </section>
 

  <!-- end shop section -->

  <!-- about section -->


  <?php

$dienthoais=$db->exeQuery("select madt,tendt,mota, gia,hinh from dienthoai ORDER BY gia DESC limit 1");

foreach($dienthoais as $dienthoai)
{
?>




  <section class="about_section layout_padding">
    <div class="container  ">
      <div class="row">
        <div class="col-md-6 col-lg-5 ">
          <div class="img-box">
          <img src="images/dienthoai/<?php echo $dienthoai['hinh'];?>" alt="">
          </div>
        </div>
        <div class="col-md-6 col-lg-7">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                <?php echo $dienthoai['tendt'] ?>
              </h2>
            </div>
            <p>
            <?php echo $dienthoai['mota'] ?>
            </p>
            <a href="detaildt.php?dt=<?php echo $dienthoai['madt']; ?>">
              Xem chi ti???t
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php } ?>

  <!-- end about section -->

  <!-- feature section -->

  

  <!-- end feature section -->

  <!-- contact section -->

  <section class="contact_section">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="form_container">
            <div class="heading_container">
              <h2>
                Contact Us
              </h2>
            </div>
            <form action="">
              <div>
                <input type="text" placeholder="Full Name " />
              </div>
              <div>
                <input type="email" placeholder="Email" />
              </div>
              <div>
                <input type="text" placeholder="Phone number" />
              </div>
              <div>
                <input type="text" class="message-box" placeholder="Message" />
              </div>
              <div class="d-flex ">
                <button>
                  SEND
                </button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6">
          <div class="img-box">
            <img src="images/contact-img.jpg" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end contact section -->

  <!-- client section -->
  <section class="client_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Testimonial
        </h2>
      </div>
      <div class="carousel-wrap ">
        <div class="owl-carousel client_owl-carousel">
          <div class="item">
            <div class="box">
              <div class="img-box">
                <img src="images/c1.jpg" alt="">
              </div>
              <div class="detail-box">
                <div class="client_info">
                  <div class="client_name">
                    <h5>
                      Mark Thomas
                    </h5>
                    <h6>
                      Customer
                    </h6>
                  </div>
                  <i class="fa fa-quote-left" aria-hidden="true"></i>
                </div>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                  labore
                  et
                  dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                  aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                  cillum
                  dolore eu fugia
                </p>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box">
              <div class="img-box">
                <img src="images/c2.jpg" alt="">
              </div>
              <div class="detail-box">
                <div class="client_info">
                  <div class="client_name">
                    <h5>
                      Alina Hans
                    </h5>
                    <h6>
                      Customer
                    </h6>
                  </div>
                  <i class="fa fa-quote-left" aria-hidden="true"></i>
                </div>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                  labore
                  et
                  dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                  aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                  cillum
                  dolore eu fugia
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end client section -->

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
              Mang l???i nh???ng tr???i nghi???m t???t nh???t cho ng?????i d??ng
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
              T??m ?????n...
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
          &copy; <span id="displayYear"></span> ????? ??n chuy??n ng??nh ???????c th???c hi???n b???i
          <a href="https://html.design/">L?? Anh H??o x Ph???m Ho??ng Nam</a>
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