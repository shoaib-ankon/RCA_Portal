<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "rcamain"); //database name
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM rcatable"; //rcatable is table name
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>Serial</th>  
                         <th>Year</th>  
                         <th>Week No</th>
                         <th>Incident Type</th>
                         <th>Incident & Impact</th>
                         <th>Reason in SOC FRN</th>
                         <th>Outage Duration & Time</th>
                          <th>Validated reason from RO</th>
                          <th>Implemented Solution</th>
                          <th>Way around to avoid in future</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["serial"].'</td>  
                         <td>'.$row["year"].'</td>  
                         <td>'.$row["week"].'</td>  
                         <td>'.$row["type"].'</td>  
                        <td>'.$row["impact"].'</td>
                          <td>'.$row["soc"].'</td>
                            <td>'.$row["duration"].'</td>
                               <td>'.$row["reason"].'</td>
                                  <td>'.$row["solution"].'</td>
                                  <td>'.$row["future"].'</td>
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}
?>