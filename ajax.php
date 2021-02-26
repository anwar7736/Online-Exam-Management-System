 <?php 
 	require_once 'user.php';
 	$user = new User();
 	if ($_SERVER['REQUEST_METHOD']=='POST') {
 		$name 	= $_POST['name'];
 		$uname 	= $_POST['uname'];
 		$email 	= $_POST['email'];
 		$pass 	= $_POST['pass'];
 		$result = $user->UserRegistration($name,$uname,$email,$pass);
 	}
 ?>