

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
            echo '<p class="login-status">Account</p>';
            //include "home.php";

            // echo 'Welcome ' username //
            ?>
		

				  <?php

    $sql = "SELECT * from users where idUsers = ".$_SESSION['id'];
    $data = mysqli_query($conn,$sql);
    $results = mysqli_fetch_array($data);
    //print_r($results);
?>
<div class="row">


			   
			   <div class="col-sm-6">
			   
			   <p class="login-status">Account Details</p>
			   </br>
			 <table style="" width = "" border = "1" cellspacing = "1" 
                     cellpadding = "2">
                  
                     <tr>
                        <td style="padding: 5px;" width = "200">Username </td>
                        <td style="padding: 5px;" ><?php echo $results['uidUsers'] ?></td>
                     </tr>
                  
                     <tr>
                        <td style="padding: 5px;" width = "200">Email</td>
                        <td style="padding: 5px;" ><?php echo $results['emailUsers'] ?></td>
                     </tr>
                  
                     <tr>
                        <td style="padding: 5px;" width = "200">User Id</td>
                        <td style="padding: 5px;" ><?php echo $results['idUsers'] ?></td>
                     </tr>
                  
				
					 
                   
                  
                    
                  
                  </table>
				  </div>
				  
				  
				  <div class="col-sm-6">
				  <p class="login-status">Change Password</p>
  <div class="form-group" style=" ">
  	<?php

if(isset($_POST['submit'])){
	$pass = $_POST['npass'];
	$cpass = $_POST['cnpass'];
	if($pass == $cpass)
	{
		$passss = password_hash($pass, PASSWORD_DEFAULT);
          echo $sql = "UPDATE users set pwdUsers = '$passss' where idUsers =".$_SESSION['id'];
		  $query = mysqli_query($conn , $sql);
		  if($query){
			  echo '<div class="alert alert-success" role="alert">
 Password Change successfully!
</div>';
		  }
	}else{
		echo '<div class="alert alert-danger" role="alert">
  Password and Conferm Password not match!
</div>';
	}
	
}
?>
 <form method = "post" action = "<?php $_PHP_SELF ?>">
 
 <label for="exampleInputEmail1">Old Password</label>
 <input value="<?php echo $results['pwdUsers'] ?>"  name = "" class="form-control" type = "password"   id = "" readonly>
 
  <label for="exampleInputEmail1">New Password</label>
  <input required class="form-control" name = "npass" type = "password" id = "">
	
            <label for="exampleInputEmail1">Conferm Password</label>
            <input required class="form-control" name = "cnpass" type = "password"  id = "">
			
          
                   </br>
            <input class="btn btn-primary" name = "submit" type = "submit" id = "add" value = "Change Password">
                      
               </form>
			   </div>
			   </div>
			   <?php
          }
          ?>
        </section>
      </div>
      </div>
    </main>

<?php

  require "footer.php";
?>