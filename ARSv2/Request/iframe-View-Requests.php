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

tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }

.editbtn{
background-color: #FFD700;
}
</style>
</head>

<body>

  

  <!--white bd start-->
<div class="container-fluid">
 <!----------------------------------------Table--------------------------------------------------------------------------------------->
<div class="table-responsive">
<table id="myTable" cellspacing="0" border="0" class="table table-striped table-bordered" style="width: 100%; ">
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
                  <th></th>
                </tr>
              </thead>
              <tfoot>
                 <tr>
                  <th>Request #</th>
                  <th>Service Type</th>
                  <th>Service Type Others</th>
                  <th>State</th>
                  <th>Unit Type</th>
                  <th>Unit Type Others</th>
                  <th>Purpose</th>
                  <th>Property Number</th>
                  <th>Requested By</th>
                  <th>Signature</th>
                  <th>Division</th>
                  <th>Date and Time Requested</th>
                  <th>Date and Time Accomplished</th>
                  <th>Action Taken</th>
                  <th> Status</th>
                  <th>Conducted By</th>
                  <th></th>
                </tr>
              </tfoot>
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
                <?php
                if($row['Status'] == 'Done'){ ?>
                <td><button onclick="window.location.href='Edit-Request?GetID=<?php echo $row['ID'];?>'" class="btn editbtn" disabled>Edit</button></td>
               <?php } else{ ?>
                  <td><button onclick="window.location.href='Edit-Request?GetID=<?php echo $row['ID'];?>'" class="btn btn-warning editbtn">Edit</button></td>
              <?php  }
                ?>

                <!--td><a href="edit2?GetID=<?php echo $row['ID'];?>" type="button" class="btn btn-success editbtn"><i class="fa fa-pencil-square-o"></i></a></td-->
                <?php }?>
                </tr>
                </tbody>
              
                  
            </table>
           
            
              </div>
  <br>
              </div>
              <div class="button" style="padding-left: 50px">
              <a class="btn btn-primary" href="Request-Report">Generate Reports</a>
      </div>
    </div>
  </div>
<hr>
  
</body>
</html>

<script>
$(document).ready(function() {

    $('#myTable tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
 
    $('#myTable').DataTable({
      "columnDefs": [{ "orderable": false, "targets": -1 }],
  "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],


  initComplete: function () {
            // Apply the search
            this.api().columns([1,2,3,4,5,6,7,8,10,11,12,13,14]).every( function () {
                var that = this;
        
                $( 'input', this.footer() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        },
    "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
      if (aData[14] == "Done") {
        $('td', nRow).css('background-color', '#5aab57');
      } else if (aData[14] == "On-going") {
        $('td', nRow).css('background-color', '#e4e588');
      } else{
        $('td', nRow).css('background-color', '#d04e4e');  
      }
    }
    });
 
    
});
</script>
<!-- © 2020 | Francis Joachim P. Santy-->