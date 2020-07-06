<?php
session_start();

require("config.php");
?>

<!DOCTYPE html>
<html>

<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../ARSv1/favicon.ico">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/styles.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script>
		var allowsubmit = false;
		$(function(){
			//on keypress 
			$('#confirm_password').keyup(function(e){
				//get values 
				var pass = $('#password').val();
				var confpass = $(this).val();
				
				//check the strings
				if(pass == confpass){
					//if both are same remove the error and allow to submit
					$('.message').text('');
					allowsubmit = true;
				}else{
					//if not matching show error and not allow to submit
					$('.message').text('Password not matching');
					allowsubmit = false;
				}
			});
			
			//jquery form submit
			$('#form').submit(function(){
			
				var pass = $('#password').val();
				var confpass = $('#confirm_password').val();
 
				//just to make sure once again during submit
				//if both are true then only allow submit
				if(pass == confpass){
					allowsubmit = true;
				}
				if(allowsubmit){
					return true;
				}else{
					return false;
				}
			});
		});
	</script>
</head>

<body>
 <div class="register-photo" style="height:836px;color:rgb(255,255,255);background-color:#506acd;padding-top:115px;">
        <div class="form-container">
            <div class="image-holder" style="background-image:url(&quot;assets/img/new-preview.jpg&quot;);"></div>

            <form action="register" id="form" method="post" autocomplete="off" style="background-color:#161d37;">
               
                <h2 class="text-center" style="color:rgb(216,226,235);"><strong>Create</strong> an account.</h2>

                <div class="form-group">
                    <input class="form-control" type="username" name="username" placeholder="Username" style="background-color:rgb(22,29,55);font-size:16px;color:rgb(250,250,251);">
                </div>

                <div class="form-group">
                    <input class="form-control" type="password" name="password" id="password" placeholder="Password" style="background-color:rgb(22,29,55);color:rgb(255,255,255);">
                </div>

                <div class="form-group">
                    <input class="form-control" type="password" name="confirm_password" id="confirm_password" placeholder="Password (repeat)" style="background-color:rgb(22,29,55);color:rgb(255,255,255);">
                    <span class="message" style="color:red;" align="center"></span>
                </div>

<!--php register code-->
<?php  

    if (isset($_POST['submit'])){
    
    $uname = $_POST['username']; 
    $pword = md5($_POST['password']);

    $query_u = "SELECT * FROM it_personnel WHERE username = '$uname'";
    $res_u = mysqli_query($link,$query_u);

    if(mysqli_num_rows($res_u)){
        echo "<span style='color:red;'>Username exists! Choose another one.</span>";
    }else{

      $query= "INSERT INTO it_personnel (username, password) VALUES ('".$uname."','".$pword."')";

    if(mysqli_query($link, $query)){
   
     echo "<div class='alert alert-success' role='alert'>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
           <strong>Succesfully Registered!</strong></div>";  
          } 


    }
  }
  //else{
 
    //mysqli_error($link);  
    //echo "<div class='alert alert-danger' role='alert'><strong>Failed to register!</strong></div>";

    //}  
  
?>    
<!--login button-->
        <button type="submit" name="submit" class="btn btn-primary btn-block" value="Login" style="background-color:#2a3972;">Register</button>
         <a href="Login.php" class="already">You already have an account? Login here.</a>
          </form>
          
        </div>
      </div>
    </div>
</body>
</html>
<!-- © 2020 | Francis Joachim P. Santy-->