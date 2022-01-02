



<?php 
   session_start();
   include "config/config.php";
   function myautoload($classname)
   {
       include "classes/".$classname.".class.php";
   }
   spl_autoload_register("myautoload");
   $db=new Db();
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

  <title>Xem đơn hàng</title>


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
  .container{
    width: 100%;
    max-width: 1200px;
    margin-left: auto;
    margin-right: auto;

}
.login-form{
    width: 100%;
    max-width: 400px;
    margin: 20px auto;
    background-color: #ffffff;
    padding: 15px;
    border: 2px dotted #cccccc;
    border-radius: 10px;
}
h1{
    color: #009999;
    font-size: 20px;
    margin-bottom: 30px;
}
.input-box{
    margin-bottom: 10px;
}
.input-box input{
    padding: 7.5px 15px;
    width: 100%;
    border: 1px solid #cccccc;
    outline: none;
}
.btn-box{
    text-align: right;
    margin-top: 30px;
}
.btn-box button{
    padding: 7.5px 15px;
    border-radius: 2px;
    background-color: #009999;
    color: #ffffff;
    border: none;
    outline: none;
}
.khachhang{
    text-align:right;
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
              <?php 
                if(isset($_SESSION['email'])){ 
              ?>
              <li class="nav-item">
                <a class="nav-link" href="xemdonhang.php">Xem đơn hàng</a>
              </li>
              <?php } ?>
            </ul>
            <div class="user_option-box">
              <form action="search.php" method="post" name="search">
                  <input type="text" name="searchtitle" placeholder="Tìm kiếm..." >
                  <a href="search.php">
                  <i class="fa fa-search" aria-hidden="true"></i>
                  </a>
              </form>
              <a href="">
                <i class="fa fa-user" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-cart-plus" aria-hidden="true"></i>
              </a>
              
            </div>
          </div>
        </nav>
      </div>
      
    </header>
    <!-- end header section -->
  </div>

<?php 
    if (isset($_SESSION['email']) && $_SESSION['email']){
    $emailkh = $_SESSION['email'];
    }
    $donhang=$db->exeQuery("Select * from donhang inner join chitietdonhang on chitietdonhang.maDon=donhang.maDon	inner JOIN dienthoai on chitietdonhang.madt=dienthoai.madt where donhang.email='$emailkh' ");
    foreach($donhang as $dh)
    {
?>

  <div class="container">
    <div class="login-form">
                <form action="dangki.php" method="post">
                    <h1>Đơn hàng của bạn</h1>
                    <div class="input-box">
                        <a >Mã đơn: <?php echo $dh['maDon'];?></a>
                       
                    </div>
                    <div class="input-box">
                        <a >Tên người nhận: <?php echo $dh['tenngnhan'];?></a>
                       
                    </div>
                    <div class="input-box">
                        <a >Số điện thoại: <?php echo $dh['dtnguoinhan'];?></a>
                     
                    </div>
                    <div class="input-box">
                        <a >Tên sản phẩm: <?php echo $dh['tendt'];?></a>
                    
                    </div>
                    <div class="input-box">
                        <a >Số lượng: <?php echo $dh['soluong'];?></a>
                        
                    </div>
                    <div class="input-box">
                        <a >Tổng tiền: <?php echo number_format($dh['tongtien']);?>đ</a>
                  
                    </div>
                    
                   
                   
                </form>
    </div>
    <?php } ?>
  </div>

    


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