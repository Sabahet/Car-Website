<?php 
	if(isset($_GET['car_id'])){

		$car_id = $_GET['car_id'];

		 $car_id;
	}
	
	  require "header.php";
if(isset($_GET['del_id'])){

		$del_id = $_GET['del_id'];

		// sql to delete a record
  $sql = "DELETE FROM saved_cars WHERE id='$del_id'";

if ($conn->query($sql) === TRUE) {
	echo "<script>window.location.href='save-car.php'</script>";
  echo '<div class="alert alert-danger" role="alert">Record deleted successfully</div>';

} else {
  echo "Error deleting record: " . $conn->error;
}
	}
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
      <div class="wrapper-main1">
        <section class="section-default">
    <link rel="stylesheet2" href="style.css">
          <?php
          if (!isset($_SESSION['id'])) {
            echo '<p class="login-status">You are logged out!</p>';
          }
          else if (isset($_SESSION['id'])) {
			  $uidd = $_SESSION['id'];
            echo '<p class="login-status">Saved Cars</p>';
           ?>
		   <?php 	
       if(!empty($car_id)){
 $sql="SELECT * FROM cars_for_sale where car_for_Sale_ID  = '$car_id'";

 $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($result);

$user_id = $_SESSION['id'];
$manufacturer_ShortName = $data['manufacturer_ShortName'];
$model_Name = $data['model_Name'];
$car_Category = $data['car_Category'];
$car_Price = $data['car_Price'];
$car_Mileage = $data['car_Mileage'];
$registration_Year = $data['registration_Year'];
$carid = $car_id;


	

	

    $sql1="SELECT carid FROM saved_cars where carid  = '$car_id' AND user_id='$uidd'";
	$result1 = mysqli_query($conn, $sql1);
	$data1 = mysqli_num_rows($result1);
	
	if($data1 == 0){
		$sql = "INSERT INTO saved_cars (user_id, manufacturer_ShortName	, model_Name,car_Category,car_Price,	car_Mileage,registration_Year,carid)
VALUES ('$user_id', '$manufacturer_ShortName', '$model_Name', '$car_Category','$car_Price','$car_Mileage','$registration_Year','$carid')";
	
if ($conn->query($sql) === TRUE) {
  echo '<div class="alert alert-success" role="alert">Thank you, your cars save in your account.</div>';
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
	}else{
		 echo '<div class="alert alert-danger" role="alert">The car is already saved to your account</div>';
	}

	
	   }
	   
	   
	if(empty($car_id) || !empty($car_id)){
	   $sqls="SELECT * FROM saved_cars INNER JOIN car_pictures ON car_pictures.car_for_Sale_ID=saved_cars.carid where saved_cars.user_id=".$_SESSION['id'];
	
    

    $result = mysqli_query($conn, $sqls);
    $result1 = mysqli_fetch_all($result);
	
	
	
	
 ?>
 
 <div class="container">
            
  <table class="table">
    <thead>
      <tr>
        <th>Image</th>
        <th>Manufacturer ShortName</th>
        <th>Model Name</th>
        <th>Car Category</th>
        <th>Car Price</th>
        <th>Car Mileage</th>
        <th>Registration Year</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
	<?php 
	foreach($result1 as $row){
	//echo "<pre>";
	//print_r($row);
	?>
      <tr>
        <td><img style="width: 100px;" src="assets/images/<?php echo $row['12']?>"></td>
        <td><?php echo $row['3']?></td>
        <td><?php echo $row['4']?></td>
        <td><?php echo $row['5']?></td>
        <td><?php echo $row['6']?></td>
        <td><?php echo $row['7']?></td>
        <td><?php echo $row['8']?></td>
        <td><a href="save-car.php?del_id=<?php echo $row['0']?>">Delete</td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
</div>


		   <?php
	}  
          
		  }
          ?>
        </section>
      </div>
    </main>

<?php

  require "footer.php";
?>