<?php

  include 'conn.php';

  if(isset($_POST['done'])){
 $serial=$_GET['serial'];  
 $year = $_POST['year'];
 $week = $_POST['week'];
 $type= $_POST['type'];
 $impact= $_POST['impact'];
 $soc=$_POST['soc'];
 $duration= $_POST['duration'];
 $reason= $_POST['reason'];
 $solution= $_POST['solution'];
 $future= $_POST['future'];

 
$q = " update rcatable set serial=$serial, year='$year',week='$week', type='$type', impact='$impact', soc= '$soc', duration= '$duration', reason= '$reason', solution= '$solution',future= '$future' where serial=$serial ";

  $query = mysqli_query($con,$q);

  header('location:display1.php');







}
?>


<?php 
include('conn.php');
    
   $serial = $_GET['serial'];
    $g = " SELECT `serial`, `year`, `week`, `type`, `impact`, `soc`, `duration`, `reason`,`solution`,`future` FROM `rcatable` WHERE serial=$serial";
    $res= mysqli_query($con, $g);
    $ed= mysqli_fetch_array($res);
    
    $serial = $ed['serial'];
    $year = $ed['year'];
    $week = $ed['week'];
    $type = $ed['type'];
    $impact  = $ed['impact'];
    $soc = $ed['soc'];
    $duration = $ed['duration'];
    $reason = $ed['reason'];
    $solution = $ed['solution'];
    $future = $ed['future'];

      

    



 ?>





<!DOCTYPE html>
<html>
<head>
 <title>Input</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>

  <div class="col-lg-6 m-auto">
 
 <form method="post">
 
 <br><br><div class="card">
 
 <div class="card-header bg-dark">
 <h1 class="text-white text-center"> Edit/Update </h1>
 </div><br>

  <label> Year </label>
 <input type="text" name="year" class="form-control"value="<?php echo $year; ?>"> <br>

<label> Week </label>
 <input type="text" name="week" class="form-control" value="<?php echo $week; ?>"> <br>

  <label> Incident Type </label>
 <input type="text" name="type" class="form-control" value="<?php echo $type; ?>"> <br>

 <label> Incident & Impact </label>
 <input type="text" name="impact" class="form-control " value="<?php echo $impact; ?>">> <br>
 <label> Reason in SOC FRN </label>
 <input type="text" name="soc" class="form-control" value="<?php echo $soc; ?>"> <br>
 <label> Outage Duration & Time </label>
 <input type="text" name="duration" class="form-control" value="<?php echo $duration; ?>"> <br>
 <label> Validated reason from RO </label>
 <input type="text" name="reason" class="form-control" value="<?php echo $reason; ?>" readonly> <br>
 <label> Implemented Solution </label>
 <input type="text" name="solution" class="form-control" value="<?php echo $solution; ?>" readonly> <br>
 <label> Way around to avoid in future </label>
 <input type="text" name="future" class="form-control" value="<?php echo $future; ?>" readonly> <br>
  <br>

    <button class="btn btn-success" type="submit" name="done"> Submit </button><br>

  </div>
 </form>
 </div>
</body>
</html>


