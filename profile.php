<?php 
  require_once 'session.php';
  require_once 'user.php';
  $user = new User();
  Session::checkSessionUser();
  $userid = Session::get("userid");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Profile Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style type="text/css">
    input[type='text']{
      border : 1px solid #17a2b8;
    }
  </style>
<body class="bg-secondary">
  <div class="container mt-4" align="center">
    <div class="card" style="width: 60%">
      <div class="card-header text-light text-center bg-info">
      	<h2>Online Exam Management System</h2>   	      
      </div> 
      <div class="card-body">
      		<?php require_once 'uhead.php';?>
          <form method="POST">
            <?php 
              if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['updBtn'])) {
                  $name = $_POST['name'];
                  $uname = $_POST['uname'];
                  $email = $_POST['email'];
                  $msg = $user->UpdateProfile($userid, $name, $uname, $email);
              }
              if (isset($msg)) {
                  echo $msg;
              }
              $data = $user->UserProfile($userid);
              if ($data) {
                  $result = mysqli_fetch_assoc($data);
            ?>
          <div class="form-group">
            <strong><label style="float:left">Name : </label></strong>
            <input class="form-control text-danger" type="text" name="name" id="name" value="<?php echo $result['name']; ?>" >
          </div> 
          <div class="form-group">
            <strong><label style="float:left">Username : </label></strong>
            <input class="form-control text-danger" type="text" name="uname" id="uname" value="<?php echo $result['username']; ?>" >
          </div> 
          <div class="form-group">
            <strong><label style="float:left">Email : </label></strong>
            <input class="form-control text-danger" type="text" name="email" id="email" value="<?php echo $result['email']; ?>" >
          </div> 
          <div class="form-group">            
            <input class="btn btn-success px-4 py-2" type="submit" name="updBtn" id="updBtn" value="Update"><br><br>
          </div>
        </form>
      <?php } ?>
      </div>
    </div>
  </div>
</body>
</html>

 