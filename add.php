<?php require_once('helper.php'); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Immobiler</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">


<!-- afin de rendre le formulaire plus élégant, j'ai utilisé ton code Thomas, sorry :D -->
                <p class="lead">
                    <h2>Ajouter un bien</h2>
                    <a href="list.php" class="btn btn-sm btn-warning">< retour</a>
                    <br>
                    <ul class="list-group">
                    <?php   
                        if (!empty($_SESSION['form_error'])) {
                            foreach($_SESSION['form_error'] as $err) {
                                
                                echo '<li class="list-group-item list-group-item-danger">'.$err.'</li>';
                            }
                            $_SESSION['form_error'] = [];
                        }
                    ?>
                    </ul>
                </p>


<!-- formulaire -->
                <form action="save.php" method="post" enctype="multipart/form-data">

                <!-- pour faciliter l'écriture du code et pour éviter de faire des erreures de saisi je vais utiliser les mêmes termes pour mes id et mes names :) -->

            <!-- titre -->
                <label for="titre">Le bien proposé:</label>
                <small>max 50 caractères.</small>
                <input id="titre" class="form-control" type="text" name="titre" required>

            <!-- adresse -->
                <label for="adresse">L'adresse:</label>
                <small>max 50 caractères.</small>
                <input id="adresse" class="form-control" type="text" name="adresse" required>

            <!-- ville             -->
                <label for="ville">La ville:</label>
                <small>max 50 caractères.</small>
                <input id="ville" class="form-control" type="text" name="ville" required>


            <!-- cp -->
                <label for="cp">Le code postale:</label>
                <small>max 5 caractères.</small>
                <input id="cp" class="form-control" type="text" name="cp" required>

            <!-- surface -->
                <label for="surface">Surface:</label>
                <input class="form-control" type="number" name="surface" min= "0" max="5000000" id="surface" required>


            <!-- prix -->
                <label for="prix">Prix</label>
                <input class="form-control" type="number" name="prix" min= "50000" max="5000000" id="prix" required>


            <!-- photo -->
                <label for="photo">Photo</label>
                <input type="file" name="photo" id="photo" class="form-control">

            <!-- type -->
                 <label for="type">Type:</label>
                    <select id="type" class="form-control" name="type" required>
                    <option disabled selected>Veuillez choisir un type...</option>
                        <option value="location">Location</option>          
                        <option value="vente">Vente</option>
                        
                    </select>

            <!-- description -->
                <label for="description">Description du bien:</label>
                <textarea id="description" class="form-control" cols="30" rows="10" name="description"></textarea>

                    <hr>
                    
                    <button class="btn btn-primary float-right" type="submit">Envoyer</button>
                </form>

            </div>
        </div>
    </div>
</body>
</html>

