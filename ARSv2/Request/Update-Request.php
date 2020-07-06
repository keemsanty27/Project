<!-- Bootstrap CSS CDN -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../Assets/css/style5.css">
<?php

require("../config.php");

if(isset($_POST['update'])){
 
  $ID = $_GET['ID'];

  $query1 = "select Req_By from request WHERE ID='".$ID."'";
  $result1 = mysqli_query($link, $query1);
  while($row=mysqli_fetch_assoc($result1)){
    $Req_By = $row['Req_By'];

  
  $ServiceType = $_POST['ServiceType'];
  $ServiceTypeB = implode(",",$ServiceType);
  $serOthers = $_POST['serOthers'];
  $State = $_POST['State'];
  $UnitType = $_POST['UnitType'];
  $UnitTypeB = implode(",",$UnitType);
  $utothers = $_POST['utothers'];
  $Purpose = $_POST['Purpose'];
  $Act = $_POST['Act'];
  $dtAcc = $_POST['dtAcc'];
  $Status = $_POST['Status'];

  $signature = $_POST['signature'];
  $signature = str_replace('data:image/png;base64,', '', $signature);
  $signature = str_replace(' ', '+', $signature);
  $data = base64_decode($signature);
  $file = '../signatures/'.preg_replace('/[^a-zA-Z0-9]/','',$Req_By).'_'.preg_replace('/[^a-zA-Z0-9]/','',$dtAcc).'.png';
  file_put_contents($file, $data);

  $query = "UPDATE request SET 
            ServiceType = '".$ServiceTypeB."', 
            serOthers = '".$serOthers."',
            State = '".$State."',
            UnitType = '".$UnitTypeB."',
            utothers = '".$utothers."',
            Purpose = '".$Purpose."',
            Act = '".$Act."',
            signfile = '".$file."',
            Status = '".$Status."',
            dtAcc = '".$dtAcc."'
            WHERE ID = '".$ID."'";

  $result = mysqli_query($link, $query);

  if($result){
      echo "<div class='alert alert-success' role='alert'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
         <strong>Succesfully Updated!</strong></div> 
         <a href='iframe-view-requests'>< Back</a>";
      //header("Location:iframe-view-request");
  } else{
     
     echo mysqli_error($link);  
      echo "<div class='alert alert-danger' role='alert'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
         <strong>Failed to Update!</strong></div>
         <a href='iframe-view-requests'>< Back</a>"; 
     // header("Location:iframe-view-request");
      }  
}
}

?>
<!-- © 2020 | Francis Joachim P. Santy-->
