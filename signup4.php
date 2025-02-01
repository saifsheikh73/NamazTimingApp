<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'conn.php';
include 'allcssjs.php';
include 'allcssjs2.php';
include 'dropdownoptions.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $userName=$_POST['username'];
    $email=$_POST['email'];
   $password=$_POST['pass'];
    $sql="INSERT INTO user1 (userName,email,email2,mobileno,mobileno2,password,masjidname,address,city,zipcode,state,addresslink,forladies) VALUES
    ('".$_POST['username']."',
    '".$_POST['email']."',
    '".$_POST['email2']."',
    '".$_POST['mobileno']."',
    '".$_POST['mobileno2']."',
    '".$_POST['pass']."',
    '".$_POST['masjidname']."',
    '".$_POST['address']."',
    '".$_POST['city']."',
    '".$_POST['zipcode']."',
    '".$_POST['state']."',
    '".$_POST['addresslink']."',
    '".$_POST['forladies']."')";
    $result=mysqli_query($conn,$sql) or die (mysqli_error($conn));
    echo"<script>window.location.href='successfull.php';</script>";
    //header('Location:successfull.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign Up</title> <!--- Example CSS -->
  <style>
  body {
    padding: 1em;
  }
  .spaced > .button {
    margin-bottom: 1em;
  }
  </style>

  <!--- Example Javascript -->
  <script>
  $(document)
    .ready(function() {
      $('.ui.dropdown').dropdown();

      $('.ui.buttons .dropdown.button').dropdown({
        action: 'combo'
      });
    })
  ;
  </script>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-04.jpg);">
					<span class="login100-form-title-1">
						Sign Up
					</span>
				</div>
                                <form class="login100-form validate-form" id="form" method="POST">

                                <div class="wrap-input100 validate-input m-b-26" data-validate="Zipcode is required">
    <span class="label-input100">Zipcode</span>
    <input class="input100" type="number" name="zipcode" id="zipcode" placeholder="Zipcode" required>
    <span class="focus-input100"></span>
</div>

<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
$(function() {
    $("#zipcode").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "request.php",
                dataType: "json",
                data: {
                    q: request.term
                },
                success: function(data) {
                    response(data);
                }
            });
        },
        minLength: 3,
        select: function(event, ui) {
            var vl = ui.item.id;
            var data = vl.split("-");
            console.log(data);
            $("#city").val(data[0]);
            $("#state").val(data[1]);
        },
        open: function() {

        },
        close: function() {

        }
    });
});
</script>


<div class="wrap-input100 validate-input m-b-26" data-validate="City is required">
    <span class="label-input100">City</span>
    <input class="input100" type="text" name="city" id="city" placeholder="City" required>
    <span class="focus-input100"></span>
</div>

<div class="wrap-input100 validate-input m-b-26" data-validate="State is required">
    <span class="label-input100">State</span>
    <input class="input100" type="text" name="state" id="state" placeholder="State" required>
    <span class="focus-input100"></span>
</div>

					
					<div class="container-login100-form-btn">
						<input type="submit" id="sub" class="login100-form-btn" value="Sign Up">
						</div>
						&nbsp;&nbsp;
						<div class="container-login100-form-btn">
						<button type="button" class="login100-form-btn" onclick="window.location.href='login.php'">Already Signed up?</button>
					</div>
				</form>
			</div>
		</div>
	</div>
  

	<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>-->
	<script>
  function checkname() {
    var name = document.getElementById("req").value;
    if (name) {
      $.ajax({
        type: 'POST',
        url: 'checkusername.php',
        data: {
          username: name,
        },
        success: function(response) {
          $('#name_status').html(response);
          if (response === '<h6 style="color:red;">User Name Already Exists</h6>') {
            // Disable the submit button
            $("#sub").prop("disabled", true);
          } else {
            // Enable the submit button
            $("#sub").prop("disabled", false);
          }
        }
      });
    }
  }

  $(document).ready(function() {
    // Call the checkname function when the page loads
    checkname();
  });

  $("#form").submit(function(event) {
    // Prevent the default form submission behavior
    event.preventDefault();

    // Call the checkname function to perform username validation
    checkname();

    // Submit the form if the submit button is enabled
    if (!$("#sub").prop("disabled")) {
      $(this).unbind('submit').submit();
    } else {
      // Scroll to the username input field
      $('html, body').animate({
        scrollTop: $('#req').offset().top
      }, 500);
    }
  });
</script>

</body>
</html>
