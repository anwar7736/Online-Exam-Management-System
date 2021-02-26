<?php 
	require_once 'database.php';
	require_once 'format.php';
	require_once 'session.php';

class User
{
	public $db;
	public $fm;
	function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function UserRegistration($name, $uname, $email, $pass){
		$name 	= $this->fm->validation($name);
		$uname 	= $this->fm->validation($uname);
		$email 	= $this->fm->validation($email);
		$pass 	= $this->fm->validation($pass);
		$name 	= mysqli_real_escape_string($this->db->link, $name);
		$uname 	= mysqli_real_escape_string($this->db->link, $uname);
		$email 	= mysqli_real_escape_string($this->db->link, $email);
		if($name=="" || $uname=="" || $email=="" || $pass==""){
  				return $msg =  "<div class='alert alert-danger'><strong>Error : </strong>Field must not be empty! Please try again.</div>";
  			}
  		 if(strlen($uname)<3){
  			return $msg =  "<div class='alert alert-danger'><strong>Error : </strong>Username is too short! Please try again.</div>";
  		}
		 if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
			return $msg =   "<div class='alert alert-danger'><strong>Error : </strong>Invalid email address! Please try again.</div>";
		}
		else{
			$query 	= "SELECT * FROM tbl_user WHERE email='$email'";
			$result = $this->db->select($query);
			if($result!=false){
				return $msg =   "<div class='alert alert-danger'><strong>Error : </strong>This email already exists! Please try again.</div>";
			}else{
				$pass 	= mysqli_real_escape_string($this->db->link, md5($pass));
				$query = "INSERT INTO tbl_user(name,username,password,email)VALUES('$name','$uname','$pass','$email')";
				$result = $this->db->insert($query);
				if($result){
					return $msg =  "<div class='alert alert-success'><strong>Success : </strong>Registration successfull!.</div>";
				}
			}
		}
	}
	public function UserLogin($uname, $pass){
		$uname 	= $this->fm->validation($uname);
		$pass 	= $this->fm->validation($pass);
		$uname 	= mysqli_real_escape_string($this->db->link, $uname);
		$pass 	= mysqli_real_escape_string($this->db->link, md5($pass));
		if($uname=="" || $pass==""){
  				return $msg =  "<div class='alert alert-danger'><strong>Error : </strong>Field must not be empty! Please try again.</div>";
  			}
		 if (!filter_var($uname,FILTER_VALIDATE_EMAIL)) {
			return $msg =   "<div class='alert alert-danger'><strong>Error : </strong>Invalid email address! Please try again.</div>";
		}
		else{
			$query 	= "SELECT * FROM tbl_user WHERE email='$uname' AND password='$pass'";
			$result = $this->db->select($query);
			if($result==false){
				return $msg =   "<div class='alert alert-danger'><strong>Error : </strong>Username or Password Wrong! Please try again.</div>";
			}
			$getUser = mysqli_fetch_assoc($result);
			if($getUser['status']==1){
				return $msg =   "<div class='alert alert-danger'><strong>Error : </strong>Userid is disabled! Please contact with admin.</div>";
			}
			else{
				Session::init();
				Session::set("loginUser", true);
				session::set("userid", $getUser['userid']);
				session::set("name", $getUser['name']);
				session::set("username", $getUser['username']);
				session::set("email", $getUser['email']);
				header("location:uhome.php");
				
			}
		}
	}
	public function UserProfile($userid){
		$query 	= "SELECT * FROM tbl_user WHERE userid = '$userid' ";
		$result = $this->db->select($query);
		 if($result!=false){
		 	return $result;
		 }
	}	
	public function UpdateProfile($userid, $name, $uname, $email){
		$name 	= $this->fm->validation($name);
		$uname 	= $this->fm->validation($uname);
		$email 	= $this->fm->validation($email);
		$name 	= mysqli_real_escape_string($this->db->link, $name);
		$uname 	= mysqli_real_escape_string($this->db->link, $uname);
		$email 	= mysqli_real_escape_string($this->db->link, $email);
		if($name=="" || $uname=="" || $email==""){
  				return $msg =  "<div class='alert alert-danger'><strong>Error : </strong>Field must not be empty! Please try again.</div>";
  			}
  		 if(strlen($uname)<3){
  			return $msg =  "<div class='alert alert-danger'><strong>Error : </strong>Username is too short! Please try again.</div>";
  		}
		 if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
			return $msg =   "<div class='alert alert-danger'><strong>Error : </strong>Invalid email address! Please try again.</div>";
		}
		else{
		$query 	= "UPDATE tbl_user SET name = '$name', username = '$uname', email = '$email' WHERE userid = '$userid'";
		$result = $this->db->update($query);
		 if($result!=false){
		 	return $msg =  "<div class='alert alert-success'><strong>Success : </strong>Profile updated successfully.</div>";
		 }else{
		 	return $msg =  "<div class='alert alert-danger'><strong>Error : </strong>Profile not updated! Please try again.</div>";
		 }
		}
	}	
}
?>