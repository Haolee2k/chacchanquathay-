<?php 
    include "config/config.php";
    function myautoload($classname)
    {
        include "classes/".$classname.".class.php";
    }
    spl_autoload_register("myautoload");
    $db=new Db();
   
    $dienthoaiDB=new Dienthoai();
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

  <title>Đăng nhập</title>


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



  <div class="container">
    <div class="login-form">
                <form action="dangki.php" method="post">
                    <h1>Đăng kí tài khoản</h1>
                    <div class="input-box">
                        <a >Nhập email</a>
                        <input type="email" name="email" placeholder="Nhập username..." >
                    </div>
                    <div class="input-box">
                        <a >Nhập mật khẩu</a>
                        <input type="text" name="matkhau" placeholder="Nhập mật khẩu..." >
                    </div>
                    <div class="input-box">
                        <a >Nhập lại mật khẩu</a>
                        <input type="text" name="remk" placeholder="Nhập lại mật khẩu...">
                    </div>
                    <div class="input-box">
                        <a >Nhập tên</a>
                        <input type="text" name="tenkh" placeholder="Nhập tên..." >
                    </div>
                    <div class="input-box">
                        <a >Nhập số điện thoại</a>
                        <input type="text" name="sdtkh" placeholder="Nhập sđt..." >
                    </div>
                    <div class="input-box">
                        <a >Nhập địa chỉ</a>
                        <input type="text" name="diachikh" placeholder="Nhập địa chỉ..." >
                    </div>
                    
                    <div class="btn-box">
                        <button type="submit" name="dangki">
                            Đăng kí
                        </button>
                        <a href="dangnhap.php">Đăng Nhập</a>
                       
                    </div>
                   
                </form>
    </div>
  </div>

<?php 
    if (!isset($_POST['dangki'])){
      die('');
    }
   
  
        
  //Khai báo utf-8 để hiển thị được tiếng việt
 
        
  //Lấy dữ liệu từ file dangky.php
  $username   = addslashes($_POST['email']);
  $password   = addslashes($_POST['matkhau']);
  $repass   = addslashes($_POST['remk']);
  $ten   = addslashes($_POST['tenkh']);
  $SDT   = addslashes($_POST['sdtkh']);
  $dc   = addslashes($_POST['diachikh']);
  
  //Kiểm tra người dùng đã nhập liệu đầy đủ chưa
  if (!$username || !$password || !$repass || !$ten || !$SDT || !$dc)
  {
      echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
      exit;
  }
        
      // Mã khóa mật khẩu
     $password = md5($password);
     $repass=md5($repass);
  
        
  //Kiểm tra email có đúng định dạng hay không
  if (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+\.[A-Za-z]{2,6}$/", $username))
  {
      echo "Email này không hợp lệ. Vui long nhập email khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
      exit;
  }
        
  //Kiểm tra email đã có người dùng chưa
  $kq1=$db->exeQuery("select * from khachhang where email= '$username' ");
  if ($kq1 != null)
  {
      echo "Email này đã có người dùng. Vui lòng chọn Email khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
      exit;
  }

  if ($repass != $password)
 {
         echo "Mật khẩu nhập lại không đúng. Vui long nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
         exit;
     }
  $string_1="kh";
  $string_2=substr($username,3,6);
  $string=$string_1.$string_2;
 
  //Lưu thông tin thành viên vào bảng
  try{
     $pdh = new PDO("mysql:host=localhost; dbname=cuahang"  , "root"  , ""  );
     $pdh->query("  set names 'utf8'"  );
     }
     catch(Exception $e){
             echo $e->getMessage(); exit;
     }
  $sql="insert into khachhang(email, makh,  matkhau, tenkh,diachi,dienthoai) values(:email,:makh, :matkhau, :tenkh,:diachi,:dienthoai) ";
         $arr = array(":email"=>$username,":makh"=>$string,":matkhau"=>$password,":tenkh"=>$ten,":diachi"=>$dc,":dienthoai"=>$SDT);
         $stm= $pdh->prepare($sql);
         $stm->execute($arr);
         $n = $stm->rowCount();
         $message = "Thêm thành công";
                 $error = "Lỗi thêm";
                 if ($n>0) echo "<script type='text/javascript'>alert('$message');</script>";
                 else echo  "<script type='text/javascript'>alert('$error');</script>";

?>
 

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