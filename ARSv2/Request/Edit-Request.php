<?php
session_start();

require("../config.php");

if ( isset( $_SESSION['username'] ) ) {

} else {
    
    header("Location: ../Login");
}

$ID = $_GET['GetID'];
$query = "select * from request WHERE ID='".$ID."'";
$result = mysqli_query($link, $query);

while($row=mysqli_fetch_assoc($result)){
    $ID = $row['ID'];
    $ServiceType = $row['ServiceType'];
    $ServiceTypeB = explode(",",$ServiceType);
    $serOthers = $row['serOthers'];
    $State = $row['State'];
    $UnitType = $row['UnitType'];
    $UnitTypeB = explode(",",$UnitType);
    $utothers = $row['utothers'];
    $Req_By = $row['Req_By'];
    $Divsion = $row['Division'];
    $Purpose = $row['Purpose'];
    $Act = $row['Act'];
    $Status = $row['Status'];
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

    <!-- added js-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>

<style type="text/css">
  .span-ask{
    color: red;
  }
</style>
</head>

<body>
            <div class="line"></div>
            <div class="container" style="margin-left: auto; margin-right: auto;">
            <h1 style="align-self: center;">Edit a Request</h1>
            <div class="line"></div>

           <!--form start-->
  <form action="Update-Request?ID=<?php echo $ID?>" method="POST" autocomplete="off">   
  
  
  <!--Services container--> 
  <h3 class="container">Service:</h3> 
    <div class="container">
      <div class="form-check">
        <div class="row">
          
   <div class='col-sm'><input class='form-check-input' type='checkbox' name='ServiceType[]' value='Repair'  
   <?php
   if(in_array("Repair",$ServiceTypeB)){
     echo "checked";
   }
   ?>><div class='fbox-cbox'>Repair</div></div>  
    
        
   <div class='col-sm'><input class='form-check-input' type='checkbox' name='ServiceType[]' value='Installation'
   <?php
   if(in_array("Installation",$ServiceTypeB)){
     echo "checked";
   }
   ?>><div class='fbox-cbox'>Installation</div></div>  
    
        
   <div class='col-sm'><input class='form-check-input' type='checkbox' name='ServiceType[]' value='Maintenance'
   <?php
   if(in_array("Maintenance",$ServiceTypeB)){
     echo "checked";
   }
   ?>><div class='fbox-cbox'>Maintenance</div></div>  
    
        
   <div class='col-sm'><input class='form-check-input' type='checkbox' name='ServiceType[]' value='Internet'
   <?php
   if(in_array("Internet",$ServiceTypeB)){
     echo "checked";
   }
   ?>><div class='fbox-cbox'>Internet</div></div>  
    
        
   <div class='col-sm'><input class='form-check-input' type='checkbox' name='ServiceType[]' value='Purchase'
   <?php
   if(in_array("Purchase",$ServiceTypeB)){
     echo "checked";
   }
   ?>><div class='fbox-cbox'>Purchase</div></div>  
    
        
   <div class='col-sm'><input class='form-check-input' type='checkbox' name='ServiceType[]' value='Others'
   <?php
   if(in_array("Others",$ServiceTypeB)){
     echo "checked";
   }
   ?>><div class='fbox-cbox'>Others</div></div>  
    
            
      
       :<input type="text" class="form-control-sm" name="serOthers" id="others" value="<?php echo $serOthers?>">
      
      </div>
      </div>
    </div>
    <br>

  <!--State container-->
    <div class="container">
      <div class="form-group">
        <label for="exampleFormControlSelect1">
          <h3>For:</h3>
        </label>
        <select class="form-control-sm" name="State" id="exampleFormControlSelect1">
          <option value= "" 
          <?php
          if($State==' '){
            echo "selected";
          }
          ?>></option>
          
          <option value="Replacement" 
          <?php
          if($State=='Replacement'){
            echo "selected";
          }
          ?>>Replacement</option>
      
      
          <option value="New"
          <?php
          if($State=='New'){
            echo "selected";
          }
          ?>>New</option>
      
    </select>
      </div>
    </div>
    <br>

  <!--Unit Type-->  
    <h3 class="container">Unit Type:</h3>
    <div class="container">
      <div class="form-check">
        <div class="row">
           
    <div class='col-sm'><input class='form-check-input' type='checkbox' name='UnitType[]' style='white-space: nowrap;' value='Computer Set'
    <?php
   if(in_array("Computer Set",$UnitTypeB)){
     echo "checked";
   }
   ?>>        <div class='fbox-cbox'>Computer Set</div>        </div>   

    <div class='col-sm'><input class='form-check-input' type='checkbox' name='UnitType[]' style='white-space: nowrap;' value='Software'
    <?php
   if(in_array("Software",$UnitTypeB)){
     echo "checked";
   }
   ?>>        <div class='fbox-cbox'>Software</div>        </div>     

    <div class='col-sm'><input class='form-check-input' type='checkbox' name='UnitType[]' style='white-space: nowrap;' value='Memory'
    <?php
   if(in_array("Memory",$UnitTypeB)){
     echo "checked";
   }
   ?>>        <div class='fbox-cbox'>Memory</div>        </div>     
    
    <div class='col-sm'><input class='form-check-input' type='checkbox' name='UnitType[]' style='white-space: nowrap;' value='System Unit Only'
    <?php
   if(in_array("System Unit Only",$UnitTypeB)){
     echo "checked";
   }
   ?>>        <div class='fbox-cbox'>System Unit Only</div>        </div>   

    <div class='col-sm'><input class='form-check-input' type='checkbox' name='UnitType[]' style='white-space: nowrap;' value='NIC Card'
    <?php
   if(in_array("NIC Card",$UnitTypeB)){
     echo "checked";
   }
   ?>>        <div class='fbox-cbox'>NIC Card</div>        </div>    

    <div class='col-sm'><input class='form-check-input' type='checkbox' name='UnitType[]' style='white-space: nowrap;' value='HDD'
    <?php
   if(in_array("HDD",$UnitTypeB)){
     echo "checked";
   }
   ?>>        <div class='fbox-cbox'>HDD</div>        </div>      

    <div class='col-sm'><input class='form-check-input' type='checkbox' name='UnitType[]' style='white-space: nowrap;' value='Laptop'
    <?php
   if(in_array("Laptop",$UnitTypeB)){
     echo "checked";
   }
   ?>>        <div class='fbox-cbox'>Laptop</div>        </div>    

    <div class='col-sm'><input class='form-check-input' type='checkbox' name='UnitType[]' style='white-space: nowrap;' value='Cables'
    <?php
   if(in_array("Cables",$UnitTypeB)){
     echo "checked";
   }
   ?>>        <div class='fbox-cbox'>Cables</div>        </div>  

    <div class='col-sm'><input class='form-check-input' type='checkbox' name='UnitType[]' style='white-space: nowrap;' value='Casing'
    <?php
   if(in_array("Casing",$UnitTypeB)){
     echo "checked";
   }
   ?>>        <div class='fbox-cbox'>Casing</div>        </div>  

    <div class='col-sm'><input class='form-check-input' type='checkbox' name='UnitType[]' style='white-space: nowrap;' value='Printer'
    <?php
   if(in_array("Printer",$UnitTypeB)){
     echo "checked";
   }
   ?>>        <div class='fbox-cbox'>Printer</div>        </div> 

    <div class='col-sm'><input class='form-check-input' type='checkbox' name='UnitType[]' style='white-space: nowrap;' value='Keyboard'
    <?php
   if(in_array("Keyboard",$UnitTypeB)){
     echo "checked";
   }
   ?>>        <div class='fbox-cbox'>Keyboard</div>        </div>  

    <div class='col-sm'><input class='form-check-input' type='checkbox' name='UnitType[]' style='white-space: nowrap;' value='Power Supply'
    <?php
   if(in_array("Power Supply",$UnitTypeB)){
     echo "checked";
   }
   ?>>        <div class='fbox-cbox'>Power Supply</div>        </div>      

    <div class='col-sm'><input class='form-check-input' type='checkbox' name='UnitType[]' style='white-space: nowrap;' value='Monitor'
    <?php
   if(in_array("Monitor",$UnitTypeB)){
     echo "checked";
   }
   ?>>        <div class='fbox-cbox'>Monitor</div>        </div>      

    <div class='col-sm'><input class='form-check-input' type='checkbox' name='UnitType[]' style='white-space: nowrap;' value='Mouse'
    <?php
   if(in_array("Mouse",$UnitTypeB)){
     echo "checked";
   }
   ?>>        <div class='fbox-cbox'>Mouse</div>        </div>    

    <div class='col-sm'><input class='form-check-input' type='checkbox' name='UnitType[]' style='white-space: nowrap;' value='Video Card'
    <?php
   if(in_array("Video Card",$UnitTypeB)){
     echo "checked";
   }
   ?>>        <div class='fbox-cbox'>Video Card</div>        </div>   

    <div class='col-sm'><input class='form-check-input' type='checkbox' name='UnitType[]' style='white-space: nowrap;' value='UPS'
    <?php
   if(in_array("UPS",$UnitTypeB)){
     echo "checked";
   }
   ?>>        <div class='fbox-cbox'>UPS</div>        </div> 

    <div class='col-sm'><input class='form-check-input' type='checkbox' name='UnitType[]' style='white-space: nowrap;' value='Motherboard'
    <?php
   if(in_array("Motherboard",$UnitTypeB)){
     echo "checked";
   }
   ?>>        <div class='fbox-cbox'>Motherboard</div>        </div>      

    <div class='col-sm'><input class='form-check-input' type='checkbox' name='UnitType[]' style='white-space: nowrap;' value='Connectors'
    <?php
   if(in_array("Connectors",$UnitTypeB)){
     echo "checked";
   }
   ?>>        <div class='fbox-cbox'>Connectors</div>        </div>   

    <div class='col-sm'><input class='form-check-input' type='checkbox' name='UnitType[]' style='white-space: nowrap;' value='Data Switch'
    <?php
   if(in_array("Data Switch",$UnitTypeB)){
     echo "checked";
   }
   ?>>        <div class='fbox-cbox'>Data Switch</div>        </div>   

    <div class='col-sm'><input class='form-check-input' type='checkbox' name='UnitType[]' style='white-space: nowrap;' value='CPU'
    <?php
   if(in_array("CPU",$UnitTypeB)){
     echo "checked";
   }
   ?>>        <div class='fbox-cbox'>CPU</div>        </div>      
    
    <div class='col-sm'><input class='form-check-input' type='checkbox' name='UnitType[]' style='white-space: nowrap;' value='Battery'
    <?php
   if(in_array("Battery",$UnitTypeB)){
     echo "checked";
   }
   ?>>        <div class='fbox-cbox'>Battery</div>        </div>      
    
    <div class='col-sm'><input class='form-check-input' type='checkbox' name='UnitType[]' style='white-space: nowrap;' value='Others'
    <?php
   if(in_array("Others",$UnitTypeB)){
     echo "checked";
   }
   ?>>        <div class='fbox-cbox'>Others</div>        </div>   

        <div class="fbox-cbox">
        : <input type="text" class="form-control-sm" name="utothers" value="<?php echo $utothers;?>">
        </div>
       </div>
      </div>
    </div>
      <br>

  <!--Requested by container-->  
      <div class="container">
        <div class="form-group">
          <label for="exampleFormControlSelect1">
            <h3>Requested by:</h3>
          </label>
          <input type="text" class="form-control" name="Req_By" id="requestedby" value="<?php echo $Req_By;?>" readonly>
        </div>
      </div>

  <!--Purpose container-->
      <div class="container">
        <div class="form-group">
          <label for="exampleFormControlSelect1">
            <h3>Purpose:</h3>
          </label>
          <input type="text" class="form-control" name ="Purpose" id="exampleFormControlTextarea1" rows="3" value="<?php echo $Purpose;?>" required>
        </div>
      </div>
      <br>

   <!--Date and time accomplished-->
      <div class="container">
      <h3>Date and Time Accomplished:</h3>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" name="dtAcc" data-target="#datetimepicker1"/>
                    <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
        </script>
    </div>
</div>
        <br>

     <!--division container-->   
     <div class="container">
        <div class="form-group">
          <label for="exampleFormControlSelect1">
            <h3>Division:</h3>
          </label>
          <input type="text" class="form-control" name="div" id="requestedby" value="<?php echo $Divsion?>" readonly>
        </div>
      </div>
      <br>
      
     <!--Action taken container-->
      <div class="container">
        <div class="form-group">
          <label for="exampleFormControlSelect1">
            <h3>Action Taken:</h3>
          </label>
          <input type="text" class="form-control" name="Act" id="exampleFormControlTextarea1" rows="3" required>
        </div>
      </div>
      <br>
    
    <!--status of the request-->
    <div class="container">
      <div class="form-group">
        <label for="exampleFormControlSelect1">
          <h3>Request Status:</h3>
        </label>
        <select id="selectStatus" name="Status" onchange="showMe('signature')">
          <option value="Done" 
          <?php
          if($Status=='Done'){
            echo "selected";
          }
          ?>>Done</option>

          <option value="On-going"
          <?php 
          if($Status=='On-going'){
            echo "selected";
          }
          ?>
          >On-going</option>

          <option value="Not yet Started"
          <?php 
          if($Status=='Not yet started'){
            echo "selected";
          }
          ?>
          >Not yet started</option>
        </select>
      </div>
    </div>
    <br>

    <!--Sign container-->
  
     <div class="container">
     
        <label for="exampleFormControlSelect1">
          <h3>Signature of Requester:</h3>
            </label>
            <div id="canvasDiv" style="border-radius: 1px;  box-shadow: 0px 0px 0px 5px rgba(0,0,0,0.5); display: none; width: 700px; height: 200px"></div>
                <br>
                <button type="button" class="btn btn-danger" id="reset-btn">Clear</button>          
                <br>
                <p>Once it is done you can no longer edit this.</p>
     
     </div>
     <br>
    
    <!--buttons container-->
      <div class="container">
        <button type="update" name="update" class="btn btn-primary" id="btn-save">Update</button>
        <input type="hidden" id="signature" name="signature" required>
        <input type="hidden" name="signaturesubmit" value="1">
        <a href="iframe-View-Requests" class="btn btn-secondary">Back</a>
      </div>
  </form>

    <!--end of form-->
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

    <script>
$('#selectStatus').on('change', function () {
    if(this.value === "Done"){
        $("#canvasDiv").show();
    } else {
        $("#canvasDiv").hide();
    }
});
</script>

<!--JQuery for signature-->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
<script>
    $(document).ready(() => {
        var canvasDiv = document.getElementById('canvasDiv');
        var canvas = document.createElement('canvas');
        canvas.setAttribute('id', 'canvas');
        canvasDiv.appendChild(canvas);
        $("#canvas").attr('height', $("#canvasDiv").outerHeight());
        $("#canvas").attr('width', $("#canvasDiv").width());
        if (typeof G_vmlCanvasManager != 'undefined') {
            canvas = G_vmlCanvasManager.initElement(canvas);
        }
        
        context = canvas.getContext("2d");
        $('#canvas').mousedown(function(e) {
            var offset = $(this).offset()
            var mouseX = e.pageX - this.offsetLeft;
            var mouseY = e.pageY - this.offsetTop;

            paint = true;
            addClick(e.pageX - offset.left, e.pageY - offset.top);
            redraw();
        });

        $('#canvas').mousemove(function(e) {
            if (paint) {
                var offset = $(this).offset()
                //addClick(e.pageX - this.offsetLeft, e.pageY - this.offsetTop, true);
                addClick(e.pageX - offset.left, e.pageY - offset.top, true);
                console.log(e.pageX, offset.left, e.pageY, offset.top);
                redraw();
            }
        });

        $('#canvas').mouseup(function(e) {
            paint = false;
        });

        $('#canvas').mouseleave(function(e) {
            paint = false;
        });

        var clickX = new Array();
        var clickY = new Array();
        var clickDrag = new Array();
        var paint;

        function addClick(x, y, dragging) {
            clickX.push(x);
            clickY.push(y);
            clickDrag.push(dragging);
        }

        $("#reset-btn").click(function() {
            context.clearRect(0, 0, window.innerWidth, window.innerWidth);
            clickX = [];
            clickY = [];
            clickDrag = [];
        });
//save 
        $(document).on('click', '#btn-save', function() {
            var mycanvas = document.getElementById('canvas');
            var img = mycanvas.toDataURL("image/png");
            anchor = $("#signature");
            anchor.val(img);
            $("#signatureform").submit();
        });

        var drawing = false;
        var mousePos = {
            x: 0,
            y: 0
        };
        var lastPos = mousePos;

        canvas.addEventListener("touchstart", function(e) {
            mousePos = getTouchPos(canvas, e);
            var touch = e.touches[0];
            var mouseEvent = new MouseEvent("mousedown", {
                clientX: touch.clientX,
                clientY: touch.clientY
            });
            canvas.dispatchEvent(mouseEvent);
        }, false);


        canvas.addEventListener("touchend", function(e) {
            var mouseEvent = new MouseEvent("mouseup", {});
            canvas.dispatchEvent(mouseEvent);
        }, false);


        canvas.addEventListener("touchmove", function(e) {

            var touch = e.touches[0];
            var offset = $('#canvas').offset();
            var mouseEvent = new MouseEvent("mousemove", {
                clientX: touch.clientX,
                clientY: touch.clientY
            });
            canvas.dispatchEvent(mouseEvent);
        }, false);



        // Get the position of a touch relative to the canvas
        function getTouchPos(canvasDiv, touchEvent) {
            var rect = canvasDiv.getBoundingClientRect();
            return {
                x: touchEvent.touches[0].clientX - rect.left,
                y: touchEvent.touches[0].clientY - rect.top
            };
        }


        var elem = document.getElementById("canvas");

        var defaultPrevent = function(e) {
            e.preventDefault();
        }
        elem.addEventListener("touchstart", defaultPrevent);
        elem.addEventListener("touchmove", defaultPrevent);


        function redraw() {
            lastPos = mousePos;
            for (var i = 0; i < clickX.length; i++) {
                context.beginPath();
                if (clickDrag[i] && i) {
                    context.moveTo(clickX[i - 1], clickY[i - 1]);
                } else {
                    context.moveTo(clickX[i] - 1, clickY[i]);
                }
                context.lineTo(clickX[i], clickY[i]);
                context.closePath();
                context.stroke();
            }
        }
    })

</script>
</body>

</html>
<!-- © 2020 | Francis Joachim P. Santy-->