<?php
session_start();
session_unset();
session_destroy();
header("Location: ../Project2.0/index.php");
