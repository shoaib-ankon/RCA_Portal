
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








<!DOCTYPE html>
<html>
<head>
 <title>Update Tracker</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

 <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
   <script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>




</head>
<body>
 <h4  class="text-white text-center"> <a href="insert.php"> SOC RCA Input </a> </h4>
  <div class="container">
 <div class="col-lg-12">
 <br><br>
 
 <h1 class="text-warning text-center" > SOC View/Update </h1>

<form method="post" action="export.php">
     <input type="submit" name="export" class="btn btn-success" value="Export" />
    </form>


 <br>
 <table  id="tabledata" class=" table table-striped table-hover table-bordered">
 
 <tr class="bg-dark text-white text-center">
  <th> Serial </th>
 <th> Year </th>
 <th> Week No </th>
 <th> Incident Type </th>
 <th> Incident & Impact </th>
 <th> Reason in SOC FRN </th>
 <th> Outage Duration & Time</th>
  <th> Validated reason from RO </th>
  <th> Implemented Solution </th>
  <th> Way around to avoid in future </th>

 

  </tr >

  <?php

  include 'conn.php'; 
   $q = "select * from rcatable "; //loss table name

  $query = mysqli_query($con,$q);

  while($res = mysqli_fetch_array($query)){
 ?>
 <tr class="text-center">
  <td> <?php echo $res['serial'];  ?> </td>
 <td> <?php echo $res['year'];  ?> </td>
 <td> <?php echo $res['week'];  ?> </td>
 <td> <?php echo $res['type'];  ?> </td>
 <td> <?php echo $res['impact'];  ?> </td>
  <td> <?php echo $res['soc'];  ?> </td>
 <td> <?php echo $res['duration'];  ?> </td>
 <td> <?php echo $res['reason'];  ?> </td>
 <td> <?php echo $res['solution'];  ?> </td>
  <td> <?php echo $res['future'];  ?> </td>
 
 <td> <button class="btn-primary btn"> <a href="update1.php?serial=<?php echo $res['serial']; ?>" class="text-white"> Update </a> </button> </td>

  </tr>

  <?php 
 }
  ?>
 
 </table>  

  </div>
 </div>

  <script type="text/javascript">
 
 $(document).ready(function(){
 $('#tabledata').DataTable();
 }) 
 
 </script>

</body>
</html>