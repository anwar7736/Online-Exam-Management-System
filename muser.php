<?php 
  require_once 'admin.php';
  $ad = new Admin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Manage Users</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style type="text/css">
  table,th,td,tr{
    border:2px solid blue
  }
</style>
<body class="bg-secondary">
  <div class="container mt-4" align="center">
    <div class="card" style="width: 70%">
      <div class="card-header text-light text-center bg-info">
        <h2>Manage All Users</h2>         
      </div> 
      <div class="card-body">
         <?php 
          if(isset($_GET['ebl'])){
            $ebl = $_GET['ebl'];
            $msg = $ad->UserEnabled($ebl);
          }
          if(isset($_GET['dbl'])){
            $dbl = $_GET['dbl'];
            $msg = $ad->UserDisabled($dbl);
          }
          if(isset($_GET['del'])){
            $del = $_GET['del'];
            $msg = $ad->UserRemove($del);
          }

         ?>
          <table class="table table-striped"> 
            <?php require_once 'adhead.php';?>
            <?php 
                if(isset($msg)){
                  echo $msg;
                }
            ?>
            <thead class="text-center bg-secondary text-light">
              <tr>
                <th>Serial No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
              </tr>
            </thead>
            <?php 
              $result = $ad->getUserList();
              if($result){
                $i=0;
                while ($value = mysqli_fetch_assoc($result)) {$i++; ?>
                      <tbody>
                        <tr>
                          <td><?php if($value['status']==0){ echo $i;} else { echo "<span style='color:red'>".$i."</span>";} ?></td>
                          <td><?php if($value['status']==1){ echo "<span style='color:red'>".$value['name']."</span>";} else { echo $value['name']; }?></td>
                          <td><?php if($value['status']==1){ echo "<span style='color:red'>".$value['email']."</span>";} else { echo $value['email']; }?></td>
                          <td class="text-center">
                          <?php if ($value['status']==0) {?>
                            <a onclick="return confirm('Do you want to disabled this user?')" class="btn btn-info" href="?dbl=<?php echo $value['userid'];?>">Disable</a> |
                         <?php } else { ?>  
                            <a onclick="return confirm('Do you want to enabled this user?')" class="btn btn-success" href="?ebl=<?php echo $value['userid'];?>">Enable</a> |
                         <?php } ?>
                            <a onclick="return confirm('Do you want to remove this user?')" class="btn btn-danger" href="?del=<?php echo $value['userid'];?>">Remove</a>
                        </td>
                           
                        </tr>
                      </tbody>       
                            

           <?php } } ?>
          </table>
      </div>
    </div>
  </div>
</body>
</html>

