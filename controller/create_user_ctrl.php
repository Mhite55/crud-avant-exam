<?php

include_once "../model/pdo.php";


if(!empty($_POST["name"]) && !empty($_POST["first_name"]) 
&& !empty($_POST["password"]) && !empty($_POST["job"])){

try {
    $psw = password_hash($_POST["password"], PASSWORD_ARGON2I);
    $sql = "INSERT INTO user (name, first_name, job, caterer, password) VALUES (?,?,?,?,?) " ; 
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_POST["name"], $_POST["first_name"], $_POST["job"], (int)$_POST["caterer"], $psw]);
    sendMessage("Utilisateur créer","success","../view/create_user.php");
} catch (Exception $error) {
    sendMessage($e->getMessage(),"failed","../view/create_user.php");
}
}else{
    sendMessage("Veuillez remplir correctement le formulaire", "failed","../view/create_user.php");
}

function sendMessage(string $message,string $status, string $location, int|null $page=null, bool $hasAIdBefore = false) :void{ //void = la fonction ne retourne rien
    // S'il y a un id avant nous remplaceront le "?" de l'url par un &
    $replace = !$hasAIdBefore ? "?" : "&";
    if ($page == null) {
        header("Location:$location" . $replace ."message=$message&status=$status");
        exit;
    }else{
        header("Location:$location" . $replace ."page=$page&message=$message&status=$status");
        exit;
    }
    
}