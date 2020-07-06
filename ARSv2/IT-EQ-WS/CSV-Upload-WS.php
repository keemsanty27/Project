<?php
session_start();

require("../config.php");

if ( isset( $_SESSION['username'] ) ) {

} else {
    
    header("Location:../Login");
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
     <link rel="icon" href="favicon.ico">

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
    <script type="text/javascript" src="jquery.js"></script>

    <!--datatable-->

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.dataTables.min.css">

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
   
    
    

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

    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Assistance Recording System v2</h3>
            </div>

            <ul class="list-unstyled components">
                <p>Hello, <b><?php echo $_SESSION['username']?></b></p>
                <li>
                    <a href="../Home.php" style="color: white;">Home</a>
                    
                </li>
                <li>
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" style="color: white;">Requests</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="../Request/Create-Request" style="color: white;" >Create Request</a>
                        </li>
                        <li>
                            <a href="../Request/View-Request" style="color: white;">View Requests</a>
                        </li>
                    </ul>

                </li>
                <li  class="active">
                     <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">IT Equipment and Workstations</a>
                     <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="IT-EQ-Form.php" style="color: white;">Create new entry / View</a>
                        </li>
                        <li>
                            <a href="IT-Equipment-His" style="color: white;">View History</a>
                        </li>
                        <li>
                            <a href="" style="color: white;">Upload</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="../Logout.php" class="article">Log Out</a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <div class="py-3">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    © 2020 | Francis Joachim P. Santy
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
        </nav>

        <!-- Page Content Holder -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <p>IT Equipment and Workstations Upload</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

<nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../Home" style="color:#374ea7;">Home</a></li>
        <li class="breadcrumb-item active"><a href="CSV-Upload-WS">IT Equipment and Workstations Upload</a></li>
    </ol>
</nav>
            

            <div class="line"></div>
            <div class="container" style="margin-left: auto; margin-right: auto;">
            <h1 style="align-self: center;">IT Equipment and Workstations Upload</h1>
            </div>
            <div class="line"></div>

<div class="container">
  <ul class="nav nav-pills">
    <li class="nav-item">
      <a class="nav-link" href="CSV-Upload-EQ">Upload IT Peripherals</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="CSV-Upload-WS">Upload IT Workstation</a>
    </li>
  </ul>
</div>
<br>

  <div class="container">
<h1> Upload IT Workstation as CSV: </h1>
</div>
   
    <div class="container">
        <h3>How to upload: </h3>
        <p style="color: black">
       <b>1.</b>  Open MS Excel <br>
       <b>2.</b>  Fill up cells A-G <br>
       <b>3.</b>  Fill up cells in this order:<br>
        <ol>
            <li> Date Acquired (MM/DD/YYYY)</li>
            <li> Operating System</li>
            <li> Division</li>
            <li> Network</li>
            <li> Description</li>
            <li> Assigned to</li>
            <li> Property Number</li>
        </ol> 
        <img src="sample5.png" style="width: 900px"><br>
        <b>4.</b> Save the file as "IT_ws.csv" and upload.<br><br>

        <p style="color: black">Download the template <a href="download-eq.php?file=IT_ws.csv" style="color: blue">here</a>.</p>

        </p><br>
        <form action="CSV-Upload-WS.php" method="POST" enctype="multipart/form-data">
            <label><b>Upload CSV:</b></label>
            <div class="file-upload-wrapper">
            <input type="file" name="file" required/>
            </div>
            <br>
            <button type="submit" name="submit" value="import" class="btn btn-primary">Upload File</button>
        </form>
    </div><br>

    <?php  
 
 if(isset($_POST['submit'])){
    $target_dir = "uploads/";
    $target_file = $target_dir.basename($_FILES["file"]["name"]);
 
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
 
    $uploadOk = 1;
    if($imageFileType != "csv" ) {
      $uploadOk = 0;
    }
 
    if ($uploadOk != 0) {
       if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
 
         // Checking file exists or not
         //$target_file = $target_dir . 'importfile.csv';
         $fileexists = 0;
         if (file_exists($target_file)) {
            $fileexists = 1;
         }
         if ($fileexists == 1 ) {
 
            // Reading file
            $file = fopen($target_file,"r");
            $i = 0;
 
            $importData_arr = array();
                        
            while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
              $num = count($data);
 
              for ($c=0; $c < $num; $c++) {
                 $importData_arr[$i][] = $data[$c];
              }
              $i++;
            }
            fclose($file);
            echo "<div class='alert alert-success' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
             <strong>Succesfully added to the database!</strong></div>";  
 
            $skip = 0;
            // insert import data
            foreach($importData_arr as $data){
               if($skip != 0){
                $date_acquired = $data[0];
                $os = $data[1];
                $division = $data[2];
                $network = $data[3];
                $decription = $data[4];
                $assigned_to = $data[5];
                $property_no = $data[6];

                  // Checking duplicate entry
                  $sql = "select count(*) as allcount from it_workstation where property_no='" . $property_no . "' ";
 
                  $retrieve_data = mysqli_query($link,$sql);
                  $row = mysqli_fetch_array($retrieve_data);
                  $count = $row['allcount'];
 
                  if($count == 0){
                     // Insert record
                     $insert_query = "INSERT INTO it_workstation (date_acquired, os, division, network, description, assigned_to, property_no) 
                     VALUES ('".$date_acquired."', '".$os."', '".$division."', '".$network."', '".$decription."', '".$assigned_to."', '".$property_no."')";
                     mysqli_query($link,$insert_query);
                  }
               }
               $skip ++;
            }
            $newtargetfile = $target_file;
            if (file_exists($newtargetfile)) {
               unlink($newtargetfile);
            }
          }
 
       }
    }
 }

?>    



    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
    </script>

</body>

</html>
<!-- © 2020 | Francis Joachim P. Santy-->