<?php
    include_once "base.php";   
    include_once "../model/pdo.php";


    if (isset($_GET['id']) ) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM user WHERE id_user=$id";

        $stmt = $pdo->query($sql);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
?>

    <h1 class="text-center mt-4"><?= "$user[first_name] $user[name]" ?></h1>

    <h2 class="text-center "id='message'></h2>

    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="text-center">
                    <img src="../img/IMG_0012.jpg" class="image-fluid rounded mt-5"  width="50%" alt="Imaginez un utilisateur malheureux sur cette photo">
                </div>
                <div class="bg-warning mt-3 w-50 mx-auto p-2">
                    <h2 class='text-center'>Attention</h2>
                    <p class='text-center'>Il se peut que l'image ne soit pas contractuelle</p>
                </div>
            </div>
            <div class="col-6">
                <ul class='list-group mt-5'>
                    <li class="list-group-item text-center">Traiteur : <?= $user["caterer"] == "0" ? "<span>non</span>" : "<span>Oui</span>" ?></li>
                    <li class="list-group-item text-center">job:  <?=htmlentities($user['job'])?></li>
                </ul>
                
            </div>
        </div>
    </div>
    <?php }?>

</body>
</html>