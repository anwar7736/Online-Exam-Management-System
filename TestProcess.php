 <?php 
	 require_once 'database.php';
	 require_once 'format.php';
 	class Exam
 	{
 		public $db;
 		public $fm;
 		function __construct()
 		{
 			$this->db = new Database();
 			$this->fm = new Format();
 		}
 		public function getTotalRows(){
 			$query = "SELECT * FROM tbl_ques";
 			$data  = $this->db->select($query);
 			return $total = $data->num_rows;
 		}
 		public function getQuesByNum($number){
 			$query = "SELECT * FROM tbl_ques WHERE quesNo = '$number'";
 			$data  = $this->db->select($query);
 			return $data = $data->fetch_assoc();
 		}
 		public function getQuestion(){
 			$query = "SELECT * FROM tbl_ques";
 			$data  = $this->db->select($query);
 			return $data = $data->fetch_assoc();
 		}
 		public function getQuestions(){
 			$query = "SELECT * FROM tbl_ques";
 			$data  = $this->db->select($query);
 			return $data;
 		}
 		public function getAnsByNum($number){
 			$query = "SELECT * FROM tbl_ans WHERE quesNo = '$number'";
 			$data  = $this->db->select($query);
 			return $data;
 		}
 		public function ProcessData($data){
 			$selectAns  = $this->fm->validation($data['ans']);
 			$number 	= $this->fm->validation($data['number']);
 			$selectAns 	= mysqli_real_escape_string($this->db->link,$selectAns);
 			$number		= mysqli_real_escape_string($this->db->link,$number);
 			$next		= $number+1;
 			if (!isset($_SESSION['score'])) {
 				$_SESSION['score'] = '0';
 			}
 			$total = $this->getTotalRows();
 			$right = $this->rightAns($number);
 			if($right == $selectAns){
 				$_SESSION['score']++;
 			}
 			if ($total == $number) {
 				header("location:final.php");
 				exit();
 			}
 			else{
 				header("location:starttest.php?q=".$next);
 			}
 		}
 		public function rightAns($number){
 			$query = "SELECT * FROM tbl_ans WHERE quesNo = '$number' AND rightAns='1'";
 			$data  = $this->db->select($query)->fetch_assoc();
 			return $result = $data['id'];
 		}
 	}
 ?>