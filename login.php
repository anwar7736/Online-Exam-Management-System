<?php 
  require_once 'admin.php';
  require_once 'session.php';
  $ad = new Admin();
  Session::checkLogin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Login</title>
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
    $adminData = $ad->AdminLogin($_POST);
  }
  $result = $ad->getAdminData();
  $value = mysqli_fetch_assoc($result);
  ?>
  <div class="container mt-4" align="center">
    <div class="card" style="width: 50%">
      <div class="card-header text-light text-center bg-info">
        <h2>Admin Login</h2>
      </div> 
      <div class="card-body">
        <?php 
          if(isset($adminData)){
            echo $adminData;
        }
        ?>
        <form method="POST">
          <div class="form-group">
            <strong><label style="float:left">Username : </label></strong>
            <input class="form-control" type="text" name="user" id="user" value="<?php echo $value['adminUser']; ?>" >
          </div> 
          <div class="form-group">
            <strong><label style="float:left">Password : </label></strong>
            <input class="form-control" type="password" name="pass" id="pass" value="<?php echo $value['adminPass']; ?>">
          </div>
          <div class="form-group">
            <input class="btn btn-success px-5 py-2" type="submit" name="loginBtn" id="loginBtn" value="Login"><br><br>
            <a href="ulogin.php" style="text-decoration: none">Login as user</a>
          </div>
          
        </form>
      </div>
    </div>
  </div>
</body>
</html>
