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
      	?>
      		<?php require_once 'uhead.php';?>
            <h3 style="border:2px solid green">All Questions & Answers : <?php echo $total;?></h3>
          	<table>
          		<?php 
          			$data = $exam->getQuestions();
          			foreach($data as $value){?>
          		<tr>
          			<td style="margin-bottom: 100px" align="center"><strong>Ques <?php echo $value['quesNo'];?> : <?php echo $value['ques'];?></strong></td>
          		</tr><br>
              <?php 
                $number = $value['quesNo'];
                $ans = $exam->getAnsByNum($number);
                foreach ($ans as $val) {  ?>             
          		<tr class="justify-content-left">
          			<td><label><input type="radio" disabled> 
                  <?php 
                    if($val['rightAns']=='1'){
                      echo "<span class='text-danger'>".$val['ques']."</span>";
                    }else{
                      echo $val['ques'];
                    }
                  ?> 
                  </label>
                </td>
          		</tr><br><?php } ?>
          	</table>
          	<?php } ?>
          	<a href="test.php" class="btn btn-light text-primary"style="border:1px solid #007bff">Start Again...</a>		 
      </div>
    </div>
  </div>
</body>
</html>

  