<?php

class Donhang extends Db{
	public function them($ma,$email,$ten,$diachi,$ngaynhan,$dienthoai)
	{
		
		//echo "insert into hoadon value('".$ma."','".$email."','now()','".$ten."','".$diachi."','".$ngaynhan."','".$dienthoai."')";
		$sql="insert into hoadon value(?,?,now(),?,?,?,?)";
		$kq=$this->exeNoneQuery($sql,array($ma,$email,$ten,$diachi,$ngaynhan,$dienthoai));
		if($kq>0) //them chi tiet don hang
		{
      
			include_once("Dienthoai.class.php");
			$dienthoaiDB=new Dienthoai;
			
				$madts=array();
				foreach ($_SESSION['cart'] as $mdt => $v) {
					$madts[]=$mdt;
				}
        $tempGias=$dienthoaiDB->giaDienthoai($madts);
        $giadt=array();
        for($i=0;$i<count($tempGias);$i++)
        {
          $giadt[$tempGias[$i]['madt']]=$tempGias[$i]['gia'];
        }

        $kq=0;
				foreach ($_SESSION['cart'] as $mdt => $sl) {
					$sql="insert into chitiethd value(?,?,?,?)";
				$kq+=$this->exeNoneQuery($sql,array($ma,$mdt,$sl,$gias[$mdt]));
      
			}
			unset($_SESSION['cart']);
			return $kq;
			
			
		}
	}

	public function them2($ma,$email,$ten,$diachi,$ngaynhan,$dienthoai)
	{
		try {
			$this->beginTransaction();
			$sql="insert into hoadon value(?,?,now(),?,?,?,?)";
			$kq=$this->exeNoneQuery($sql,array($ma,$email,$ten,$diachi,$ngaynhan,$dienthoai));
			$madh=$this->getNewID();
			
			if($kq>0) //them chi tiet don hang
			{
				include_once("Sach.class.php");
				$dienthoaiDB=new Dienthoai;
				$madts=array();
				foreach ($_SESSION['cart'] as $mdt => $v) {
					$madts[]=$mdt;
				}
				$tempGias=$dienthoaiDB->giaSach($madts);
				$gias=array();
				for($i=0;$i<count($tempGias);$i++)
				{
					$gias[$tempGias[$i]['madt']]=$tempGias[$i]['gia'];
				}

				$kq=0;
				foreach ($_SESSION['cart'] as $mdt => $sl) {
					$sql="insert into chitiethd2 value(?,?,?,?)";
					$kq+=$this->exeNoneQuery($sql,array($ma,$mdt,$sl,$gias[$mdt]));
				}
				if($kq==count($_SESSION['cart']))
				{	$this->commit();
					return 1;
				}else
				{
					$this->rollback();
					return 0;
				}
			}
			
		} catch (Exception $e) {
			$this->rollBack();
  			echo "Failed: " . $e->getMessage();
			return 0;
		
		}
		
	}
	
}
?>