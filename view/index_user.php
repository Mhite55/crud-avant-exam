<?php 

include_once 'base.php';
include_once "../model/pdo.php";

?>
 <h1 class="text-center">Liste des utilisateur</h1>

 <table class="table table-striped">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Metier</th>
            <th>Traiteur</th>
            <th>Option</th>
            </tr>
    </thead>
    <tbody>
    <?php 
        
        $token = $_SESSION['token'];
        $sql = "SELECT * FROM user WHERE id_user ";
        $stmt = $pdo->query($sql);
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $table = "";
        foreach ($users as $user ) {
            $table .="<tr>";
            $table .="<td>" . htmlentities($user['name']) . "</td>"; 
            $table .="<td>" . htmlentities($user['first_name']) . "</td>"; 
            $table .="<td>" . htmlentities($user['job']) . "</td>"; 
            if ($user['caterer'] == 0) {
                $traiteur = "non";
            }else {
                $traiteur = "oui";
            }
            $table .="<td>" . $traiteur . "</td>";

            $table .="<td>
                            <a class='text-decoration-none' data-toggle='tooltip' data-placement='top' title='Info Technique sur l'utilisateur' href='read_user.php?id=$user[id_user]'>👁️</a>
                            <a class='text-decoration-none bomb' data-bs-toggle='modal' data-link='../controller/delete_ctrl_users.php?id=$user[id_user]&token=$token' date-placement='top' data-bs-target='#validation_delete'>✝</a>
                            <a class='text-decoration-none' data-toggle='tooltip' data-placement='top' title='Modifier un utilisateur' href='update_user.php?id=$user[id_user]'>🧬</a>
                    </td>";
            $table .="<tr>";
        }
        echo $table;
?>
    </tbody>
</table>
<!-- Modal -->
<div class="modal fade" id="validation_delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Suppression</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Voulez vous supprimée cet(te) enfant ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <a class="btn btn-primary" href="../controller/delete_ctrl_users.php?id=<?= $user['id_user']?>&token=<?=$token?>" id="delete" >SUPPRIMER</a>
      </div>
    </div>
  </div>
</div>

</body>
</html>

<script>
const deleteBtn = document.getElementById('delete');
const bombs = document.querySelectorAll('.bomb');

for (link of bombs) {
    link.addEventListener('click', function(){
        let href = this.dataset.link;
        deleteBtn.href = href;
    })
}
</script>