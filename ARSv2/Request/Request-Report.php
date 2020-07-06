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
     <link rel="icon" href="favicon.ico">
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

    <!--added stuff-->
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
.span-ask{
  color: red;
}
</style>
</head>

<body>



            <div class="line"></div>
            <div class="container" style="margin-left: auto; margin-right: auto;">
            <!--form start-->
<form action="jspdf-dump.php" method="POST" id="signatureform" autocomplete="off">    
  
  <!--date start-->
  <div class="container">
    <h2>Generate Request Report By Date</h2>
      <h3>Date Start:<span class="span-ask">*</span></h3>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
            <input id="datepickerstart" name="date_start" width="276"  placeholder="Select start date" required/>
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
            $('#datepickerstart').datepicker({
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
            <input id="datepickerend" name="date_end" width="276"  placeholder="Select end date" required/>
                    </div>
                </div>
            </div>
  <!--link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script-->
<!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" /-->
        <script type="text/javascript">
            $('#datepickerend').datepicker({
            dateFormat: "yy-mm-dd",
                });
        </script>
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

  <br>
  <hr>
  <br>
         <!--form start-->
         <h2>Generate Request Report By Status</h2>
<form action="jspdf-dump2.php" method="POST" id="signatureform" autocomplete="off">    
  
  <!--date start-->
  <div class="container">
      <h3>Date Start:<span class="span-ask">*</span></h3>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
            <input id="datepickerstart2" name="date_start2" width="276"  placeholder="Select start date" required/>
                    </div>
                </div>
            </div>
            <!--link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script-->
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
            <input id="datepickerend2" name="date_end2" width="276"  placeholder="Select end date" required/>
                    </div>
                </div>
            </div>
            <!--link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script-->
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
          <h3>Status:<span class="span-ask">*</span></h3>
        </label>
        <select class="form-control-sm" name="Status" id="exampleFormControlSelect1" required>
          <option></option>
        <?php
    $query = "SELECT stat from status";
    $result =mysqli_query($link,$query) or die(mysqli_error($link));
    $count = 0;
    while($row = $result->fetch_assoc()) {
                          $count++;
                          $stat = $row["stat"];
    ?>  
          <option><?php echo $stat ?></option>
      
    <?php
  }
  ?>
</select>
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

    <br>
    <hr>
    <br>

     <!--form start-->
     <h2>Generate Request Report Conducted By</h2>
<form action="jspdf-dump3.php" method="POST" id="signatureform" autocomplete="off">    
  
  <!--date start-->
  <div class="container">
      <h3>Date Start:<span class="span-ask">*</span></h3>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
            <input id="datepickerstart3" name="date_start3" width="276"  placeholder="Select start date" required/>
                    </div>
                </div>
            </div>
<!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" /-->
<!--link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script-->
        <script type="text/javascript">
            $('#datepickerstart3').datepicker({
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
            <input id="datepickerend3" name="date_end3" width="276"  placeholder="Select end date" required/>
                    </div>
                </div>
            </div>
<!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" /-->
<!--link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script-->

        <script type="text/javascript">
            $('#datepickerend3').datepicker({
            dateFormat: "yy-mm-dd",
                });
        </script>
    </div>
  
  <!--Conducted by-->
<div class="container">
        <div class="form-group">
          <label for="exampleFormControlSelect1">
            <h3>Conducted By:<span class="span-ask">*</span></h3>
          </label>
          <input type="text" style="width: 300px;" class="form-control" name="con_by" id="con_by" required>
        </div>
      </div>

    </div>
  
    <div class="container">
        <button type="submit" name="submit" class="btn btn-primary" id="btn-save">Submit</button>
        <button type="reset" class="btn btn-primary">Reset</button>
      </div>

              </form>
            <div class="line"></div>
<a href="iframe-View-Requests" color="blue">< Back</a>
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