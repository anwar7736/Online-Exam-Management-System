<?php 
  require_once 'session.php';
	require_once 'admin.php';
  $ad  = new Admin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Question List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style type="text/css">
    table,th,td,tr{
      border:2px solid magenta
    }
  </style>
<body class="bg-secondary">
  <div class="container mt-4" align="center">
    <div class="card" style="width: 80%">
      <div class="card-header text-light text-center bg-info">
      	<h2>All Question List</h2>  	      
      </div> 
      <div class="card-body">
        <?php 
          if (isset($_GET['del'])) {
              $quesNo = $_GET['del'];
              $delQues = $ad->RemoveQues($quesNo);
          }
        ?>
      		<?php require_once 'adhead.php';?>
          <?php 
              if (isset($delQues)) {
                    echo $delQues;
              }
          ?>
          <table class="table table-striped">
            <thead class="text-center bg-success">
              <tr>
                <th>Serial No</th>
                <th>Question No</th>
                <th>Question Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <?php 
              $viewQues = $ad->ViewAllQues();
              if($viewQues){
                $i=0;
                while($data = mysqli_fetch_assoc($viewQues)) { $i++; ?>
                    <tbody class="text-center">
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $data['quesNo']; ?></td>
                        <td><?php echo $data['ques']; ?></td>
                        <td><a onclick="return confirm('Do you want ot remove this question?')" class="btn btn-danger" href="?del=<?php echo $data['quesNo']; ?>">Remove</a></td>
                      </tr>
                    </tbody>
              
              <?php } } ?>
          </table>
      </div>
    </div>
  </div>
</body>
</html>

