<?php

if (isset($_POST['login-submit'])) {


  require 'database.php';

  $mailuid = $_POST['mailuid'];
  $password = $_POST['pwd'];


  if (empty($mailuid) || empty($password)) {
    header("Location: ../Project2.0/index.php?error=emptyfields&mailuid=".$mailuid);
    exit();
  }
  else {


    $sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?;";
   
    $stmt = mysqli_stmt_init($conn);
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      
      header("Location: ../Project2.0/index.php?error=sqlerror");
      exit();
    }
    else {

      mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
      
      mysqli_stmt_execute($stmt);
      
      $result = mysqli_stmt_get_result($stmt);
      
      if ($row = mysqli_fetch_assoc($result)) {
        
        $pwdCheck = password_verify($password, $row['pwdUsers']);
       
        if ($pwdCheck == false) {
          header("Location: ../Project2.0/index.php?error=wrongpwd");
          exit();
        }
     
        else if ($pwdCheck == true) {

  
          session_start();
          
          $_SESSION['id'] = $row['idUsers'];
          $_SESSION['uid'] = $row['uidUsers'];
          $_SESSION['email'] = $row['emailUsers'];

          header("Location: ../Project2.0/index.php?login=success");
          exit();
        }
      }
      else {
        header("Location: ../Project2.0/index.php?login=wronguidpwd");
        exit();
      }
    }
  }
  
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
else {
 
  header("Location: ../Project2.0/signup.php");
  exit();
}
