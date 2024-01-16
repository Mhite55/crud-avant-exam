<?php

include_once "../model/pdo.php";
session_start();


if(!empty($_POST["name"]) && !empty($_POST["first_name"]) && !empty($_POST["job"])&& !empty($_POST["id_user"])) {
 
    $data = [$_POST["name"], $_POST["first_name"], $_POST["job"], $_POST["caterer"], $_POST['id_user']];
    try {
        $sql = "UPDATE user SET name=?, first_name=?, job=?, caterer=? WHERE id_user=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
        sendMessage("La personne est modifiée ! ! !", "success", "../view/index_user.php");
    }catch(Exception $e){
        sendMessage($e->getMessage(), "failed", "../view/update_user.php?id=$_POST[id_user]");
    }
    
}else {
    sendMessage("Vos modifications n'ont pas été prises en compte !", "failed", "../view/update_user.php?id=$_POST[id_user]");
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
?>