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
<link rel="stylesheet" href="responsiveness.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
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

</style>
</head>

<body>

  <div class="container">
  <ul class="nav nav-pills">
    <li class="nav-item">
      <a class="nav-link active" href="iframe-IT-EQ">IT Peripheral History</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="iframe-IT-WS" style="color: #000000">IT Workstation History</a>
    </li>
  </ul>
</div>
<br>

  <!--white bd start-->
<div class="container-fluid">
<table class="table-sm" cellspacing="0" border="0" style="width: 50%; margin: 0 auto 2em auto; ">
        <thead>
            <tr>
                <th>Search History - IT Peripheral</th>
            </tr>
        </thead>
        <tbody>
            <tr id="filter_global">
                <td>Global search:</td>
                <td align="center"><input type="text" class="global_filter" id="global_filter"></td>
                <td align="center"><input type="checkbox" class="global_filter" id="global_regex" style="display: none"></td>
                <td align="center"><input type="checkbox" class="global_filter" id="global_smart" checked="checked" style="display: none"></td>
            </tr>
            <tr id="filter_col" data-column="4">
                <td>Unit Type:</td>
                <td align="center"><input type="text" class="column_filter" id="col4_filter" placeholder="IT Peripheral"></td>
                <td align="center"><input type="checkbox" class="column_filter" id="col4_regex" style="display: none"></td>
                <td align="center"><input type="checkbox" class="column_filter" id="col4_smart" checked="checked" style="display: none"></td>
            </tr>
            <tr id="filter_col2" data-column="7">
                <td>Property Number:</td>
                <td align="center"><input type="text" class="column_filter" id="col7_filter" placeholder="Property Number"></td>
                <td align="center"><input type="checkbox" class="column_filter" id="col7_regex" style="display: none"></td>
                <td align="center"><input type="checkbox" class="column_filter" id="col7_smart" checked="checked" style="display: none"></td>
            </tr>
        </tbody>
    </table>

 <!----------------------------------------Table--------------------------------------------------------------------------------------->
<div class="table-responsive">
<table id="myTable" class="table table-striped table-bordered" style="width: 100%; ">
              <thead>
                <tr>
                  <th scope="col">Request #</th>
                  <th scope="col">Service Type</th>
                  <th scope="col">Service Type Others</th>
                  <th scope="col">State</th>
                  <th scope="col">Unit Type</th>
                  <th scope="col">Unit Type Others</th>
                  <th scope="col">Purpose</th>
                  <th scope="col">Property Number</th>
                  <th scope="col">Requested By</th>
                  <th scope="col">Signature</th>
                  <th scope="col">Division</th>
                  <th scope="col">Date and Time Requested</th>
                  <th scope="col">Date and Time Accomplished</th>
                  <th scope="col">Action Taken</th>
                  <th scope="col"> Status</th>
                  <th scope="col">Conducted By</th>
                  <!--th></th-->
                </tr>
              </thead>
              <?php 
              $result = mysqli_query($link,"SELECT * FROM request");   
              ?>

              <tbody style="font-size: 12px">
              <?php 
                 $i = 1;
              while($row = mysqli_fetch_assoc($result)){  ?>
               
                  <tr id='<?echo $row["ID"];?>'>
               <?php 
              
                echo'
                <td data-target="ID"><b>'.$i++.'</b></td>
                <td data-target="servicetype">'.$row['ServiceType'].'</td>
                <td data-target="servicetypeothers">'.$row['serOthers'].'</td>
                <td data-target="state">'.$row['State'].'</td>
                <td data-target="unittype">'.$row['UnitType'].'</td>
                <td data-target="unittypeothers">'.$row['utothers'].'</td>
                <td data-target="purpose">'.$row['Purpose'].'</td>
                <td data-target="property_no">'.$row['property_no'].'</td>
                <td>'.$row['Req_By'].'</td>
                <td><img src='.$row['signfile'].' width="100" height="62"></td>
                <td>'.$row['Division'].'</td>
                <td>'.$row['D_n_T'].'</td>
                <td>'.$row['dtAcc'].'</td>
                <td data-target="act">'.$row['Act'].'</td>
                <td data-target="status">'.$row['Status'].'</td>
                <td>'.$row['Acc_By'].'</td>'; ?>

                <!--td><a href="edit2?GetID=<?php echo $row['ID'];?>" type="button" class="btn btn-success editbtn"><i class="fa fa-pencil-square-o"></i></a></td-->
                <?php }?>
                </tr>
                </tbody>
              
                  
            </table>
  
              </div>
  <br>
              </div>
              <div class="container" align="center">
          <a class="btn btn-primary" href="iframe-Request-Report-ITE"><i class="fa fa-line-chart"></i>&nbsp;Generate Reports</a>
      </div>
    </div>
  </div>
<hr>
  
</body>
</html>

<script>
function filterGlobal () {
    $('#myTable').DataTable().search(
        $('#global_filter').val(),
        $('#global_regex').prop('checked'),
        $('#global_smart').prop('checked')
    ).draw();
}
 
function filterColumn ( i ) {
    $('#myTable').DataTable().column( i ).search(
        $('#col'+i+'_filter').val(),
        $('#col'+i+'_regex').prop('checked'),
        $('#col'+i+'_smart').prop('checked')
    ).draw();
}
 
$(document).ready(function() {
    $('#myTable').DataTable({
      "columnDefs": [{ "orderable": false, "targets": -1 }],
  "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
    });
 
    $('input.global_filter').on( 'keyup click', function () {
        filterGlobal();
    } );
 
    $('input.column_filter').on( 'keyup click', function () {
        filterColumn( $(this).parents('tr').attr('data-column') );
    } );
} );
</script>

<!-- © 2020 | Francis Joachim P. Santy-->