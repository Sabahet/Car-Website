<?php include "footer.php"; ?>
<?php require "header.php"; ?>

<!DOCTYPE HTML>
<html lang="en">
<html>
<head>
	<meta charset="utf-8">

	<!-- The Name of Our Tab -->
	<title>About Us | TopCars</title>

	<!-- Styles -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css?V=2.0">

	<!--Bootstrap Styles -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">

</head>

<!-- Reusing the style we used in home.php for featuring cars -->
<section id="feature_cars" class="container-fluid bgblack">
	<!-- Attempt at responsiveness-->
<div class="container-fluid pt-5 bg-dark">
	<div>
		<h1 style="color:#00D5FF">Our Professional Team</h1>
		<p class="text-center" style="color:red">Certified Web Developers at Top Cars</p>
	</div>

	<!-- Opens up a row so the images can be lined up horizontally-->
	<div class="row" style="padding-left:118px;">

		<!--Bootstrap grid system: 4 to have 3 images span symetrically in size-->
		<div class="col-md-4">
			<div class="card m-4 bg-secondary text-light" style="width: 24rem;">
			<!-- The line below can replace the line above. Will make the 3 images perfectly lined up. At the cost of picture resolution
			<div class="card m-4 bg-secondary text-light">
			-->
				<!-- Teamate 1 -->
				<h5 class="text-center">Sabahet Alovic</h5>
				<p class="text-center">Certified Backend Web Developer</p>
				<img src="img/sab.png" height=400px width=100px class="card-img-top" alt="...">
			</div>
			<div class="card-body">
				<a href="https://www.linkedin.com/in/sabahet-alovic-51192419b/" class="btn btn-primary">Sabahets's LinkedIN</a>
			</div>
		</div>

				<!-- Teamate 2 -->
		<div class="col-md-4">
			<div class="card m-4 bg-secondary text-light" style="width: 24rem;">
				<h5 class="text-center">Yoseph Ahmed</h5>
				<p class="text-center">Full Stack Developer</p>
				<img src="img/yoseph.jpg" height=400px width=100px class="card-img-top" alt="...">
			</div>
			<div class="card-body">
				<a href="https://www.linkedin.com/in/yoseph-ahmed/" class="btn btn-primary">Yoseph's LinkedIN</a>
			</div>
		</div>

				<!-- Teamate 3-->
		<div class="col-md-4">
			<div class="card m-4 bg-secondary text-light" style="width: 24rem;">
				<h5 class="text-center">Shawn Abraham</h5>
				<p class="text-center">Certified Backend Web Developer</p>
				<img src="img/shawn.jpg" height=400px width=100px class="card-img-top" alt="...">
			</div>
			<div class="card-body">
				<a href="https://www.linkedin.com/in/shawn-e-abraham/" class="btn btn-primary">Shawn's LinkedIN</a>
			</div>
		</div>

		<!--Close the row-->
	</div>

	<!-- Mission Statement Below -->
	<div class="row" style="padding-left:450px;padding-top:25px;">
		<div class="col-md-8">
			<div class="card m-8 bg-secondary text-light">
			<!-- The line below can replace the line above. Will make the the box take up 66% perfectly lined up
			<div class="card m-4 bg-secondary text-light">
			-->
				<!-- Teamate 1 -->
				<!-- Reuses the styling for pagination at home.php -->
				<nav aria-label="Page navigation">
					<ul class="pagination justify-content-center mt-4 p-1"> 
						<li class="page-item "><a class="page-link text-light bg-danger">Our Mission Statement</a></li>
					</ul>
				</nav>

				<p class="text-center">Since opening our doors over 25 years ago, our Staten Island used car dealership hasn’t budged in its core values: Honest, straightforward business done with integrity. There are no high-pressure sales or gimmicks at Top Cars- just great vehicles sold by real people.</p>

				<p class="text-center">We believe in building customer relationships the old fashioned way: by exceeding expectations. Everyone on our team goes above and beyond to help our customers find exactly what they’re looking for from our inventory of hand-selected and extensively inspected cars, trucks, vans, and SUVs. It’s that world-class service that brings customers back to Staten Island for their second, third and fourth used car.</p>

			</div>
		</div>

		<!-- Location Box -->
		<div class="col-md-8" style="padding-bottom:75px;">
			<div class="card m-8 bg-secondary text-light">
				<nav aria-label="Page navigation">
					<ul class="pagination justify-content-center mt-4 p-1"> 
						<li class="page-item "><a class="page-link text-light bg-danger">Location and More Details</a></li>
					</ul>
				</nav>

				<p class="text-center">Staten Island Top Used Cars</p>
				<p class="text-center">2800 Victory Blvd</p>
				<p class="text-center">Staten Island, NY 10314</p>
				<p class="text-center">Sales - By Appt Only: (201) 204-9845</p>
				<p class="text-center">Hours - Mon-Fri 8AM to 5PM</p>
				<a href="https://www.google.com/maps/place/CUNY+College+of+Staten+Island/@40.6021429,-74.1525704,17z/data=!3m1!4b1!4m5!3m4!1s0x89c24c45d456a839:0xbf9cdf275b26f7b9!8m2!3d40.6021388!4d-74.1503817" class="btn">Get Directions</a> 
			</div>
		</div>

	<!-- CLose the row-->
	</div>

</div>
</section>

