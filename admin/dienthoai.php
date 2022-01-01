<!--Loai -->
<script>
function xoa(ml)
{
	con=confirm("Ban co chac muon xoa khong?");
	if(con)
	{
		location.href="index.php?mo=dt&ac=xoa&ml="+ml;
	}
}
</script>
<?php
include_once("../classes/Dienthoai.class.php");
$loaiDB=new Dienthoai;
if(isset($_POST['btnAdd']))
{
	if($loaiDB->them($_POST['txtMaDT'],$_POST['txtTenDT'],$_POST['txtMotadt'],$_POST['txtlx'],$_POST['txthinh'],$_POST['txtMaLoai'],$_POST['txtgia'])>0)
		echo "them thanh cong";
	else
		echo "Them ko thanh cong";
}
else if(isset($_POST['btnLuu']))
{
	if($loaiDB->sua($_POST['txtMaDT'],$_POST['txtTenDT'],$_POST['txtMotadt'],$_POST['txtlx'],$_POST['txthinh'],$_POST['txtMaLoai'],$_POST['txtgia'])>0)
		echo "Sua thanh cong";
	else
		echo "Sua ko thanh cong";
}
else if(isset($_REQUEST['ac']) && $_REQUEST['ac']=="xoa") //thuc hien xoa
{
	if($loaiDB->xoa($_GET['ml'])>0) //xoa thanh cong
	{
	?>
    	<script>alert("Xoa thanh cong");</script>
    <?php
	}else
	{
	?>
    <script>alert("Khong duoc xoa vi co sach");</script>
    <?php
	}
}else if(isset($_REQUEST['ac']) && $_REQUEST['ac']=="sua")
{
	$loaisua=$loaiDB->thongTin1Dienthoai($_GET['ml']);
}
$dsloai=$loaiDB->tatCa();
?>

      	<form action="" method="post">
        	<input type="hidden" name="mo" value="dt" />
                  <div class="table" style="width:500px !important;"> <img src="img/bg-th-left.gif" width="8" height="7" alt="" class="left" /> <img src="img/bg-th-right.gif" width="7" height="7" alt="" class="right" />
        <table class="listing form" cellpadding="0" cellspacing="0" width="400">
          <tr>
            <th class="full" colspan="2">Form điện thoại</th>
          </tr>
          <tr>
            <td class="first" width="172"><strong>Mã điện thoại</strong></td>
            <td class="last"><input type="text" class="text" name="txtMaDT" id="txtMaDT" value="<?php if(isset($loaisua[0]['madt'])) echo $loaisua[0]['madt']; ?>" /></td>
          </tr>
          
          <tr class="bg">
            <td class="first" width="172"><strong>Tên điện thoại</strong></td>
            <td class="last"><input type="text" class="text" name="txtTenDT" id="txtTenDT" value="<?php if(isset($loaisua[0]['madt'])) echo $loaisua[0]['tendt']; ?>" /></td>
          </tr>
          <tr>
            <td class="first" width="172"><strong>Mô tả</strong></td>
            <td class="last"><input type="text" class="text" name="txtMotadt" id="txtMotadt" value="<?php if(isset($loaisua[0]['madt'])) echo $loaisua[0]['mota']; ?>" /></td>
          </tr>
          <tr>
            <td class="first" width="172"><strong>Lượt xem</strong></td>
            <td class="last"><input type="text" class="text" name="txtlx" id="txtlx" value="<?php if(isset($loaisua[0]['madt'])) echo $loaisua[0]['luotxem']; ?>" /></td>
          </tr>
          <tr>
            <td class="first" width="172"><strong>Hình</strong></td>
            <td class="last"><input type="text" class="text" name="txthinh" id="txthinh" value="<?php if(isset($loaisua[0]['madt'])) echo $loaisua[0]['hinh']; ?>" /></td>
          </tr>
          <tr>
            <td class="first" width="172"><strong>Mã loại</strong></td>
            <td class="last"><input type="text" class="text" name="txtMaLoai" id="txtMaLoai" value="<?php if(isset($loaisua[0]['madt'])) echo $loaisua[0]['maloai']; ?>" /></td>
          </tr>
          
          <tr>
            <td class="first" width="172"><strong>Giá</strong></td>
            <td class="last"><input type="text" class="text" name="txtgia" id="txtgia" value="<?php if(isset($loaisua[0]['madt'])) echo $loaisua[0]['gia']; ?>" /></td>
          </tr>
          <tr>
            <td class="first" colspan="2"><input type="submit"  
            name="<?php if(isset($_REQUEST['ac']) && $_REQUEST['ac']=="sua") 
                            echo "btnLuu"; 
                        else
			                      echo "btnAdd" ?>" value="<?php if(isset($_REQUEST['ac']) && $_REQUEST['ac']=="sua") 
                                                                echo "Luu"; 
                                                            else
			                                                          echo "Thêm" ?>" /></td>
          </tr>
 			</table>
            </div>	
      </form>
      <div id="ketqua"></div>
      <div class="table"> <img src="img/bg-th-left.gif" width="8" height="7" alt="" class="left" /> <img src="img/bg-th-right.gif" width="7" height="7" alt="" class="right" />
        <table class="listing" cellpadding="0" cellspacing="0">
          <tr>
            <th class="first" >Mã điện thoại</th>
            <th>Tên điện thoại</th>
            <th>Mô tả</th>
            <th>Lượt xem</th>
            <th>Hình</th>
            <th>Mã loại</th>
            <th>Giá</th>
            <th>Thêm</th>
            <th>Xóa</th>
            <th>Sửa</th>
          </tr>
          <?php
		  $i=1;
		  foreach($dsloai as $loai)
		  {
		  ?>
          <tr <?php if($i%2==0) echo 'class="bg"' ?>>
            <td ><?php echo $loai['madt'] ?></td>
            <td><?php echo $loai['tendt'] ?></td>
            <td><?php echo substr($loai['mota'],0,20) ?></td>
            <td><?php echo $loai['luotxem'] ?></td>
            <td><?php echo $loai['hinh'] ?></td>
            <td><?php echo $loai['maloai'] ?></td>
            <td><?php echo $loai['gia'] ?></td>
            <td><img src="img/add-icon.gif" width="16" height="16" alt="" /></td>
            <td><a href="javascript:xoa('<?php echo $loai['madt'] ?>')"><img src="img/hr.gif" width="16" height="16" alt="" /></a></td>
            
            <td><a href="index.php?mo=dt&ac=sua&ml=<?php echo $loai['madt'] ?>"><img src="img/edit-icon.gif" width="16" height="16" alt="" /></a></td>
            
          </tr>
          <?php 
		  	$i++;
		  } ?>
          <!--
          <tr class="bg">
            <td >- Lorem Ipsum </td>
            <td></td>
            <td><img src="img/add-icon.gif" width="16" height="16" alt="add" /></td>
            <td><img src="img/hr.gif" width="16" height="16" alt="" /></td>
      
            <td><img src="img/edit-icon.gif" width="16" height="16" alt="edit" /></td>
      
          </tr>
      		-->
        </table>
        
      </div>
<!--end loai -->