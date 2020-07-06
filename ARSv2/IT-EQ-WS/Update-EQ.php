<?php

require("../config.php");


if(isset($_POST['update'])){

    $id = $_GET['ID'];
    $peripheral_type = $_POST['peripheral_type'];
    $peripheral_typeB = implode(",",$peripheral_type);
    $peripheral_typeOther = $_POST['peripheral_typeOther'];
    $serial_no = $_POST['serial_no'];
    $date_acquired = $_POST['date_acquired'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $description = $_POST['description'];
    $assigned_to = $_POST['assigned_to'];
    $property_no = $_POST['property_no'];

    $query = "UPDATE it_peripherals SET 
              peripheral_type = '".$peripheral_typeB."', 
              peripheral_typeOther = '".$peripheral_typeOther."',
              serial_no = '".$serial_no."',
              date_acquired = '".$date_acquired."',
              brand = '".$brand."',
              model = '".$model."',
              description = '".$description."',
              assigned_to = '".$assigned_to."',
              property_no = '".$property_no."'
              WHERE id = '".$id."'";

    $result = mysqli_query($link, $query);

    if($result){
        echo "<div class='alert alert-success' role='alert'>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
           <strong>Succesfully Updated!</strong></div>"; 
        header("refresh: 2;Location:iframe-EQ-Form.php");
    } else{
       echo mysqli_error($link);  
        echo "<div class='alert alert-danger' role='alert'>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
           <strong>Failed to Update!</strong></div>"; 
        header("refresh: 2; Location:iframe-EQ-Form.php");
        }  
}

?>
<!-- © 2020 | Francis Joachim P. Santy-->