<?php
session_start();

require("../config.php");

if ( isset( $_SESSION['username'] ) ) {

} else {
    
    header("Location: ../Login");
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Assistance Recording System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../ARSv1/favicon.ico">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="responsiveness.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>



<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.4/js/dataTables.responsive.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.4/css/responsive.dataTables.min.css">  
  
  <style> 
.nav-bar-color{
background-color:#f5f5f5;
}

.h3-font-col{
color:#ffffff;
}

.span-ask{
color: red;
}

.fbox-cbox{
display: inline-flex;
flex-direction: row;
justify-content: center;
align-content: space-around;
flex-basis: 6rem;
}

th{
font-size: 12px;
}

td{
font-size: 11px;
}

div.dataTables_filter, div.dataTables_length {
  padding: 10px;
}

</style>
</head>

<body>
  
  <!--white bd start-->
<div class="py-5" style=" background-size: cover, 100%; background-position: top left, top left;  background-repeat: repeat, repeat;  background-color:#ffffff;">

  <!--tab nav-->
  <div class="container">
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#it_eq"><i class="fa fa-plus"></i>&nbsp; Add IT Equipment</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu1"><i class="fa fa-eye"></i>&nbsp; View IT Equipment</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu2"><i class="fa fa-plus"></i>&nbsp; Add Workstation</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu3"><i class="fa fa-eye"></i>&nbsp; View Workstation</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="it_eq" class="container tab-pane active">
      <br>
    
      <h3>Add IT Equipment</h3>

      <br>
       <!--form start-->
<form action="iframe-EQ-Form" method="POST" id="it_eq" autocomplete="off">    
  <!--insert to db-->
 <?php  
    
    if (isset($_POST['submit1'])){
    
    $peripheral_type = implode(',',$_POST['peripheral_type']);
    $peripheral_typeOther = $_POST['peripheral_typeOther']; 
    $serial_no = $_POST['serial_no'];
    $date_acquired = $_POST['date_acquired'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $description = $_POST['description'];
    $assigned_to = $_POST['assigned_to'];
    $property_no = $_POST['property_no'];


  $query= "INSERT INTO it_peripherals (peripheral_type, peripheral_typeOther, serial_no, date_acquired, brand, model, description, assigned_to, property_no) 
  VALUES ('".$peripheral_type."','".$peripheral_typeOther."','".$serial_no."','".$date_acquired."','".$brand."','".$model."','".$description."','".$assigned_to."','".$property_no."')";  
 
  if(mysqli_query($link, $query)){
     echo "<div class='alert alert-success' role='alert'>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
           <strong>Succesfully added to the database!</strong></div> 
          </div><meta http-equiv='refresh' content='1'>"; 
  } 
  else{
    echo mysqli_error($link);  
    echo "<div class='alert alert-danger' role='alert'><strong>Failed to insert record!</strong></div>";
        
    }  
  }
?>    
  <!--Peripheral Type-->  
    <h3 class="container">Peripheral Type:<span class="span-ask">*</span></h3>
    <div class="container">
      <div class="form-check">
        <div class="row">
         <?php
    $query = "SELECT unit_name from unittype";
    $result =mysqli_query($link,$query) or die(mysqli_error($link));
    $count = 0;
    while($row = $result->fetch_assoc()) {
                          $count++;
                          $ptype = $row["unit_name"];
    ?>  
    <?php
        echo "<div class='col-sm' required>";
        echo "<input class='form-check-input' type='checkbox' name='peripheral_type[]' style='white-space: nowrap;' value='".$ptype."'>";
    ?>
        <?php 
        echo "<div class='fbox-cbox'>";
        echo $ptype;
        echo "</div>";
        ?>
        <?php echo "</div>"; ?>
    <?php } ?>  
        <div class="fbox-cbox">
        :<input type="text" class="form-control-sm" name="peripheral_typeOther">
        </div>
       </div>
      </div>
    </div>
      <br>

  <!--Serial No. container-->  
      <div class="container">
        <div class="form-group">
          <label for="exampleFormControlSelect1">
            <h3>Serial Number:<span class="span-ask">*</span></h3>
          </label>
          <input type="text" class="form-control" name="serial_no" id="requestedby" required>
        </div>
      </div>

  <!--date acquired container-->
  <div class="container">
      <h3>Date Acquired:<span class="span-ask">*</span></h3>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
            <input id="datepicker" name="date_acquired" width="276"  placeholder="MM/DD/YYYY" required/>
                    </div>
                </div>
            </div>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript">
            $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
                });
        </script>
    </div>

        <br>

  <!--brand container-->
      <div class="container">
        <div class="form-group">
          <label for="exampleFormControlSelect1">
            <h3>Brand:<span class="span-ask">*</span></h3>
          </label>
          <input type="text" class="form-control" name ="brand" id="exampleFormControlTextarea1" rows="3" required>
        </div>
      </div>
      <br>

     <!--Model container-->   
     <div class="container">
        <div class="form-group">
          <label for="exampleFormControlSelect1">
            <h3>Model:<span class="span-ask">*</span></h3>
          </label>
          <input type="text" class="form-control" name="model" id="requestedby" required>
        </div>
      </div>
      <br>
    
    <!--Description container-->   
     <div class="container">
        <div class="form-group">
          <label for="exampleFormControlSelect1">
            <h3>Description:<span class="span-ask">*</span></h3>
          </label>
          <textarea class="form-control" name="description" id="description" required></textarea>
        </div>
      </div>
    <br>

    <!--Assigned to container-->   
    <div class="container">
        <div class="form-group">
          <label for="exampleFormControlSelect1">
            <h3>Assigned To:<span class="span-ask">*</span></h3>
          </label>
          <input type="text" class="form-control" name="assigned_to" id="assigned_to" required>
        </div>
      </div>
    <br>

    <!--Property No. container-->   
    <div class="container">
        <div class="form-group">
          <label for="exampleFormControlSelect1">
            <h3>Property Number:<span class="span-ask">*</span></h3>
          </label>
          <input type="text" class="form-control" name="property_no" id="property_no" required>
        </div>
      </div>
    <br>
    
    <!--buttons container-->
      <div class="container">
        <button type="submit" name="submit1" class="btn btn-primary" id="btn-save">Submit</button>
        <button type="reset" class="btn btn-primary">Reset</button>
      </div>

      <br>
      <div class="container">
      <span class="span-ask">* - required fields</span>
    </div>
  </form>

    <!--end of form-->
    </div>



<!--View IT Equipment--->
    <div id="menu1" class="container tab-pane fade"><br>
    <div class="row">
      <h3>View IT Equipment</h3>
      <br>
      <br>
      <?php
if(isset($_POST['update'])){

    $id = $_GET['ID'];
    $peripheral_type = $_POST['peripheral_type'];
    $peripheral_typeB = implode(",",$peripheral_type);
    $peripheral_typeOther = $_POST['peripheral_typeOther'];
    $serial_no = $_POST['serial_no'];
    $date_acquired = $_POST['date_acquired'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $description = $_POST['description'];
    $assigned_to = $_POST['assigned_to'];
    $property_no = $_POST['property_no'];

    $query = "UPDATE it_peripherals SET 
              peripheral_type = '".$peripheral_typeB."', 
              peripheral_typeOther = '".$peripheral_typeOther."',
              serial_no = '".$serial_no."',
              date_acquired = '".$date_acquired."',
              brand = '".$brand."',
              model = '".$model."',
              description = '".$description."',
              assigned_to = '".$assigned_to."',
              property_no = '".$property_no."'
              WHERE id = '".$id."'";

    $result = mysqli_query($link, $query);

    if($result){
        echo "<div class='alert alert-success' role='alert'>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
           <strong>Succesfully Updated!</strong></div> <meta http-equiv='refresh' content='3'>";
        
    } else{
       echo mysqli_error($link);  
        echo "<div class='alert alert-danger' role='alert'>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
           <strong>Failed to Update!</strong></div> <meta http-equiv='refresh' content='3'>"; 
       
        }  
}


?>
      <div class="table-responsive">
      <table id="myTable" class="table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Peripheral Type</th>
                <th>Peripheral Type Other</th>
                <th>Serial No.</th>
                <th>Date Acquired</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Description</th>
                <th>Assigned To</th>
                <th>Property No.</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = mysqli_query($link, "Select * from it_peripherals");

            $i = 1;
            while($row = mysqli_fetch_assoc($result)){ ?>
            
              <tr id='<?php $row["id"]?>'>
           <?php
                echo '
              <td><b>'.$i++.'</b></td>
              <td>'.$row["peripheral_type"].'</td>
              <td>'.$row["peripheral_typeOther"].'</td>
              <td>'.$row["serial_no"].'</td>
              <td>'.$row['date_acquired'].'</td>
              <td>'.$row['brand'].'</td>
              <td>'.$row["model"].'</td>
              <td>'.$row['description'].'</td>
              <td>'.$row["assigned_to"].'</td>
              <td>'.$row['property_no'].'</td>'; 
            ?>
            <td><a href="IT-EQ-Edit.php?GetID=<?php echo $row['id'];?>" type="button" class="btn btn-success editbtn"><i class="fa fa-pencil-square-o"></i></a></td>
           
          <?php    
          }
            ?>
            </tr>
        </tbody>
    </table>
    </div>
    <br>
    <a class="btn btn-primary" href="Equipment-Report"><i class="fa fa-line-chart"></i>&nbsp;Generate a Report</a>
  
    <script>
    $(document).ready(function(){
        $("#myTable").DataTable({
  "columnDefs": [{ "orderable": false, "targets": -1 }],
  "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
  });
    });
    </script>

  </div>
    </div>

<!--Table End-->

<!--form start-->
    <div id="menu2" class="container tab-pane fade"><br>
      <h3>Add Workstation</h3>
      <br>
<?php  
    
    if (isset($_POST['submit2'])){

    $date_acquired = $_POST['date_acquired'];
    $os = $_POST['os']; 
    $division = $_POST['division'];
    $network = $_POST['network'];
    $description = $_POST['description'];
    $assigned_to = $_POST['assigned_to'];
    $property_no = $_POST['property_no'];


  $query= "INSERT INTO it_workstation (date_acquired, os, division, network, description, assigned_to, property_no) 
  VALUES ('".$date_acquired."', '".$os."', '".$division."', '".$network."', '".$description."', '".$assigned_to."', '".$property_no."')";  
 
  if(mysqli_query($link, $query)){
     echo "<div class='alert alert-success' role='alert'>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
           <strong>Succesfully added to the database!</strong></div><meta http-equiv='refresh' content='3'>";
  } 
  else{
    echo mysqli_error($link);  
    echo "<div class='alert alert-danger' role='alert'><strong>Failed to insert record!</strong></div><meta http-equiv='refresh' content='3'>";
    }  
  }
?>    
      <form action="iframe-EQ-Form.php" method="POST" id="signatureform" autocomplete="off">    
  
  <!--Property No. container-->  
      <div class="container">
        <div class="form-group">
          <label for="exampleFormControlSelect1">
            <h3>Property Number:<span class="span-ask">*</span></h3>
          </label>
          <input type="text" class="form-control" name="property_no" id="requestedby" required>
        </div>
      </div>

  <!--date acquired container-->
  <div class="container">
      <h3>Date Acquired:<span class="span-ask">*</span></h3>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
            <input id="datepickerws" name="date_acquired" width="276"  placeholder="MM/DD/YYYY" required/>
                    </div>
                </div>
            </div>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

        <script type="text/javascript">
            $('#datepickerws').datepicker({
            uiLibrary: 'bootstrap4'
                });
        </script>
    </div>

        <br>

  <!--OS container-->
      <div class="container">
        <div class="form-group">
          <label for="exampleFormControlSelect1">
            <h3>Operating System:<span class="span-ask">*</span></h3>
          </label>
          <input type="text" class="form-control" name ="os" id="exampleFormControlTextarea1" rows="3" required>
        </div>
      </div>
      <br>

     <!--Division container-->   
     <div class="container">
        <div class="form-group">
          <label for="exampleFormControlSelect1">
            <h3>Division:<span class="span-ask">*</span></h3>
          </label>
          <input type="text" class="form-control" name="division" id="requestedby" required>
        </div>
      </div>
      <br>
    
    <!--Description container-->   
     <div class="container">
        <div class="form-group">
          <label for="exampleFormControlSelect1">
            <h3>Description:<span class="span-ask">*</span></h3>
          </label>
          <textarea class="form-control" name="description" id="description" required></textarea>
        </div>
      </div>
    <br>

    <!--Assigned to container-->   
    <div class="container">
        <div class="form-group">
          <label for="exampleFormControlSelect1">
            <h3>Assigned To:<span class="span-ask">*</span></h3>
          </label>
          <input type="text" class="form-control" name="assigned_to" id="assigned_to" required>
        </div>
      </div>
    <br>

    <!--Network container-->   
    <div class="container">
        <div class="form-group">
          <label for="exampleFormControlSelect1">
            <h3>Network:<span class="span-ask">*</span></h3>
          </label>
          <input type="text" class="form-control" name="network" id="network" required>
        </div>
      </div>
    <br>
    
    <!--buttons container-->
      <div class="container">
        <button type="submit" name="submit2" class="btn btn-primary" id="btn-save">Submit</button>
        <button type="reset" class="btn btn-primary">Reset</button>
      </div>

      <br>
      <div class="container">
      <span class="span-ask">* - required fields</span>
    </div>
  </form>
    </div>

<!--Table start-->
    <div id="menu3" class="container tab-pane fade"><br>
      <h3>View Workstation</h3>
      <br>
      <br>
      <?php

if(isset($_POST['update2'])){

    $id = $_GET['ID'];
    $date_acquired = $_POST['date_acquired'];
    $os = $_POST['os'];
    $division = $_POST['division'];
    $network = $_POST['network'];
    $description = $_POST['description'];
    $assigned_to = $_POST['assigned_to'];
    $property_no = $_POST['property_no'];

    $query = "UPDATE it_workstation SET 
              date_acquired = '".$date_acquired."',
              os = '".$os."',
              division = '".$division."',
              network = '".$network."',
              description = '".$description."',
              assigned_to = '".$assigned_to."',
              property_no = '".$property_no."'
              WHERE id = '".$id."'";

    $result = mysqli_query($link, $query);

    if($result){
        echo "<div class='alert alert-success' role='alert'>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
           <strong>Succesfully Updated!</strong></div><meta http-equiv='refresh' content='3'>";
    } else{
       echo mysqli_error($link);  
        echo "<div class='alert alert-danger' role='alert'>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
           <strong>Failed to Update!</strong></div><meta http-equiv='refresh' content='3'>";
        }  
}


?>
    <div class="table-responsive">
      <table id="myTable2" class="table-responsive-lg table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Date Acquired</th>
                <th>OS</th>
                <th>Division</th>
                <th>Network</th>
                <th>Description</th>
                <th>Assigned To</th>
                <th>Property No.</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = mysqli_query($link, "Select * from it_workstation");

            $i = 1;
            while($row = mysqli_fetch_assoc($result)){ ?>
            
              <tr id='<?php $row["id"]?>'>
           <?php
                echo '
              <td><b>'.$i++.'</b></td>
              <td>'.$row['date_acquired'].'</td>
              <td>'.$row['os'].'</td>
              <td>'.$row["division"].'</td>
              <td>'.$row["network"].'</td>
              <td>'.$row['description'].'</td>
              <td>'.$row["assigned_to"].'</td>
              <td>'.$row['property_no'].'</td>'; 
            ?>
              <td><a href="IT-WS-Edit.php?GetID=<?php echo $row['id'];?>" type="button" class="btn btn-success editbtn"><i class="fa fa-pencil-square-o"></i></a></td>
           
          <?php    
          }
            ?>
            </tr>
        </tbody>
    </table>
        </div>

    <br>
    <a class="btn btn-primary" href="workstation-report"><i class="fa fa-line-chart"></i>&nbsp;Generate Report</a>
  
    <script>
    $(document).ready(function(){
        $("#myTable2").DataTable({
  "columnDefs": [{ "orderable": false, "targets": -1 }],
  "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
  responsive: true
  
      });
    });
    </script>
    </div>
  
  </div>
</div>
 
</body>
</html>
<!-- © 2020 | Francis Joachim P. Santy-->