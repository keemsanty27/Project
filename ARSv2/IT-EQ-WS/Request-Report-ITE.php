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
                            <a href="../Request/Create-Request" style="color: white;">Create Request</a>
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
                                <p>IT Equipment and Workstations History</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            

            <div class="line"></div>
            <div class="container" style="margin-left: auto; margin-right: auto;">
            <h1 style="align-self: center;">IT Equipment and Workstations History</h1>
            </div>
            <div class="line"></div>

          <div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="iframe-Request-Report-ITE.php" allowfullscreen></iframe>
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