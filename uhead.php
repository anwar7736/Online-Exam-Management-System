<?php 
  require_once 'session.php';
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
            if(Session::get("loginUser")==true){?>
              <a style="display:inline; margin-right: 5px" href="uhome.php" class="btn btn-success px-4 py-2">Home</a>
              <a style="display:inline; margin-right: 5px" href="profile.php" class="btn btn-warning px-4 py-2">Profile</a>
            <a style="display:inline; margin-right: 5px" href="exam.php" class="btn btn-secondary px-4 py-2">Exam</a>
            <a style="display:inline" href="?logout" class="btn btn-danger px-4 py-2">Logout</a>
           <?php  } else { ?>
          
      		<a style="display:inline; margin-right: 5px" href="ulogin.php" class="btn btn-success px-4 py-2">Login</a>
      		<a style="display:inline; margin-right: 5px" href="ureg.php" class="btn btn-info px-4 py-2">Registration</a>
      		<br><br>
        <?php } ?>
        <?php 
          if(isset($adminData)){
            echo $adminData;
        }
        if(isset($_GET['logout'])){
        		Session::destroyUser();
        }	
        $username = Session::get("username");
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

 