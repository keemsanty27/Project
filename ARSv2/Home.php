<?php
session_start();

require("config.php");

if ( isset( $_SESSION['username'] ) ) {

} else {
    
    header("Location:Login");
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
     <link rel="icon" href="favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Assistance Recording System</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="Assets/css/style5.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Righteous&display=swap" rel="stylesheet">


<!--link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"-->


<style type="text/css">
    
.clock {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translateX(-50%) translateY(-50%);
    color: #2A3972;
    font-size: 60px;
    font-family: 'Righteous', cursive;
    letter-spacing: 7px;
}

p{
    font-size: 15px;
    font-weight: bold;
    color: #000000;
}

.res{
    color: #2A3972; 
    font-size: 20px;
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
                <li class="active">
                    <a href="Home.php">Home</a>
                    
                </li>
                <li>
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Requests</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="Request/Create-Request" class="active">Create Request</a>
                        </li>
                        <li>
                            <a href="Request/View-Request">View Requests</a>
                        </li>
                    </ul>

                </li>
                <li>
                     <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">IT Equipment and Workstations</a>
                     <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="IT-EQ-WS/IT-EQ-Form.php">Create new entry / View</a>
                        </li>
                        <li>
                            <a href="IT-EQ-WS/IT-Equipment-His.php">View History</a>
                        </li>
                        <li>
                            <a href="IT-EQ-WS/CSV-Upload-EQ.php">Upload</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="Logout.php" class="article">Log Out</a>
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
                            <li>
                                        <p>Date: </p>
                                         <div id="res" style="font-size: 15px; font-weight: bold;">res</div>
  <script>
      function formatDate(date) {
    var d = new Date(),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;

    return [month, day, year].join('/');
}
document.getElementById('res').innerHTML =  formatDate('Sun May 11,2014') ;
  </script>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            

            <div class="line"></div>
            <div class="container w3-animate-bottom" style="text-align: center">
            <h1 style="align-self: center; color: #2A3972; font-size: 50px; font-weight: bold;">Welcome to Assistance Recording System!<img src="Assets/img/pngwave.png" style="margin-left: auto; margin-right: auto; width: 90px; height: 90px;"></h1>
             <div id="DigitalCLOCK" style="text-align: center; font-size: 70px; font-weight: bold;" onload="showTime()"></div>
            </div>
            <div class="line"></div>

           
  <script>
      function showTime(){
    var date = new Date();
    var h = date.getHours(); 
    var m = date.getMinutes(); 
    var s = date.getSeconds(); 
    var session = "AM";
    
    if(h == 0){
        h = 12;
    }
    
    if(h > 12){
        h = h - 12;
        session = "PM";
    }
    
    h = (h < 10) ? "0" + h : h;
    m = (m < 10) ? "0" + m : m;
    s = (s < 10) ? "0" + s : s;
    
    var time = h + ":" + m + ":" + s + " " + session;
    document.getElementById("DigitalCLOCK").innerText = time;
    document.getElementById("DigitalCLOCK").textContent = time;
    
    setTimeout(showTime, 1000);
    
}
 
showTime();
  </script>



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

<!-- MNWD ICT, SALAMAT SA GABOS! -Keem -->
<!-- © 2020 | Francis Joachim P. Santy-->
