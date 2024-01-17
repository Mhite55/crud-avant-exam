<?php
    include_once "base.php";


    if ( isset($_SESSION['name'])) {
        echo "<h2 class='text-center my-3 text-primary'>Bonjour $_SESSION[name] !</h2>";
        echo "<h2 class='text-center my-3 text-primary'>Bonjour $_SESSION[token] !</h2>";
    }
