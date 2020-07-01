<?php

  session_start();

  require "database.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="description" content="This is an example of a meta description. This will often show up in search results.">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="layout.css">
  </head>
  <body>

    <header>
      <nav class="nav-header-main">
        <a class="header-logo" href="index.php">
          <img src="img/logo.png" alt="logo">
        </a>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="save-car.php">Saved Cars</a></li>
          <li><a href="account.php">Account Info</a></li>
          <li><a href="customer.php">Customer Forms</a></li>
        </ul>
      </nav>
      <div class="header-login">

        <?php
        if (!isset($_SESSION['id'])) {
          echo '<form action="login.php" method="post">
            <input type="text" name="mailuid" placeholder="E-mail/Username">
            <input type="password" name="pwd" placeholder="Password">
            <button type="submit" name="login-submit">Login</button>
          </form>
          <a href="signup.php" class="header-signup">Signup</a>';
        }
        else if (isset($_SESSION['id'])) {
          echo '<form action="logout.php" method="post">
            <button type="submit" name="login-submit">Logout</button>
          </form>';
        }
        ?>
      </div>
    </header>
