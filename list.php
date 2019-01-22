<?php require_once('helper.php'); 


$bdd = dbConnect();

$request = "SELECT id, titre, adresse, ville, cp, surface, prix, type FROM logement";

$response = $bdd->query($request);

$bien = [];

while ($place = $response->fetch()) {
    $bien[] = $place;
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des biens</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">

                <p>
                    <h1>Liste des biens</h1>
                    <a href="add.php" class="btn btn-sm btn-danger">Ajouter un bien</a>
                    <hr>
                    <ul class="list-group">
                    <?php   
                        if (!empty($_SESSION['element_doesnt_exist'])) {
                            echo '<li class="list-group-item list-group-item-danger">Attention, le bien demandé n\'existe pas ou a été supprimé.</li>';
                            unset($_SESSION['element_doesnt_exist']);
                        }
                    ?>
                    </ul>
                </p>


                <table class="table">
                    <tr>
                        <th>Titre</th>
                        <th>Adresse</th>
                        <th>Ville</th>
                        <th>Code Postale</th>
                        <th>Surface</th>
                        <th>Prix</th>
                        <th>Type</th>
                        <th>Photo</th>
                        <th></th>
                    </tr>

                    <?php foreach($bien as $b) { ?>
                        <tr>
                            <td><?= $b['titre']; ?></td>
                            <td><?= $b['adresse']; ?></td>
                            <td><?= $b['ville']; ?></td>
                            <td><?= $b['cp']; ?></td>
                            <td><?= $b['surface']; ?></td>
                            <td><?= $b['prix']; ?></td>
                            <td><?= $b['type']; ?></td>
                            <td><?= $b['photo']; ?></td>
<!-- je n'arrive pas à mettre mon image dans sa colonne, donc j'ai crée une page show.php afin qu'on puisse le voir // 
chose étrange, quand on fait un click-droit sur l'image 'cassé' dans list.php on tombe sur mon index uploads -->
                            <td>
                                <a href="show.php?id=<?= $b['id']; ?>" class="btn btn-sm btn-primary">Plus d'infos</a>
                                </td>
                        </tr>
                    <?php } ?>
                </table>

            </div>
        </div>
    </div>
</body>
</html>

