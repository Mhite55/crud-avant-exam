<?php

session_start();
session_destroy();
unset($_SESSION["name"]);
header("Location:../view/home.php");
exit;