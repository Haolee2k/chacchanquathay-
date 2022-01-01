<?php
class Dienthoai extends Db{
	public function tatCa()
	{
		$sql="select * from dienthoai";
		return $this->exeQuery($sql);	
	}
	public function dienthoai1Loai($maloai)
	{
		$sql="select * from dienthoai where maloai=?";
		return $this->exeQuery($sql,array($maloai));	
	}
	public function tongSoDienthoai()
	{
		$sql="select count(*) from dienthoai";
		$t=$this->exeQuery($sql,array(),PDO::FETCH_NUM);	
		return $t[0][0];
	}
	public function tongSoDienthoai1Loai($maloai)
	{
		$sql="select count(*) from dienthoai where maloai=?";
		$t=$this->exeQuery($sql,array($maloai),PDO::FETCH_NUM);	
		return $t[0][0];
	}
	public function thongTin1Dienthoai($ma)
	{
		$sql="select * from dienthoai where madt=?";
		return $this->exeQuery($sql,array($ma));	
	}	
	public function thongTinNhieuDienthoai($arr_ma)
	{
		
		for($i=0;$i<count($arr_ma);$i++)
		$arr_ma[$i]="'".$arr_ma[$i]."'";
		$dsma=implode(",",$arr_ma);
		$sql="select * from dienthoai where madt in (".$dsma.")";
		
		return $this->exeQuery($sql);	
	}
	public function giaDienthoai($madthoai)
	{
		
		
		if(is_array($madthoai))
		{
			for($i=0;$i<count($madthoai);$i++)
		$madthoai[$i]="'".$madthoai[$i]."'";
		$dsma=implode(",",$madthoai);
		$sql="select madt,gia from dienthoai where madt in (".$dsma.")";
		return $this->exeQuery($sql);
		}else
		{
			$sql="select madt,gia from dienthoai where madt = ?";
		return $this->exeQuery($sql,array($madthoai));
		}
	}
	public function hot()
	{
		$sql="select tendt,luotxem  from dienthoai ORDER BY luotxem DESC limit 5";
		return $this->exeQuery($sql);	
	}
	public function tenloai()
	{
		$sql="select tendt,luotxem, loai.tenloai as ten from dienthoai inner join loai on dienthoai.maloai = loai.maloai order by luotxem desc limit 5";
		return $this->exeQuery($sql);
	}
	public function search($search)
	{
		$sql="select tendt,luotxem  from dienthoai where tendt='%$search%'";
		return $this->exeQuery($sql);	
	}
	public function them($ma,$ten,$mota,$luotxem,$hinh,$maloai,$gia)
	{
		$sql="insert into dienthoai value(?,?,?,?,?,?,?)";
		return $this->exeNoneQuery($sql,array($ma,$ten,$mota,$luotxem,$hinh,$maloai,$gia));
	}
	public function sua($ma,$ten,$mota,$luotxem,$hinh,$maloai,$gia)
	{
		$sql="update dienthoai set tendt=?, mota=?, luotxem=?, hinh=?, maloai=?, gia=? where madt=?";
		return $this->exeNoneQuery($sql,array($ten,$mota,$luotxem,$hinh,$maloai,$gia,$ma));
	}
	public function xoa($ma)
	{
		$sql="delete from dienthoai where madt=? ";
		return $this->exeNoneQuery($sql,array($ma));
	}
	
}
?>