
<?php 
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
</style>

<body class="sub_page">

  



  <div class="container">
    <div class="login-form">
        <form action="" method="post">
            <h1>Đăng nhập tài khoản</h1>
            <div class="input-box">
                <i ></i>
                    <input type="text" placeholder="Nhập username" name="emailkh">
            </div>
            <div class="input-box">
                <i ></i>
                    <input type="password" placeholder="Nhập mật khẩu" name="pass">
            </div>
            <div class="btn-box">
                <button type="submit" name="dangnhap">
                    Đăng nhập
                </button>
            </div>
        </form>
    </div>
  </div>





<?php 

//Xử lý đăng nhập
if (isset($_POST['dangnhap'])) 
{  
    //Lấy dữ liệu nhập vào
    $username = addslashes($_POST['emailkh']);
    $password = addslashes($_POST['pass']);
     
    //Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
    if (!$username || !$password) {
        echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
     
    // mã hóa pasword
    $password = md5($password);
     
    //Kiểm tra tên đăng nhập có tồn tại không
    $query = $db->exeQuery("SELECT * FROM quantri WHERE username='$username'");
    if ($query == null) {
        echo "Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
     
    foreach($query as $kqs)
    {
    //So sánh 2 mật khẩu có trùng khớp hay không
    if ($password != $kqs['matkhau']) {
        echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
  }
     
    //Lưu tên đăng nhập
    $_SESSION['username'] = $username;
    echo "Xin chào " . $username . ". Bạn đã đăng nhập thành công. <a href='index.php?mo=loai'>Về trang chủ</a>";
    die();
  }


?>
 

</body>

</html>