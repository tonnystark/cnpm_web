<?php
include_once("../lib/database.php");
//table website
class account_model extends db
{
	
	function DangKy($username,$pass,$name,$email)
	{
		$sql="insert into user(Username,Password,Fullname,Email) values(?,?,?,?)";
		$this->setQuery($sql);
		$result=$this->execute(array($username,md5($pass),$name,$email));
		if($result)
		{
			return $this->getLastId();
		}
		else{
			return false;
		}
	}
	function DangNhap($username,$pass)
	{
		$sql="select * from user where Username='$username' and Password='$pass'";
		$this->setQuery($sql);
		return $this->loadRow(array($username,$pass));
	}
	
	function Update_user($userid,$username,$name,$email)
	{
		$sql="update user set Username=$username,Fullname=$name,Email=$email where id=$userid";
		$this->setQuery($sql);
		$result=$this->execute(array($username,$name,$email));
		if($result)
		{
			return $this->getLastId();
		}
		else{
			return false;
		}
	}
	
}

