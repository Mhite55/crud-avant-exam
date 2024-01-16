<?php
    include_once 'base.php';
    include_once '../model/pdo.php';

    if (!empty($_POST['user']) && !empty($_POST['psw'])){
        $user = $_POST['user'];
        list($initial, $l_name) = explode(".", $user);
        $sql = "SELECT * FROM user WHERE SUBSTRING(first_name, 1,1)='$initial' AND name='$l_name'";
        $stmt = $pdo->query($sql);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ( $user ) {
            // le compte existe
            if (password_verify($_POST['psw'], $user['password'])) {
                $_SESSION["name"] = $user['name'];
                $_SESSION["token"] = bin2hex(random_bytes(16)) ; // Token de securité en binaire changer en héxadécimal  
                header('Location: home.php');
            }else {
                sendMessage("Mots de passe incorrect", "failed", "login.php");
            }
        }else {
            // le compte n'existe pas
            sendMessage("le compte n'existe pas", "failed", "login.php");
        }
    }else {
        //sendMessage("Veuillez remplir correctement le formulaire", "failed", "login.php");
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
    <h1 class="text-center mt-5 mb-5">Connexion</h1>

    <form id="form" class="mx-auto col-6" action="" method="post">

        <label for="user">Pseudo</label>
        <input class="form-control my-3" type="text" name="user" placeholder="Veuillez renseigner votre prenom+nom">

        <label for="psw">Mots de passe</label>
        <input class="form-control my-3" type="text" name="psw">

        <input type="submit" class="form-control btn btn-secondary mt-3" value="Connexion">
    </form>