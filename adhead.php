<?php 
	require_once 'session.php';
	Session::checkSession();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<body class="bg-secondary">
  <?php 
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['loginBtn'])){
    $adminData = $ad->getAdminData($_POST);
  }

  ?> 
      		<a style="display:inline; margin-right: 5px" href="home.php" class="btn btn-success">Home</a>
      		<a style="display:inline; margin-right: 5px" href="muser.php" class="btn btn-primary">Manage Users</a>
      		<a style="display:inline; margin-right: 5px" href="addques.php" class="btn btn-warning">Add Question</a>
      		<a style="display:inline; margin-right: 5px" href="queslist.php" class="btn btn-secondary">Question List</a>
      		<a style="display:inline" href="?action=logout" class="btn btn-danger">Logout</a><br><br>
        <?php 
          if(isset($adminData)){
            echo $adminData;
        }
        if(isset($_GET['action']) && isset($_GET['action'])=='logout'){
        		Session::destroy();
        }	
        $username = Session::get("adminUser");
        ?>	
        <h4 style="float: right;">Welcome : 
        	<strong class="text-success"> 
        		<?php 
        			if(isset($username)){
        				echo $username;
        			}
        		?>      	
       		</strong>
    	</h4><br><br>
</body>
</html>

 