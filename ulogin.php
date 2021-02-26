<?php 
  require_once 'user.php';
  require_once 'session.php';
  Session::checkLoginUser();
  $user = new User();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>User Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style type="text/css">
    input[type='text'], input[type='password']{
      border : 1px solid #17a2b8;
    }
  </style>
<body class="bg-secondary">
  <div class="container mt-4" align="center">
    <?php if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['loginBtn'])) {
        $uname  = $_POST['user'];
        $pass   = $_POST['pass'];
        $result = $user->UserLogin($uname,$pass);
        }
    ?>
    <div class="card" style="width: 60%">
      <div class="card-header text-light text-center bg-success">
        <h2 class="text-light" style="font-weight: bold">Online Exam Management System<br><span class="text-warning">User Login</span></h2>
      </div> 
      <div class="card-body">
        <?php require_once 'uhead.php';?>
        <?php 
          if(isset($result)){
            echo $result;
        }
        ?>
        <form method="POST">
          <div class="form-group">
            <strong><label style="float:left">Username : </label></strong>
            <input class="form-control" type="text" name="user" id="user" value="" >
          </div> 
          <div class="form-group">
            <strong><label style="float:left">Password : </label></strong>
            <input class="form-control" type="password" name="pass" id="pass" value="">
          </div>
          <div class="form-group">          
            <input class="btn btn-primary px-5 py-2" type="submit" name="loginBtn" id="loginBtn" value="Login"><br><br><label>Not yet a account? <a href="ureg.php" style="text-decoration:none">Register</a></label><br><a href="login.php" style="text-decoration: none">Login as admin</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
