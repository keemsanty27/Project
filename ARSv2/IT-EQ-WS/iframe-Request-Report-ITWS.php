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
  <link rel="icon" href="favicon.ico">
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
         <!--form start-->
         <h2>Generate IT Workstation History Report</h2>
<form action="jspdf-dump-ITWShis.php" method="POST" id="signatureform" autocomplete="off">    
  
  <!--date start-->
  <div class="container">
      <h3>Date Start:<span class="span-ask">*</span></h3>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
            <input id="datepickerstart2" name="date_start2" width="276"  placeholder="MM/DD/YYYY" required/>
                    </div>
                </div>
            </div>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" /-->
        <script type="text/javascript">
            $('#datepickerstart2').datepicker({
              dateFormat: "yy-mm-dd",
                });
        </script>

</div>

        <br>

  <!--date end-->
  <div class="container">
      <h3>Date End:<span class="span-ask">*</span></h3>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
            <input id="datepickerend2" name="date_end2" width="276"  placeholder="MM/DD/YYYY" required/>
                    </div>
                </div>
            </div>
<!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" /-->
        <script type="text/javascript">
            $('#datepickerend2').datepicker({
              dateFormat: "yy-mm-dd",
                });
        </script>
    </div>

<!--status of the request-->
<div class="container">
        <div class="form-group">
          <label for="exampleFormControlSelect1">
            <h3>Property Number:<span class="span-ask">*</span></h3>
          </label>
          <input type="text" style="width: 300px;" class="form-control" name="prop_no" id="assigned_to" required>
        </div>
      </div>

    <!--buttons container-->
      <div class="container">
        <button type="submit" name="submit" class="btn btn-primary" id="btn-save">Submit</button>
        <button type="reset" class="btn btn-primary">Reset</button>
      </div>

      <br>
      <div class="container">
      <span class="span-ask">* - required fields</span>
    </div>
  </form>

    <!--end of form-->
    </div>

  <!--tab nav-->
  <div class="container">
         <!--form start-->
         <h2>Generate IT Workstation History Report by Property No.</h2>
<form action="jspdf-dump-ITWShis2.php" method="POST" id="signatureform" autocomplete="off">    

<!--Property Number-->
<div class="container">
        <div class="form-group">
          <label for="exampleFormControlSelect1">
            <h3>Property Number:<span class="span-ask">*</span></h3>
          </label>
          <input type="text" style="width: 300px;" class="form-control" name="prop_no" id="assigned_to" required>
        </div>
      </div>

    <!--buttons container-->
      <div class="container">
        <button type="submit" name="submit" class="btn btn-primary" id="btn-save">Submit</button>
        <button type="reset" class="btn btn-primary">Reset</button>
      </div>

      <br>
      <div class="container">
      <span class="span-ask">* - required fields</span>
    </div>
  </form>

    <!--end of form-->
    </div>
  <br>
      <div class="container">
        <a href="iframe-IT-WS"> < Back </a>
      </div>
    </div>
  </div>

  <div class="py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <p class="mb-0">© 2020 Francis Joachim Santy</p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
<!-- © 2020 | Francis Joachim P. Santy-->