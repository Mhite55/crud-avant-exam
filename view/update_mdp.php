<?php 
    include_once "base.php";
    include_once "../model/pdo.php";
?>
<h1 class="text-center mt-5 mb-5">Changement de mot de passe</h1>

<div id="message_psw" class="text-center"></div>

    <form id="form" action="../controller/update_mdp_ctrl.php" class="mx-auto col-6" method="POST">

        <label for="oldmdp">Mot de passe actuel</label>
        <input class="form-control my-3" type="text" name="oldmdp" placeholder="Veuillez renseigner votre Mots de passe actuel">

        <label for="newmdp">Nouveau Mot de passe</label>
        <input class="form-control my-3" type="text" name="newmdp" placeholder="Veuillez renseigner votre nouveau Mots de passe">
        
        <input type="hidden" name="id_user" value="<?= htmlentities($_GET['id']) ?>">

        <input type="submit" class="form-control btn btn-secondary mt-3" value="Changer">


    </form>
</body>
</html>
