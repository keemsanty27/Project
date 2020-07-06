<?php
session_start();

require("../config.php");

if ( isset( $_SESSION['username'] ) ) {

} else {
    
    header("Location:../Login");
}

$id = $_GET['GetID'];
$query = "select * from it_workstation WHERE id='".$id."'";
$result = mysqli_query($link, $query);

while($row=mysqli_fetch_assoc($result)){
    $id = $row['id'];
    $date_acquired = $row['date_acquired'];
    $os = $row['os'];
    $division = $row['division'];
    $network = $row['network'];
    $description = $row['description'];
    $assigned_to = $row['assigned_to'];
    $property_no = $row['property_no'];
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Assitance Recording System</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../Assets/css/style5.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <!--Added stuff-->
    <script type="text/javascript" src="ddtf.js"></script>
    <script type="text/javascript" src="jquery.filtertable.min.js"></script>
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="jquery.tabledit.js"></script>
    <script type="text/javascript" src="jquery.tabledit.min.js"></script>
    <script type="text/javascript" src="samples-common.js"></script>
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

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

            <div class="line"></div>
            <div class="container" style="margin-left: auto; margin-right: auto;">
        <!--form start-->
  <form action="iframe-EQ-Form.php?ID=<?php echo $id?>" method="POST" autocomplete="off">   

    <!--date acquired container-->
    <div class="container">
      <h3>Date Acquired:</h3>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
            <input id="datepicker" name="date_acquired" width="276" value="<?php echo $date_acquired;?>"required/>
                    </div>
                </div>
            </div>
        <script type="text/javascript">
            $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
                });
        </script>
    </div>
        <br>

  <!--OS container-->
      <div class="container">
        <div class="form-group">
          <label for="exampleFormControlSelect1">
            <h3>Operating System:</h3>
          </label>
          <input type="text" class="form-control" name ="os" rows="3" value="<?php echo $os;?>" required>
        </div>
      </div>
      <br>

     <!--Division container-->   
     <div class="container">
        <div class="form-group">
          <label for="exampleFormControlSelect1">
            <h3>Division:</h3>
          </label>
          <input type="text" class="form-control" name="division" value="<?php echo $division;?>" >
        </div>
      </div>
      <br>

       <!--Network container-->   
     <div class="container">
        <div class="form-group">
          <label for="exampleFormControlSelect1">
            <h3>Network:</h3>
          </label>
          <input type="text" class="form-control" name="network" value="<?php echo $network;?>" >
        </div>
      </div>
      <br>
      
     <!--Description container-->
      <div class="container">
        <div class="form-group">
          <label for="exampleFormControlSelect1">
            <h3>Description:</h3>
          </label>
          <input type="text" class="form-control" name="description" rows="3" value="<?php echo $description;?>" required>
        </div>
      </div>
      <br>
    
      <!--Assigned to container-->
      <div class="container">
        <div class="form-group">
          <label for="exampleFormControlSelect1">
            <h3>Assigned To:</h3>
          </label>
          <input type="text" class="form-control" name="assigned_to" rows="3" value="<?php echo $assigned_to;?>" required>
        </div>
      </div>
      <br>

      <!--Property no container-->  
      <div class="container">
        <div class="form-group">
          <label for="exampleFormControlSelect1">
            <h3>Serial Number:</h3>
          </label>
          <input type="text" class="form-control" name="property_no" value="<?php echo $property_no;?>" >
        </div>
      </div>
      <br>
   
    
    <!--buttons container-->
      <div class="container">
        <button type="update" name="update2" class="btn btn-primary" id="btn-save">Update</button>
        <button type="reset" class="btn btn-primary">Reset</button>
        <a href="iframe-EQ-Form" class="btn btn-secondary">Back</a>
      </div>
  </form>

    <!--end of form-->
        </div>
    </div>
</body>

</html>
<!-- © 2020 | Francis Joachim P. Santy-->