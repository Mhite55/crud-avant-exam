<?php
    include_once "base.php";
?>
    <h1 class="text-center mt-5 mb-5">Ajouter un utilisateur</h1>

    <form id="form" class="mx-auto form col-6" action="../controller/create_user_ctrl.php" method="POST">

        <label for="name">Nom</label>
        <input class="form-control" type="text" name="name" id="">

        <label for="first_name">Prénom</label>
        <input class="form-control" type="text" name="first_name"id="">

        <label for="password">Mots de Passe</label>
        <input class="form-control" type="text" name="password" id="">

        <label for="job">Métier</label>
        <input class="form-control" type="text" name="job" id="">

        <label for="caterer">Traiteur</label>
        <div class="form-check"> 
            <input class="form-check-input" type="radio" name="caterer" value="1" id="">
            <label class="form-check-label" for="caterer">Oui</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="caterer" checked value="0" id="">
            <label class="form-check-label" for="caterer">Non</label>
        </div>

        <input class="form-control btn btn-secondary mt-3" type="submit" value="Ajouter l'utilisateur">

    </form>

</body>
</html>