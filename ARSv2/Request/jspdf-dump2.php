<?php
session_start();

require("../config.php");

if ( isset( $_SESSION['username'] ) ) {

} else {
    
    header("Location: ../Login");
}

?>
<html>
	<head>
		<title>Request Report</title>

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>		
		<script src="src/tableHTMLExport.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.3.5/jspdf.plugin.autotable.min.js"></script>

		<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.1.3/minty/bootstrap.min.css"-->
		<style>
		body { background-color: #fafafa; }
		th{ background-color: #888; color:#fafafa; }
		tr, td{border: 1px solid}

    .no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url(../Images/Preloader_3.gif) center no-repeat #fff; }
		</style>
	</head>


<body>
<div class="se-pre-con"></div>

<p><button id="pdf" class="btn btn-danger" style="padding: 10px 10px auto;" onclick="generate()">Download Report</button></p>
<p><a href='Request-Report.php'>Back</a>
<p>Selected rows:</p>
<div class="table-responsive">
<table id="myTable" style="font-size: 12px">
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
                  <!--th scope="col">Signature</th-->
                  <th scope="col">Division</th>
                  <th scope="col">Date and Time Requested</th>
                  <th scope="col">Date and Time Accomplished</th>
                  <th scope="col">Action Taken</th>
                  <th scope="col"> Status</th>
                  <th scope="col">Conducted By</th>
                </tr>
				</thead>
              <?php 
              if(isset($_POST['submit'])){
              
              $startdate = $_POST['date_start2'];
              $enddate = $_POST['date_end2'];
              $status = $_POST['Status'];
              $result = mysqli_query($link,"SELECT * FROM request WHERE date(D_n_T) BETWEEN '".$startdate."' AND '".$enddate."' AND Status = '".$status."' ORDER BY D_n_T ASC");   

              echo "Dates Between: $startdate and $enddate";
              echo "Status: $status";
              ?>

              <tbody>
              <?php 
                 $i = 1;
              while($row = mysqli_fetch_assoc($result)){ 
				?>
				<tr>
                <td><b><?php echo $i; $i++;?></b></td>
                <td><?php echo $row['ServiceType'];?></td>
                <td><?php echo $row['serOthers']; ?></td>
                <td><?php echo $row['State']; ?></td>
                <td><?php echo $row['UnitType']; ?></td>
                <td><?php echo $row['utothers']; ?></td>
                <td><?php echo $row['Purpose'] ?></td>
                <td><?php echo $row['property_no'] ?></td>
                <td><?php echo $row['Req_By'];?></td>
                <!--td><img src=" echo $row['signfile'];" width='200' height='82'></td-->
                <td><?php echo $row['Division'];?></td>
                <td><?php echo $row['D_n_T'];?></td>
                <td><?php echo $row['dtAcc'];?></td>
                <td><?php echo $row['Act'];?></td>
                <td><?php echo $row['Status'];?></td>
                <td><?php echo $row['Acc_By'];?></td>
                </tr>
                </tbody>
               <?php }
                  }
               ?>
                  
			</table>
			</div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="jspdf.min.js"></script>
<script src="jspdf.plugin.autotable.min.js"></script>
<script src="tableHTMLExport.js"></script>

<script src="examples/libs/jspdf.debug.js"></script>
<script src="examples/mitubachi-normal.js"></script>
<script src="dist/jspdf.plugin.autotable.js"></script>
<script src="examples.js"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>

<script>
	//paste this code under head tag or in a seperate js file.
	// Wait for window load
	$(window).load(function() {
		// Animate loader off screen
		$('.se-pre-con').fadeOut('slow');;
	});
</script> 

<script>
/*var doc = new jsPDF();
 $('#pdf').on('click',function(){
    $("#myTable").tableHTMLExport({
		type:'pdf',
		filename:'RequesReport.pdf',
		orientation: 'l',
		format: 'A3',
  });
})*/

function generate() {
  let doc = new jsPDF('l', 'pt');

  const header = function(data) {
    doc.setFontSize(10);
    doc.setTextColor(0, 0, 0);
    doc.setFontStyle('normal');
    doc.addImage('../MNWD.jpg', 'JPEG', 10, 10, 50, 30);
    var txt = 'Republic of the Philippines \nMetropolitan Water District \n40 J. Miranda St., Naga City';
    doc.text(txt, data.settings.margin.left + 320, 20);
    doc.text('Request Report',  data.settings.margin.left + 340, 60 )
  };

  const totalPagesExp = '{total_pages_count_string}';
  const footer = function(data) {
    doc.setFontSize(8);
    let str = 'Page ' + data.pageCount;
    // Total page number plugin only available in jspdf v1.0+
    if (typeof doc.putTotalPages === 'function') {
      str = str + ' of ' + totalPagesExp;
      console.log('test');
    }
    doc.text(str, data.settings.margin.left, doc.internal.pageSize.height - 30);
  };

  const options = {
    beforePageContent: header,
    afterPageContent: footer,
    margin: {
      top: 80
    },
    styles:{
      overflow: 'linebreak',
      fontSize: 7,
    }
  };

  var elem = document.getElementById('myTable');
  var data = doc.autoTableHtmlToJson(elem);
  doc.autoTable(data.columns, data.rows, options);
  
  // Total page number plugin only available in jspdf v1.0+
  if (typeof doc.putTotalPages === 'function') {
    doc.putTotalPages(totalPagesExp);
  }
  
  var d = new Date().toISOString().slice(0, 10);
  doc.save('RequestReport'+d+'.pdf');
}
  </script>
</body>
</html>
<!-- © 2020 | Francis Joachim P. Santy-->