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
            echo '<p class="login-status">Welcome!</p>';
            include "home.php";

            // echo 'Welcome ' username //
            
          }
          ?>
        </section>
      </div>
    </main>

<?php

  require "footer.php";
?>
