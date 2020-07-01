<?php

include "includes/dbconnect.inc.php";
?>

<!DOCTYPE HTML>
<html lang="en">
<html>
<head>
	<meta charset="utf-8">

	<!-- The Name of Our Tab -->
	<title>Used Cars for Sale In Staten Island, NY | TopCars</title>

	<!-- Styles -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css?V=2.0">

	<!--Bootstrap Styles -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">

	<!--Bootstrap JS -->
	<script src="assets/js/bootstrap.min.js"></script>

</head>


<body>

	<!--Header-->
	<?php //include('includes/header.php');?>
	<!-- /Header --> 


	<!-- Banner -->
	<section id="banner" class="banner-section">
		<div class="banner_content">
			<h1 class="text-light h1">Find the perfect ride for you</h1>
			<p class="bg-light h4">Satisfaction Gauranteed or Your Money Back</p>
			<a href="about_us.php" class="btn btn-danger">Read More</a> 
		</div>
	</section>
	<!-- /Banner --> 


	<?php
			//Pagination

			// define how many results you want per page
	$results_per_page = 2;

			// find out the number of avaliable cars stored in database by counting number of PK's
	$sql='SELECT car_for_Sale_ID FROM cars_for_sale';
	$result = mysqli_query($conn, $sql);
	$number_of_results = mysqli_num_rows($result);


			// determine number of total pages available. ceil() rounds up to nearest whole number
			// if we have 6 results and we want 2 per page, we will have 3 total pages
	$number_of_pages = ceil($number_of_results/$results_per_page);

			// determine which page number visitor is currently on. Default is page 1
	if(isset($_GET["page"])){
		$page = intval($_GET["page"]);
	}
	else {
		$page = 1;
	}

			// determine the sql LIMIT starting number for the results on the displaying page

	$calc = $results_per_page * $page;
	$start = $calc - $results_per_page;

			// retrieve selected results from database and display them on page
	// $sql='SELECT a.car_for_sale_ID, a.registration_Year, a.manufacturer_shortName, a.model_Name, a.car_Category, a.car_Price, a.car_Mileage, a.car_Availability, b.featured_image_dir, b.image_description FROM cars_for_sale a, car_pictures b LIMIT ' . $start . ',' .  $results_per_page;
	
    $sql="SELECT * FROM cars_for_sale INNER JOIN car_pictures ON car_pictures.car_for_Sale_ID=cars_for_sale.car_for_Sale_ID LIMIT ".$start.",".$results_per_page;
	
    //print_r($sql);

    $result = mysqli_query($conn, $sql);

    //print_r($result);
 
	?>

	<!-- Featured Cars -->

	<section id="feature_cars" class="container-fluid bgblack">
		<div class="container">
			<h2  class="h2 text-center text-light p-4">Featured Inventory</h2>
			<div class="row">

				<?php 	 foreach ($result as $row) {?>
					<div class="col-sm-6">

						<div class="card m-2 bg-secondary text-light" >
							<a href="view-car.php?car_id=<?php echo $row['car_for_Sale_ID'] ?>"><img class="card-img-top" src="assets/images/<?php echo $row['featured_image_dir'] ?>" alt="Card image cap"></a>
							<div class="card-body">
								<h5 class="card-title"><?php echo $row['registration_Year']." ".$row['manufacturer_ShortName']." ".$row['model_Name'] ?></h5>
								<p class="card-text"></p><?php echo $row['car_Category'] ?></p>
								<p class="card-text"><?php echo $row['car_Mileage'] ?> miles</p>

								<a href="view-car.php?car_id=<?php echo $row['car_for_Sale_ID'] ?>" class="btn btn-danger btn-block"><?php echo $row['car_Price'] ?></a>
							</div>
						</div>

					</div>

				<?php } ?>

			</div>

			<!-- Needs to be styled -->
			<nav aria-label="Page navigation">
				<ul class="pagination justify-content-center mt-4 p-4"> 
					<!-- display the links to the pages -->
					<?php for ($page=1;$page<=$number_of_pages;$page++) { ?>

						<li class="page-item "><a class="page-link text-light bg-danger" href="home.php?page=<?php echo $page; ?>#feature_cars"><?php echo $page; ?></a></li>

					<?php } ?>
				</ul>
			</nav>

		</div>

	</section>
	<!-- /Featured Cars -->

</body>


</html>