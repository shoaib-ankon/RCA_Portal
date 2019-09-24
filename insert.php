<?php
    session_start();

    if(isset($_SESSION['User']))
    {
        echo ' Logged in ' . $_SESSION['User'].'<br/>';
        echo '<a href="logout.php?logout">Logout</a>';
    }
    else
    {
        header("location:index.php");
    }



?>






<?php

include 'conn.php';



if(isset($_POST['done'])){

 $year = $_POST['year'];
 $week = $_POST['week'];
 $type= $_POST['type'];
 $impact= $_POST['impact'];
 $soc=$_POST['soc'];
 $duration= $_POST['duration'];
 $reason= $_POST['reason'];
  $solution= $_POST['solution'];
   $future= $_POST['future'];

 $q = " INSERT INTO `rcatable`(`year`, `week`,`type`,`impact`,'soc',`duration`,`reason`,`solution`,`future`) VALUES ( '$year', '$week','$type', '$impact','$soc', '$duration', '$reason','$solution','$future')";

  $query = mysqli_query($con,$q);
}
?>



<!DOCTYPE html>
<html>
<head>
 <title>Tracker- Packet Loss</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


</head>
<body>




  <div class="col-lg-6 m-auto">
 


 <form method="post">
 <h4  class="text-white text-center"> <a href="display1.php"> SOC RCA View/Edit </a> </h4>
 <br><br><div class="card">
 
 <div class="card-header bg-dark">
 <h1 class="text-white text-center">  RCA Input </h1>
  

 </div><br>

  <label> Year </label>
 
<select name="year">
    <option value="2019">2019</option>
    <option value="2020">2020</option>
    <option value="2021">2021</option>
    <option value="2022">2022</option>
    <option value="2023">2023</option>
  </select>
  <br>

<label> Week </label>
 <select>
<?php
    for ($i=1; $i<=52; $i++)
    {
        ?>
            <option value="<?php echo $i;?>"><?php echo $i;?></option>
        <?php
    }
?>
</select> <br>

  <label> Incident Type </label>
 <input type="text" name="type" class="form-control"> <br>

 <label> Incident & Impact </label>
 <input type="text" name="impact" class="form-control"> <br>
 <label> Reason in SOC FRN </label>
 <input type="text" name="soc" class="form-control"> <br>
 <label> Outage Duration & Time </label>
 <input type="text" name="duration" class="form-control"> <br>
 <label> Validated reason from RO </label>
 <input type="text" name="reason" class="form-control"> <br>
 <label> Implemented Solution </label>
 <input type="text" name="solution" class="form-control"> <br>
 <label> Way around to avoid in future </label>
 <input type="text" name="future" class="form-control"> <br>
  <br>

  <button class="btn btn-success" type="submit" name="done" onclick="alert('Submitted Successfully')"> Submit </button><br>

  </div>
 </form>
 </div>
</body>
</html>
