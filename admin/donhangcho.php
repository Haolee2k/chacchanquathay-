<!--Loai -->

<?php
include_once("../classes/Donhang.class.php");
$dhDB=new Donhang;
$dsdonhangcd=$dhDB->tatCa();

if(isset($_REQUEST['ac']) && $_REQUEST['ac']=="xoa")
{
    if($dhDB->duyetDH(0,$_GET['maDhang'])>0)
        echo "Duyệt thành công";
    else
        echo "Duyệt không thành công";
}
?>

    
     
    
    <div class="table">
      <div>Đơn hàng đang chờ </div>  
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
            <th>Duyệt</th>
          </tr>
          <?php
		  $i=1;
		  foreach($dsdonhangcd as $dh)
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
            <td><a href="index.php?mo=dhd&ac=duyet&maDhang=<?php echo $dh['maDon'] ?>"><img src="img/add-icon.gif" width="16" height="16" alt="" /></a></td>
            
           
            
          </tr>
          <?php 
		  	$i++;
		  } ?>
        </table>
      </div>
        
      
     



      
<!--end loai -->