<?php
include("../models/account_model.php");


class account_controller
{
	public function DkyTaiKhoan($username,$pass,$name,$email)
	{
		$w= new account_model();
		$user= $w->DangKy($username,$pass,$name,$email);
		if($user>0)
		{
			echo "<script language='javascript'>alert('Đăng ký thành công');";
					echo "location.href='login.php';</script>";
		}
		else{
			echo "<script language='javascript'>alert('Đăng ký thất bại');";
					echo "location:register.php';</script>";
		}
	}

	public function UpdateTaiKhoan($username,$name,$email)
	{
		$w= new account_model();
		$userid=$_SESSION['userid'];
		$user= $w->Update_user($userid,$username,$name,$email);
		if($user>0)
		{
			echo "<script language='javascript'>alert('Chỉnh sửa thành công');";
					echo "location.href='account.php';</script>";
		}
		else{
			echo "<script language='javascript'>alert('Chỉnh sửa thất bại');";
					echo "location:account.php';</script>";
		}
	}
	
	public function DNhapTaiKhoan($username,$pass)
	{
		$w= new account_model();
		$user= $w->DangNhap($username,$pass);
		if($user==true)
		{
			$_SESSION['username']= $user->Username;
			$_SESSION['name']= $user->Fullname;
			$_SESSION['userid']= $user->id;
			$_SESSION['email']= $user->Email;
			echo "<script language='javascript'>alert('Đăng nhập thành công');";
					echo "location.href='../production/website.php';</script>";
		}
		else{
			echo "<script language='javascript'>alert('Đăng nhập thất bại');";
					echo "location:login.php';</script>";
			unset($_SESSION['username']);
		}
	}

	public function DXuatTaiKhoan()
	{
		session_destroy();
		echo "<script language='javascript'>alert('Đã đăng xuất khỏi tài khoản');";
					echo "location.href='login.php';</script>";
	}
	
}

?>