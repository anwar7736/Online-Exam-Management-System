 <?php 
  require_once 'session.php';
  require_once 'TestProcess.php';
  $exam = new Exam();
  Session::checkSessionUser();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Exam Page</title>
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
      	<?php 
      		$total = $exam->getTotalRows();
      		 if (isset($_GET['q'])) {
            $number = $_GET['q'];
      			$ques = $exam->getQuesByNum($number);
      			$ans  = $exam->getAnsByNum($number);
      		}
          if ($_SERVER['REQUEST_METHOD']=='POST') {
              $process = $exam->ProcessData($_POST);
          }
      		
      	?>
      		<?php require_once 'uhead.php';?>
          <div class=""> 
            <h3 style="border:2px solid red">Welcome to Online Exam</h3><br>
          </div>
          <div>
          	 <h3>Question <?php echo $ques['quesNo'];?> of <?php echo $total; ?></h3><hr style="border:1px dashed">
          </div>
         
          <form method="POST">
          	<table>
          		<tr>
          			<td style="border-bottom:2px solid" align="center"><strong>Ques <?php echo $ques['quesNo'];?> : <?php echo $ques['ques'];?></strong></td>
          		</tr>
          		<?php 
          			if ($ans) {
          				foreach($ans as $answer) {?>
          		<tr style="">
          			<td><label><input type="radio" name="ans"> <?php echo $answer['ques'];?> </label></td>
          		</tr><?php }} ?>
          		<tr>
          			<td>
                  <input type="submit" class="btn btn-secondary" name="submitBtn" value="Next Question">
          				<input type="hidden" name="number" value="<?php echo $ques['id'];?>">
          			</td>
          		</tr>
          	</table><br> 		 
          </form>
      </div>
    </div>
  </div>
</body>
</html>

 