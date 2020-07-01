<?php require "header.php"; ?>
<?php 
//retrieve the carID from previous home.php on click
$car_id = 0;
	if(isset($_GET['car_id'])){

		$car_id = (int) $_GET['car_id'];

	}

include "includes/dbconnect.inc.php";

//select everything from cars_for_sale where the carID matches the user clicked ID
$getCarQuery = "SELECT * FROM cars_for_sale WHERE car_for_Sale_ID = $car_id";

//get all the picture directories associated with that car
$getCarImagesQuery = "SELECT * FROM car_pictures WHERE car_for_Sale_ID = $car_id";

//get all the corresponding car features for that specific car
$carFeaturesQuery = "SELECT * FROM features_on_cars_for_sale WHERE car_for_Sale_ID = $car_id";

//running three seperate queries makes it faster (according to the professor)
$resultCar = mysqli_query($conn, $getCarQuery);
$resultImages = mysqli_query($conn, $getCarImagesQuery);
$resultFeatures = mysqli_query($conn, $carFeaturesQuery);

//declare three arrays to store our results
$carData = [];
$carImages = [];
$carFeatures = [];

//populate the three arays with results from respective data queries
	//one to one relationship here
foreach($resultCar as $r) {
	$carData[] = $r;
}
	//one to many relationship here
foreach($resultImages as $ri) {
	$carImages[] = $ri;
}

	//many to many relationship here
foreach($resultFeatures as $rf) {
	$fid = $rf['car_Feature_ID'];
	$gf = "SELECT * FROM car_features WHERE car_feature_ID = $fid";
	$gf = mysqli_query($conn, $gf);
	foreach($gf as $features) {
		$carFeatures[] = $features;
	} 
}
$carData = $carData[0];
$carImages = $carImages[0];


//queries to get the respective car category information (i.e. Truck is a 4 wheel vechicle...) and the full manaufacturer name (i.e. General Motors is the fullname for Buick)
	//notice only one record is returned (one-to-one)
$carCategoriesQuery = "SELECT * FROM car_categories WHERE car_Category ='" . $carData['car_Category'] . "' LIMIT 0,1";
$carManufacturerQuery = "SELECT * FROM car_manufacturers WHERE manufacturer_ShortName ='" . $carData['manufacturer_ShortName'] . "' LIMIT 0,1";

//execute the queries above
$resultCategories = mysqli_query($conn, $carCategoriesQuery);
$resultManufacturer = mysqli_query($conn, $carManufacturerQuery);

//two more variables to contain our results
$carCategory = [];
$carManufacturer = [];

foreach($resultCategories as $rc) {
	$carCategory[] = $rc;
}

foreach($resultManufacturer as $rm) {
	$carManufacturer[] = $rm;
}

$carCategory = $carCategory[0];
$carManufacturer = $carManufacturer[0];

//if the car is avaliable, the button is green. if it is not avaliable, it is red. This is based on an ENUM
$availabilityColor = ($carData['car_Availability'] == 'Available') ? 'btn-success' : 'btn-danger';
?>

<!DOCTYPE HTML>
<html lang="en">
<html>
<head>
	<meta charset="utf-8">

	<!-- The Name of Our Tab -->
	<title><?= $carData['registration_Year'] ?> <?= $carData['manufacturer_ShortName'] ?> <?= $carData['model_Name'] ?></title>

	<!-- Styles -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css?V=2.0">

	<!--Bootstrap Styles -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">

	<!--Bootstrap JS -->
	<script src="assets/js/bootstrap.min.js"></script>

</head>
<body class="bgblack">

	<!-- Extra NAV BAR just to redirect to home. Don't forget to get rid of this at code submission -->
	<!--
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <a class="navbar-brand" href="home.php">Navbar</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
	      </li>
	    </ul>
	  </div>
	</nav>
	-->
	<!-- Extra NAV BAR just to redirect to home. Don't forget to get rid of this at code submission -->

	<div class="container mt-2">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="card m-2 bg-secondary text-light">
					<div class="card-body">
						<h3><span class="btn <?= $availabilityColor ?>"><?= $carData['car_Availability'] ?></span> <?= $carData['registration_Year'] ?> <?= $carData['manufacturer_ShortName'] ?> <?= $carData['model_Name'] ?></h3>
						<span>Manufacturer: <?= $carManufacturer['manufacturer_FullName'] ?></span><br>
						<span>Price: <?= $carData['car_Price'] ?></span><br>
						<span>Mileage: <?= $carData['car_Mileage'] ?> mi</span>
						<hr style="color:red; background-color:white; height:2px; border:none;">
						<img src="<?= 'assets/images/' . $carImages['featured_image_dir'] ?>" class="img-fluid" width="100%" alt="<?= $carImages['image_description'] ?>">
						<div class="row mt-2">
							<div class="col-md-6">
								<a href="customer.php" class="btn-primary btn btn-block">Schedule An Appointment</a>
							</div>
							<div class="col-md-6">
								<a href="save-car.php?car_id=<?php echo $car_id ?>" class="btn-danger btn btn-block">Save This Car</a>
							</div>
						</div>
						<hr style="color:red; background-color:white; height:2px; border:none;">
						<h5 class="text-center">Gallery</h5>
						<img src="<?= 'assets/images/' . $carImages['image1_dir'] ?>" class="img-thumbnail m-2" width="33%" style="height:170px" alt="">
						<img src="<?= 'assets/images/' . $carImages['image2_dir'] ?>" class="img-thumbnail m-2" width="33%" style="height:170px" alt="">
						<img src="<?= 'assets/images/' . $carImages['image3_dir'] ?>" class="img-thumbnail m-2" width="33%" style="height:170px" alt="">
						<hr style="color:red; background-color:white; height:2px; border:none;">
						<h5 class="text-center">Category</h5>
						<hr style="color:red; background-color:white; height:2px; border:none;">
						<?php
							echo "<b>" . $carCategory['car_Category'] ."</b>";
							echo "<p>" . $carCategory['category_Information'] ."</p><hr>";
						?>
						<hr style="color:red; background-color:white; height:2px; border:none;">
						<h5 class="text-center">Features</h5>
						<hr style="color:red; background-color:white; height:2px; border:none;">
						<?php
						foreach ($carFeatures as $feature) {
							echo "<b>" . $feature['car_Feature_Name'] ."</b>";
							echo "<p>" . $feature['car_Feature_Description'] ."</p><hr>";
						}
						?>
					</div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</body>


</html>