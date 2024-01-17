<?php
   include_once "../model/pdo.php";
   session_start(); 
   
if (isset($_GET['id']) && isset($_GET['token'])) {
    if ($_GET['token'] === $_SESSION['token']) {
        $id = $_GET['id'];
        $sql = "DELETE FROM user WHERE id_user=$id";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([])) {
            sendMessage("La personne est supprimée ! ! !", "success", "../view/index_user.php");
        } else {
            sendMessage("probleme technique Le dev est nul !", "failed", "../view/index_user.php");
        }
    }else {
        sendMessage("le techinque aled!", "failed", "../view/index_user.php");
    }
}else {
    sendMessage("input de merde!", "failed", "../view/index_user.php");
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