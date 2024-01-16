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
                            <a class='text-decoration-none' data-toggle='tooltip' data-placement='top' title='Modifier un utilisateur' href='update_user.php?id=$user[id_user]'>🧬</a>
                    </td>";
            $table .="<tr>";
        }
        echo $table;
?>
    </tbody>
</table>