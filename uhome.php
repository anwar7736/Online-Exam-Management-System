<?php 
  require_once 'session.php';
  Session::checkSessionUser();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<body class="bg-secondary">
  <div class="container mt-4" align="center">
    <div class="card" style="width: 60%">
      <div class="card-header text-light text-center bg-info">
      	<h2>Online Exam Management System</h2>  	      
      </div> 
      <div class="card-body">
      		<?php require_once 'uhead.php';?>
          <strong>Humnava Mere-Jubin Nautiyal Mp3</strong><br>
           <audio controls>
              <source src="Humnava.mp3" type="audio/mpeg">
           </audio><br><strong>Vaaste - Dhvani Bhanushali Mp3</strong><br>
           <audio controls>
              <source src="Vaaste.mp3" type="audio/mpeg">
           </audio> 
      </div>
    </div>
  </div>
</body>
</html>

 