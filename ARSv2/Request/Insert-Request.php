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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Assistance Recording System</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../Assets/css/style5.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

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
                    <a href="../Home.php" data-toggle="collapse" aria-expanded="false">Home</a>
                    
                </li>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Requests</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="Create-Request" class="active">Create Request</a>
                        </li>
                        <li>
                            <a href="View-Request">View Requests</a>
                        </li>
                    </ul>

                </li>
                <li>
                     <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">IT Equipment and Workstations</a>
                     <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">Create new entry / View</a>
                        </li>
                        <li>
                            <a href="#">View History</a>
                        </li>
                        <li>
                            <a href="">Upload</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="../logout.php" class="article">Log Out</a>
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
                                <p>Request</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            

            <div class="line"></div>
            <div class="container" style="margin-left: auto; margin-right: auto;">
          <?php  
    
    
    
    if (isset($_POST['submit'])){
    
    $checkbox1 = implode(',',$_POST['ser']);
    $ser_tbox = $_POST['ser_others']; 
    $selectdd1 = $_POST['stname'];
     if(isset($_POST['utname'])){
          $checkbox2 = implode(',',$_POST['utname']);
     } else{
          $checkbox2 = NULL;  
     }
    $ut_tbox = $_POST['u_others'];
    $req_by_text = $_POST['requestedby'];
    $purp_by_text = $_POST['purp'];
    //$dnt_by_text = $_POST['dnt'];
    //echo $dnt_by_text;
    $div_text = $_POST['div'];
    //$act_text = $_POST['act'];
    $con_text = $_SESSION['username'];
    $selectdd2 = $_POST['stat'];
    $property_no = $_POST['property_no'];

  $query= "INSERT INTO request (ServiceType, serOthers, State, UnitType, utothers, Purpose, D_n_T, Req_By, Division, Acc_By, Status, property_no) 
  VALUES ('".$checkbox1."','".$ser_tbox."','".$selectdd1."','".$checkbox2."','".$ut_tbox."','".$purp_by_text."',current_timestamp(),'".$req_by_text."','".$div_text."','".$con_text."','".$selectdd2."','".$property_no."')";  
 //".$dnt_by_text."
  if(mysqli_query($link, $query)){
     echo "<div class='alert alert-success' role='alert'>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
           <strong>Succesfully requested!</strong></div>";
  } 
  else{
    echo mysqli_error($link);  
    echo "<div class='alert alert-danger' role='alert'><strong>Failed to insert record!</strong>";
    echo "<div class='container'>";
    }  
  }
?>    
      <br>
      <div class="container">
        <div class="row">
        <a class="btn btn-primary" href="create-request">Add another record</a>
      </div>
      <br>
      <div class="row">
        <a class="btn btn-primary" href="View-Request">Back</a>
      </div>
      </div>
            <div class="line"></div>

        </div>
    </div>

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