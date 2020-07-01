

<?php

  require "header.php";

  
?>

    <main>
        <!-- The Name of Our Tab -->
  <title>Used Cars for Sale In Staten Island, NY | TopCars</title>

  <!-- Styles -->
  <link rel="stylesheet" type="text/css" href="assets/css/style.css?V=2.0">

  <!--Bootstrap Styles -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">

  <!--Bootstrap JS -->
  <script src="assets/js/bootstrap.min.js"></script>

</head>
      <div class="wrapper-main">
        <section class="section-default">
    <link rel="stylesheet2" href="style.css">
          <?php
          if (!isset($_SESSION['id'])) {
            echo '<p class="login-status">You are logged out!</p>';
          }
          else if (isset($_SESSION['id'])) {
            echo '<p class="login-status">Customer Forms</p>';
            echo '<p class="login-status">If you would like to learn more about a car or cars listed on our site, please fill out this form</p>';
            //include "home.php";

            // echo 'Welcome ' username //
            ?>
			<?php

if(isset($_POST['submit'])){
	$fname = $_POST['f_name'];
	$lname = $_POST['l_name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
  $ids=0;

	$sql = "INSERT INTO customer (fname, lname, email,phone,id)
VALUES ('$fname', '$lname', '$email', '$phone','$ids')";
$ids = $ids+1;

if ($conn->query($sql) === TRUE) {
  echo '<div class="alert alert-success" role="alert">Thank you, your response has been recorded</div>';
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}



?>

			 <table style="margin: 0px auto;" width = "600" border = "1" cellspacing = "1" 
                     cellpadding = "2">
                  
                     <tr>
                        <td style="padding: 5px;" width = "200">First Name</td>
                        <td style="padding: 5px;" ><?php echo $fname ?></td>
                     </tr>
                  
                     <tr>
                        <td style="padding: 5px;" width = "200">Last Name</td>
                        <td style="padding: 5px;" ><?php echo $lname ?></td>
                     </tr>
                  
                     <tr>
                        <td style="padding: 5px;" width = "200">Email</td>
                        <td style="padding: 5px;" ><?php echo $email ?></td>
                     </tr>
                  
				  <tr>
                        <td style="padding: 5px;" width = "200">Phone Number</td>
                        <td style="padding: 5px;" ><?php echo $phone ?></td>
                     </tr>
					 
                   
                  
                    
                  
                  </table>
				  </br>
</br>
</br>
				  <?php
}

?>

  <div class="form-group" style="    width: 60%;margin: 0px auto;">
 <form method = "post" action = "<?php $_PHP_SELF ?>">
 
 <label for="exampleInputEmail1">First Name</label>
 <input required name = "f_name" class="form-control" type = "text"   id = "">
 
  <label for="exampleInputEmail1">Last Name</label>
  <input  required class="form-control" name = "l_name" type = "text" id = "">
	
            <label for="exampleInputEmail1">Email</label>
            <input required class="form-control" name = "email" type = "email"  id = "">
			
            <label for="exampleInputEmail1">Phone Number</label>
            <input required class="form-control" name = "phone" type = "text"  id = "">
                   </br>
            <input class="btn btn-primary" name = "submit" type = "submit" id = "add" value = "Submit">
                      
               </form>
			   </div>
			   <?php
          }
          ?>
        </section>
      </div>
    </main>

<?php

  require "footer.php";
?>