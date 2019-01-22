<?php require_once('helper.php'); 

// var_dump($_POST);
// verification pour etre sur que les infos du formalaire sont bien transmis




$_SESSION['form-error'] = [];

// Validations


// titre
if (empty($_POST['titre'])) {
    echo formError("Le titre ne doit pas être vide.");
}
elseif(strlen($_POST['titre']) > 50) {
    echo formError("Le titre ne doit pas faire plus de 50 caractères.");
}
else {
    $titre = $_POST['titre'];
}


// adresse
if (empty($_POST['adresse'])) {
    echo formError("L'adresse ne doit pas être vide.");
}
elseif(strlen($_POST['adresse']) > 50) {
    echo formError("L'adresse ne doit pas faire plus de 50 caractères.");
}
else {
    $adresse = $_POST['adresse'];
}


// ville
if (empty($_POST['ville'])) {
    echo formError("La ville ne doit pas être vide.");
}
elseif(strlen($_POST['ville']) > 50) {
    echo formError("La ville ne doit pas faire plus de 50 caractères.");
}
else {
    $ville = $_POST['ville'];
}


// cp
if (empty($_POST['cp'])) {
    $cp = null;
}

elseif(!preg_match('#^[0-9]{5}$#', $_POST['cp'])) {
    echo formError("Le code postale doit être une suite de chiffres valide.");
}
else {
    $cp = $_POST['cp'];
}


// surface
if(empty($_POST['surface']) ) {
    $surface = null;
}
elseif( !is_numeric($_POST['surface']) ) {
    echo "La surface n'est pas valide";
}
else {
    $surface = $_POST['surface'];
}


// prix
if(empty($_POST['prix']) ) {
    $prix = null;
}
elseif( !is_numeric($_POST['prix']) ) {
    echo "Le prix n'est pas valide";
}
else {
    $prix = $_POST['prix'];
}


// photo
$extAutorisees = ['jpg', 'jpeg', 'gif', 'png'];
// je teste si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if (empty($_FILES['photo']['name'])) {
    $image = null;
}
elseif($_FILES['photo']['error'] !== 0) {
    echo "Attention, erreur lors de l'upload de l'image.";
}
// je teste si le fichier n'est pas trop gros
elseif ($_FILES['photo']['size'] >= 1000000) {
    echo "Attention, l'image est trop grosse.";
}
// je teste si l'extension est autorisée
// J'accède à l'extension grâce à : pathinfo($_FILES['imageChaussure']['name'])['extension']
elseif (!in_array( pathinfo($_FILES['photo']['name'])['extension'], $extAutorisees) ) {
    echo "Attention, le fichier n'est pas autorisé.";
}
else {
    $nomAleatoire = "pic_" . uniqid();
    $photo = $nomAleatoire . "." . pathinfo($_FILES['photo']['name'])['extension'];
    move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/' . $photo );
}


// type
if (empty($_POST['type'])) {
    echo formError("Veuillez selectionner soit une location soit une vente.");
    return;
}
elseif(!in_array($_POST['type'], ['location', 'vente'])) {
    echo formError("Le type selectionné est invalide.");
    return;
}
else {
    $type = $_POST['type'];
}


// description - pas de verif necessaire

// fin des validations - enreg. bdd


// Erreur si l'un de mes champs requried est vide
if (empty($titre) || empty($adresse) || empty($ville) || empty($cp) || empty($surface) || empty($prix) || empty($type) ) {
    echo formError('Les champs titre, adresse, ville, code postale, surface, prix et type sont obligatoires.');
}

else {
    $bdd = dbConnect();

    $query = "  INSERT INTO logement(titre, adresse, ville, cp, surface, prix, type, photo)
                VALUES (:titre, :adresse, :ville, :cp, :surface, :prix, :type, :photo)";

    $response = $bdd->prepare($query);

    $response->execute([
        'titre'     => $titre,
        'adresse'   => $adresse,
        'ville'     => $ville,
        'cp'        => $cp,
        'surface'   => $surface,
        'prix'      => $prix,
        'type'      => $type,
        'photo'     => $photo
    ]);

    echo "<h3>Le bien a bien été ajouté !</h3>";
    echo "<a href='list.php'>Retour à la liste</a>";
}





?>