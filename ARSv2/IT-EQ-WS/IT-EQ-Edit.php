<?php
session_start();

require("../config.php");

if ( isset( $_SESSION['username'] ) ) {

} else {
    
    header("Location:../Login");
}


$id = $_GET['GetID'];
$query = "select * from it_peripherals WHERE id='".$id."'";
$result = mysqli_query($link, $query);

while($row=mysqli_fetch_assoc($result)){
    $id = $row['id'];
    $peripheral_type = $row['peripheral_type'];
    $peripheral_typeB = explode(",",$peripheral_type);
    $peripheral_typeOther = $row['peripheral_typeOther'];
    $serial_no = $row['serial_no'];
    $date_acquired = $row['date_acquired'];
    $brand = $row['brand'];
    $model = $row['model'];
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

  <!--Unit Type-->  
    <h3 class="container">Peripheral Type:</h3>
    <div class="container">
      <div class="form-check">
        <div class="row">
           
    <div class='col-sm'><input class='form-check-input' type='checkbox' name='peripheral_type[]' style='white-space: nowrap;' value='Computer Set'
    <?php
   if(in_array("Computer Set",$peripheral_typeB)){
     echo "checked";
   }
   ?>>        <div class='fbox-cbox'>Computer Set</div>        </div>   

    <div class='col-sm'><input class='form-check-input' type='checkbox' name='peripheral_type[]' style='white-space: nowrap;' value='Software'
    <?php
   if(in_array("Software",$peripheral_typeB)){
     echo "checked";
   }
   ?>>        <div class='fbox-cbox'>Software</div>        </div>     

    <div class='col-sm'><input class='form-check-input' type='checkbox' name='peripheral_type[]' style='white-space: nowrap;' value='Memory'
    <?php
   if(in_array("Memory",$peripheral_typeB)){
     echo "checked";
   }
   ?>>        <div class='fbox-cbox'>Memory</div>        </div>     
    
    <div class='col-sm'><input class='form-check-input' type='checkbox' name='peripheral_type[]' style='white-space: nowrap;' value='System Unit Only'
    <?php
   if(in_array("System Unit Only",$peripheral_typeB)){
     echo "checked";
   }
   ?>>        <div class='fbox-cbox'>System Unit Only</div>        </div>   

    <div class='col-sm'><input class='form-check-input' type='checkbox' name='peripheral_type[]' style='white-space: nowrap;' value='NIC Card'
    <?php
   if(in_array("NIC Card",$peripheral_typeB)){
     echo "checked";
   }
   ?>>        <div class='fbox-cbox'>NIC Card</div>        </div>    

    <div class='col-sm'><input class='form-check-input' type='checkbox' name='peripheral_type[]' style='white-space: nowrap;' value='HDD'
    <?php
   if(in_array("HDD",$peripheral_typeB)){
     echo "checked";
   }
   ?>>        <div class='fbox-cbox'>HDD</div>        </div>      

    <div class='col-sm'><input class='form-check-input' type='checkbox' name='peripheral_type[]' style='white-space: nowrap;' value='Laptop'
    <?php
   if(in_array("Laptop",$peripheral_typeB)){
     echo "checked";
   }
   ?>>        <div class='fbox-cbox'>Laptop</div>        </div>    

    <div class='col-sm'><input class='form-check-input' type='checkbox' name='peripheral_type[]' style='white-space: nowrap;' value='Cables'
    <?php
   if(in_array("Cables",$peripheral_typeB)){
     echo "checked";
   }
   ?>>        <div class='fbox-cbox'>Cables</div>        </div>  

    <div class='col-sm'><input class='form-check-input' type='checkbox' name='peripheral_type[]' style='white-space: nowrap;' value='Casing'
    <?php
   if(in_array("Casing",$peripheral_typeB)){
     echo "checked";
   }
   ?>>        <div class='fbox-cbox'>Casing</div>        </div>  

    <div class='col-sm'><input class='form-check-input' type='checkbox' name='peripheral_type[]' style='white-space: nowrap;' value='Printer'
    <?php
   if(in_array("Printer",$peripheral_typeB)){
     echo "checked";
   }
   ?>>        <div class='fbox-cbox'>Printer</div>        </div> 

    <div class='col-sm'><input class='form-check-input' type='checkbox' name='peripheral_type[]' style='white-space: nowrap;' value='Keyboard'
    <?php
   if(in_array("Keyboard",$peripheral_typeB)){
     echo "checked";
   }
   ?>>        <div class='fbox-cbox'>Keyboard</div>        </div>  

    <div class='col-sm'><input class='form-check-input' type='checkbox' name='peripheral_type[]' style='white-space: nowrap;' value='Power Supply'
    <?php
   if(in_array("Power Supply",$peripheral_typeB)){
     echo "checked";
   }
   ?>>        <div class='fbox-cbox'>Power Supply</div>        </div>      

    <div class='col-sm'><input class='form-check-input' type='checkbox' name='peripheral_type[]' style='white-space: nowrap;' value='Monitor'
    <?php
   if(in_array("Monitor",$peripheral_typeB)){
     echo "checked";
   }
   ?>>        <div class='fbox-cbox'>Monitor</div>        </div>      

    <div class='col-sm'><input class='form-check-input' type='checkbox' name='peripheral_type[]' style='white-space: nowrap;' value='Mouse'
    <?php
   if(in_array("Mouse",$peripheral_typeB)){
     echo "checked";
   }
   ?>>        <div class='fbox-cbox'>Mouse</div>        </div>    

    <div class='col-sm'><input class='form-check-input' type='checkbox' name='peripheral_type[]' style='white-space: nowrap;' value='Video Card'
    <?php
   if(in_array("Video Card",$peripheral_typeB)){
     echo "checked";
   }
   ?>>        <div class='fbox-cbox'>Video Card</div>        </div>   

    <div class='col-sm'><input class='form-check-input' type='checkbox' name='peripheral_type[]' style='white-space: nowrap;' value='UPS'
    <?php
   if(in_array("UPS",$peripheral_typeB)){
     echo "checked";
   }
   ?>>        <div class='fbox-cbox'>UPS</div>        </div> 

    <div class='col-sm'><input class='form-check-input' type='checkbox' name='peripheral_type[]' style='white-space: nowrap;' value='Motherboard'
    <?php
   if(in_array("Motherboard",$peripheral_typeB)){
     echo "checked";
   }
   ?>>        <div class='fbox-cbox'>Motherboard</div>        </div>      

    <div class='col-sm'><input class='form-check-input' type='checkbox' name='peripheral_type[]' style='white-space: nowrap;' value='Connectors'
    <?php
   if(in_array("Connectors",$peripheral_typeB)){
     echo "checked";
   }
   ?>>        <div class='fbox-cbox'>Connectors</div>        </div>   

    <div class='col-sm'><input class='form-check-input' type='checkbox' name='peripheral_type[]' style='white-space: nowrap;' value='Data Switch'
    <?php
   if(in_array("Data Switch",$peripheral_typeB)){
     echo "checked";
   }
   ?>>        <div class='fbox-cbox'>Data Switch</div>        </div>   

    <div class='col-sm'><input class='form-check-input' type='checkbox' name='peripheral_type[]' style='white-space: nowrap;' value='CPU'
    <?php
   if(in_array("CPU",$peripheral_typeB)){
     echo "checked";
   }
   ?>>        <div class='fbox-cbox'>CPU</div>        </div>      
    
    <div class='col-sm'><input class='form-check-input' type='checkbox' name='peripheral_type[]' style='white-space: nowrap;' value='Battery'
    <?php
   if(in_array("Battery",$peripheral_typeB)){
     echo "checked";
   }
   ?>>        <div class='fbox-cbox'>Battery</div>        </div>      
    
    <div class='col-sm'><input class='form-check-input' type='checkbox' name='peripheral_type[]' style='white-space: nowrap;' value='Others'
    <?php
   if(in_array("Others",$peripheral_typeB)){
     echo "checked";
   }
   ?>>        <div class='fbox-cbox'>Others</div>        </div>   

        <div class="fbox-cbox">
        : <input type="text" class="form-control-sm" name="peripheral_typeOther" value="<?php echo $peripheral_typeOther;?>">
        </div>
       </div>
      </div>
    </div>
      <br>

  <!--Serial no container-->  
      <div class="container">
        <div class="form-group">
          <label for="exampleFormControlSelect1">
            <h3>Serial Number:</h3>
          </label>
          <input type="text" class="form-control" name="serial_no" value="<?php echo $serial_no;?>" >
        </div>
      </div>

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

  <!--Brand container-->
      <div class="container">
        <div class="form-group">
          <label for="exampleFormControlSelect1">
            <h3>Brand:</h3>
          </label>
          <input type="text" class="form-control" name ="brand" rows="3" value="<?php echo $brand;?>" required>
        </div>
      </div>
      <br>

     <!--Model container-->   
     <div class="container">
        <div class="form-group">
          <label for="exampleFormControlSelect1">
            <h3>Model:</h3>
          </label>
          <input type="text" class="form-control" name="model" value="<?php echo $model;?>" >
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

      <!--Description container-->
      <div class="container">
        <div class="form-group">
          <label for="exampleFormControlSelect1">
            <h3>Property Number:</h3>
          </label>
          <input type="text" class="form-control" name="property_no" rows="3" value="<?php echo $property_no;?>" required>
        </div>
      </div>
      <br>
   
    
    <!--buttons container-->
      <div class="container">
        <button type="update" name="update" class="btn btn-primary" id="btn-save">Update</button>
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