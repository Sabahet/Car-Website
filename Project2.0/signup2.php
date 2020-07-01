<?php

//Makes sure thre user didnt illegaly eneter the signup page through athe URL, i avoided using the GET method since thats not that secure//

if (isset($_POST['signup-submit'])) {


  require 'database.php';

  $username = $_POST['uid'];
  $email = $_POST['mail'];
  $password = $_POST['pwd'];
  $passwordRepeat = $_POST['pwd-repeat'];


// All these if statements check to see if the user is entering the feilds properly. The last line for all of them bassically brings them back to the signup page if they dont properly fill it out.//

  if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
    header("Location: ../Project2.0/signup.php?error=emptyfields&uid=".$username."&mail=".$email);
    exit();
  }

  else if (!preg_match("/^[a-zA-Z0-9]*$/", $username) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../Project2.0/signup.php?error=invaliduidmail");
    exit();
  }

  else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    header("Location: ../Project2.0/signup.php?error=invaliduid&mail=".$email);
    exit();
  }

  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../Project2.0/signup.php?error=invalidmail&uid=".$username);
    exit();
  }
  
  else if ($password !== $passwordRepeat) {
    header("Location: ../Project2.0/signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
    exit();
  }
  else {



//-------------------------------------------------------------//

    //This code acsesses the database and uses prepared statements that are secure, so code cant be injected.//

    $sql = "SELECT uidUsers FROM users WHERE uidUsers=?;";

    $stmt = mysqli_stmt_init($conn); // This uses the connection variable from database.php//
    

    // if there is no connection error is trown.//
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      
      header("Location: ../Project2.0/signup.php?error=sqlerror");
      exit();
    }
    else {
 //takes the user information and stores it into the database.//

      mysqli_stmt_bind_param($stmt, "s", $username); //<-the "s" means string
      
      mysqli_stmt_execute($stmt); // This runs it into the database
   
      mysqli_stmt_store_result($stmt);
      
      $resultCount = mysqli_stmt_num_rows($stmt); // Checks the number of rows that match, if there is more than 1 the user was taken.
      
      mysqli_stmt_close($stmt);

//If the username is taken display "username taken"//
      if ($resultCount > 0) {
        header("Location: ../Project2.0/signup.php?error=usertaken&mail=".$email);
        exit();
      }
      else {
          $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?);"; //These are the three values created in the database table. That are now being inserted.
 
        $stmt = mysqli_stmt_init($conn);
  
        if (!mysqli_stmt_prepare($stmt, $sql)) {
    
          header("Location: ../Project2.0/signup.php?error=sqlerror");
          exit();
        }
        else{
       //Hashed password to protect data//
         $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

          mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd); // Three S's becasue three variables being used all string type

          mysqli_stmt_execute($stmt);
      
      // sends the user back to the signup page with a success message//
          header("Location: ../Project2.0/signup.php?signup=success");
          exit();

        }
      }
    }
  }
 //Closing statements ends the database connection//
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
else {

  header("Location: ../Project2.0/signup.php");
  exit();
}
