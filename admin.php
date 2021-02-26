<?php 
	require_once 'database.php';
	require_once 'format.php';
	require_once 'session.php';

	class Admin
	{
		private $db;
		private $fm;
		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function AdminLogin($data){
				$adminUser = $this->fm->validation($data['user']);
				$adminPass = $this->fm->validation($data['pass']);
				$adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
				$adminPass  = mysqli_real_escape_string($this->db->link, $adminPass);
				if($adminUser=="" || $adminPass==""){
					return $msg = "<div class='alert alert-danger'><strong>Field must not be empty! Please try again.</strong></div>";
				}
				$query = "SELECT * FROM tbl_admin WHERE adminUser='$adminUser' AND adminPass='$adminPass'";
				$result = $this->db->select($query);
				if($result!=false){
					$value = mysqli_fetch_assoc($result);
					Session::init();
					Session::set("login", true);
					Session::set("adminUser", $value['adminUser']);
					Session::set("adminId", $value['adminId']);
					header("location:home.php");
				}
				else{
					return $msg = "<div class='alert alert-danger'><strong>Username or Passoword Wrong! Please try again.</strong></div>";
				}
		}
		public function InsertQuestion($data){
				$quesNo = $this->fm->validation($data['quesNo']);
				$ques = $this->fm->validation($data['ques']);
				$one = $this->fm->validation($data['one']);
				$two = $this->fm->validation($data['two']);
				$three = $this->fm->validation($data['three']);
				$four = $this->fm->validation($data['four']);
				$rightAns = $this->fm->validation($data['rightAns']);
				$quesNo = mysqli_real_escape_string($this->db->link, $quesNo);
				$ques  = mysqli_real_escape_string($this->db->link, $ques);
				$rightAns  = mysqli_real_escape_string($this->db->link, $rightAns);
				$ans = array();
				$ans[1] = $data['one'];
				$ans[2] = $data['two'];
				$ans[3] = $data['three'];
				$ans[4] = $data['four'];
				if($ques=="" || $one=="" || $two=="" || $three=="" || $four=="" || $rightAns==""){
					return $msg = "<div class='alert alert-danger'><strong>Field must not be empty! Please try again.</strong></div>";
				}
				$query = "INSERT INTO tbl_ques(quesNo,ques)VALUES('$quesNo','$ques')";
				$result = $this->db->insert($query);
				if($result){
					foreach ($ans as $key => $value) {
						if($value!=''){
							if ($rightAns==$key) {
								$query = "INSERT INTO tbl_ans(quesNo,rightAns,ques)VALUES('$quesNo','1','$value')";								
							}
							else {
								$query = "INSERT INTO tbl_ans(quesNo,rightAns,ques)VALUES('$quesNo','0','$value')";
							}
							$result = $this->db->insert($query);
						}
					}
				}
				if($result){
					return $msg = "<div class='alert alert-success'><strong>New question added successfully.</strong></div>";
				}
			}
		public function getUserList(){
			$query = "SELECT * FROM tbl_user";
			return $result = $this->db->select($query);
		}
		public function getAdminData(){
			$query = "SELECT * FROM tbl_admin";
			return $result = $this->db->select($query);
		}
		public function UserEnabled($userid){
			$query = "UPDATE tbl_user SET status='0' WHERE userid='$userid'";
			$result = $this->db->update($query);
			if($result){
				return $msg = "<div class='alert alert-success' style='font-size:17px'><strong>User enabled successfully...</strong></div>";
			}
		}
		public function UserDisabled($userid){
			$query = "UPDATE tbl_user SET status='1' WHERE userid='$userid'";
			$result = $this->db->update($query);
			if($result){
				return $msg = "<div class='alert alert-danger style='font-size:17px''><strong>User disabled successfully...</strong></div>";
			}
		}
		public function UserRemove($userid){
			$query = "DELETE FROM tbl_user WHERE userid='$userid'";
			$result = $this->db->delete($query);
			if($result){
				return $msg = "<div class='alert alert-success style='font-size:17px''><strong>User deleted successfully...</strong></div>";
			}
			
		}
		public function CountQues(){
				$query = "SELECT quesNo FROM tbl_ques";
				$result = $this->db->select($query);
				return $total = mysqli_num_rows($result);
				 

			} 
			public function ViewAllQues(){
				$query = "SELECT * FROM tbl_ques";
				return $result = $this->db->select($query);

			} 
			public function RemoveQues($quesNo){
				$tables = array("tbl_ques","tbl_ans");
				foreach ($tables as $table) {
					$query = "DELETE FROM $table WHERE quesNo='$quesNo'";
					$result = $this->db->delete($query);
				}		
				if($result){
					return $msg = "<div class='alert alert-success style='font-size:17px''><strong>Question deleted successfully...</strong></div>";
				}

			} 
	}
?>