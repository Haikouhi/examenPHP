<?php require_once('helper.php'); 


$bdd = dbConnect();

$response = $bdd->query('SELECT * FROM logement WHERE id = ' . $_GET['id']);

$place = $response->fetch();

if (!$place) {
    $_SESSION['element_doesnt_exist'] = true;
    Header('Location: list.php');
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $place['titre']; ?> (<?= $place['ville']; ?>)</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-12">

            <h1><?= $place['titre']; ?> (<?= $place['adresse']; ?>)</h1>
            <small>Vendu à <?= $place['ville']; ?> , <?= $place['cp']; ?>. Avec une surface de <?= $place['surface']; ?> m², au prix de <?= $place['prix']; ?> €.</small>

            <hr>
            <blockquote class="blockquote">
                <p class="mb-0">
                    Un bien en <?= $place['type']; ?>.
                    <br>
                </p>
               

                <img src="uploads/<?= $place['photo']; ?>" alt="picture">
            </blockquote>

                <a href="list.php">Retour à la liste</a>
            </div>
        </div>
    </div>
    
</body>
</html>

















?>