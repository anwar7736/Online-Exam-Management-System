<?php 
  require_once 'session.php';
  require_once 'admin.php';
  $ad = new Admin();
  error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Question</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<body class="bg-secondary">
  <div class="container mt-4" align="center">
    <div class="card" style="width: 80%">
      <div class="card-header text-light text-center bg-info">
        <h2>Add New Question</h2>         
      </div> 
      <div class="card-body">
        <?php 
            if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['addques'])) {
              $addQues = $ad->InsertQuestion($_POST);
            }
            $count = $ad->CountQues();
        ?>
          <?php require_once 'adhead.php';?>
          <form method="POST">
            <table>
                <?php 
                  if (isset($addQues)) {
                      echo $addQues;
                  }
                ?>
              <tr>
                <td> <b>Question No </b></td>
                <td> <b> : </b></td>
                <td> <input style="border:1px solid green" class="ml-2 px-5 text-danger" type="number" name="quesNo" value="<?php echo $count+1;?>" readonly></td>
              </tr> 
              <tr>
                <td> <b>Question</b> </td>
                <td> <b>: </b></td>
                <td> <textarea style="border:1px solid green" class="ml-2 mt-2 px-5 py-4" name="ques" id="ques" rows="1" cols="17"></textarea></td>
              </tr> 
              <tr>
                <td> <b>Choice One </b> </td>
                <td> <b>: </b></td>
                <td> <input style="border:1px solid green" class="ml-2 mt-2 px-5" type="text" name="one"></td>
              </tr>
              <tr>
                <td> <b>Choice Two </b> </td>
                <td> <b>: </b></td>
                <td> <input style="border:1px solid green" class="ml-2 mt-2 px-5" type="text" name="two"></td>
              </tr>
              <tr>
                <td> <b>Choice Three </b> </td>
                <td> <b>: </b></td>
                <td> <input style="border:1px solid green" class="ml-2 mt-2 px-5" type="text" name="three"></td>
              </tr>
              <tr>
                <td> <b>Choice Four </b> </td>
                <td> <b>: </b></td>
                <td> <input style="border:1px solid green" class="ml-2 mt-2 px-5" type="text" name="four"></td>
              </tr>
              <tr>
                <td> <b>Right Answer </b> </td>
                <td> <b>: </b></td>
                <td> <input style="border:1px solid green" class="ml-2 mt-2 px-5" type="number" name="rightAns"></td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td><input class="mt-3 ml-5 px-5 py-2 btn btn-info" type="submit" name="addques" value="SUBMIT"></td>
              </tr>
            </table>
          </form>
      </div>
    </div>
  </div>
</body>
</html>

