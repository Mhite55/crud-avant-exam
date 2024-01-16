<?php
    include_once "base.php";
    include_once "../model/pdo.php";

    $id = $_GET['id'];
    $sql = "SELECT * FROM user WHERE id_user=$id";
    $stmt = $pdo->query($sql);
    $users = $stmt->fetch(PDO::FETCH_ASSOC);
?>

    <h1 class="text-center">Modification d'utilisateur</h1>

    <form id="form" class="mx-auto col-6" action="../controller/update_ctrl_users.php" method="POST">
        
        <label for="first_name">Nom</label>
        <input class="form-control" type="text" name="first_name" id="" value="<?= htmlentities($users['first_name']) ?>">
        
        <label for="name">Nom</label>
        <input class="form-control" type="text" name="name" id="" value="<?= htmlentities($users['name']) ?>">     
        
        <label for="job">Métier</label>
        <input class="form-control" type="text" name="job" id="" value="<?= htmlentities($users['job']) ?>">
        
        <label for="caterer">Traiteur</label>
        <div class="form-check"> 
            <input class="form-check-input" type="radio" name="caterer" value="1" id="">
            <label class="form-check-label" for="caterer">Oui</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="caterer" checked value="0" id="">
            <label class="form-check-label" for="caterer">Non</label>
        </div>

    <input type="hidden" name="id_user" value="<?= htmlentities($users['id_user']) ?>">

    <input class="form-control" type="submit" value="Faire les modifications">
    
</form>

<div class="text-center"><a class="btn btn-primary mt-3" href="update_mdp.php?id=<?=$id?>">Modifier le mot de passe en Cliquant ici !!</a></div>



</body>
</html>