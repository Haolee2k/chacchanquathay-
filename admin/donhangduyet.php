<!--Loai -->

<?php
include_once("../classes/Donhang.class.php");
$dhDB=new Donhang;
$dsdonhangdd=$dhDB->tatCa2();
if(isset($_REQUEST['ac']) && $_REQUEST['ac']=="duyet")
{
    if($dhDB->duyetDH(1,$_GET['maDhang'])>0)
        echo "Duyệt thành công";
    else
        echo "Duyệt không thành công";
}

?>

    
     
    
    <div class="table"> 
      <div>Đơn hàng được duyệt </div>  
        <table class="listing" cellpadding="0" cellspacing="0">
          <tr>
            <th class="first" >Mã đơn</th>
            <th>Email</th>
            <th>Ngày lập ĐH</th>
            <th>Tên người nhận</th>
            <th>Địa chỉ người nhận</th>
            <th>Số điện thoại</th>
            <th>Tổng tiền</th>
            <th>Active</th>
            <th>Thao tác</th>
          </tr>
          <?php
		  $i=1;
		  foreach($dsdonhangdd as $dh)
		  {
		  ?>
          <tr <?php if($i%2==0) echo 'class="bg"' ?>>
            <td ><?php echo $dh['maDon'] ?></td>
            <td><?php echo $dh['email'] ?></td>
            <td><?php echo $dh['ngaylapDH'] ?></td>
            <td><?php echo $dh['tenngnhan'] ?></td>
            <td><?php echo $dh['diachinhan'] ?></td>
            <td><?php echo $dh['dtnguoinhan'] ?></td>
            <td><?php echo number_format($dh['tongtien']) ?></td>
            <td><?php echo $dh['active'] ?></td>
            <td><a href="index.php?mo=dhc&ac=xoa&maDhang=<?php echo $dh['maDon'] ?>"><img src="img/hr.gif" width="16" height="16" alt="" /></a></td>

           
            
          </tr>
          <?php 
		  	$i++;
		  } ?>
        </table>
       
      </div>
        
      
     



      
<!--end loai -->



        