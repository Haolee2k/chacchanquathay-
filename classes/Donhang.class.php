<?php

class Donhang extends Db{
	public function tatCa()
	{
		$sql="select * from donhang where active=0";
		return $this->exeQuery($sql);	
	}
	public function tatCa2()
	{
		$sql="select * from donhang where active=1";
		return $this->exeQuery($sql);	
	}
	public function duyetDH($active,$ma){
		$sql="UPDATE donhang set active=? where maDon=?";
		return $this->exeNoneQuery($sql,array($active,$ma));
	}
	
}
?>