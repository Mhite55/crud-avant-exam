<?php 
    include_once "../model/pdo.php";

if (!empty($_POST["oldmdp"]) && !empty($_POST["newmdp"])) {
  $id = $_POST['id_user'];
  $sql_old_psw = "SELECT password FROM user WHERE id_user=$id";
  $stmt_old_psw = $pdo->query($sql_old_psw);
  $password = $stmt_old_psw->fetch(PDO::FETCH_ASSOC);
  $password = $password['password'];
    if (password_verify($_POST["oldmdp"], $password)){
        if ($_POST["oldmdp"] != $_POST["newmdp"]) {
            $psw = password_hash($_POST["newmdp"], PASSWORD_ARGON2I);
            try {
                $sql = "UPDATE user SET password=? WHERE id_user=? ";
                $stmt = $pdo->prepare($sql);
                if ($stmt->execute([$psw, $id])) {
                    sendMessage("La personne est modifiée ! ! !", "success", "../view/index_user.php");
                } else {
                    sendMessage("probleme technique Le dev est nul !", "failed", "../view/update_mdp.php?id=$_POST[id_user]");
                }
            }catch (Exception $e) {
                sendMessage($e->getMessage(), "failed", "../view/update_mdp.php?id=$_POST[id_user]");
            }    
        }else {
            sendMessage("Vos modifications ne sont pas bonne !", "failed", "../view/update_mdp.php?id=$_POST[id_user]");
        }    
    }else {
        sendMessage("mots de passe incorrect !", "failed", "../view/update_mdp.php?id=$_POST[id_user]");
    }
}else {
    sendMessage("Vos modifications ne sont pas bonne !", "failed", "../view/update_mdp.php?id=$_POST[id_user]");
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