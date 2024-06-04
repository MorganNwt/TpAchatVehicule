<?php
    session_start();
    // var_dump($_SESSION['id']);

     /*****************************************************************************************
     * TRES IMPORTANT : NE PAS OUBLIER DE VERIFIER SI L'UTILISATEUR EST VRAIMENT CONNECTE !!!
     * Sinon, i lest redirigé vers la page de connexion
     ****************************************************************************************/
    if(!isset($_SESSION['id'])){
        header('Location: connect.php');
    }

    require_once '../service/db_connect.php';

    /********************************************************************************
     * ICI, TOUT LE TRAITEMENT PHP QUI RECUPERE LES DONNEES DE L'UTILISATEUR POUR
     * PREREMPLIR LE FORMULAIRE
     ********************************************************************************/

    // 1 -Récupérer les informations de l'utilisateur en session
    $id = $_SESSION['id'];

    // 2- La requête 
    $requete = 'SELECT nom, prenom, adresse, ville, codePostal FROM proprietaires WHERE id_personne = :id';

    // 3 Je prépare ma requête
    $stmt = $pdo->prepare($requete);

    // 4 - Je remplace les paramètres par des variables qui possèdent les valeurs à persister
    $stmt->bindParam(':id', $id);

    // 5 - Execution de la requête
    $stmt->execute();

    // 6 - Je stock l'utilisateur dans une variable
    $user = $stmt->fetch();
    var_dump($user);

     /********************************************************************************
     * ICI, LA PARTIE PHP QUI VALIDE ET NETTOIE LES DONNEES QUI ONT ETE SAISIE
     * DANS LE FORMULAIRE PUIS ENVOIE UNE REQUETE UPDATE
     ********************************************************************************/

     // 1 - Je nettoie les données du formulaire
     if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $_POST = filter_input_array( INPUT_POST, [
            'nom'=>FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'prenom'=>FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'adresse'=>FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'ville'=>FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'codePostal'=>FILTER_SANITIZE_FULL_SPECIAL_CHARS
        ]);

        // 2 - j'hydrate les variables à utiliser pour remplacer les paramètres de la requête
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $adresse = $_POST['adresse'];
        $ville = $_POST['ville'];
        $codePostal = $_POST['codePostal'];

        // 3- J'écris ma requête paramétré
        $requete = 'UPDATE proprietaires 
            SET nom = :nom,
                prenom = :prenom,
                adresse = :adresse,
                ville = :ville,
                codePostal = :codePostal

        WHERE id_personne = :id';

        // 4- Je prépare ma requête
        $stmt = $pdo->prepare($requete);

        // 5 - Je remplace les paramètres par des variables qui possèdent les valeurs à persister
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':adresse', $adresse);
        $stmt->bindParam(':ville', $ville);
        $stmt->bindParam(':codePostal', $codePostal);
        $stmt->bindParam(':id', $id);

        // 6 - Execution de la requête
        $stmt->execute();
        $nb = $stmt->rowCount();

        if($nb > 0){
            session_unset();
            header('Location: ../index.php');
        }
     }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP : UPDATE</title>
</head>
<body> 
    <?php
        if($id == 17){
            echo '<nav><a href="voiture.php">Page</a></nav>';
        }
    ?>
   
    <h1>PHP : Page de modification de profil</h1>
    
   
    <form action="#" method="post">
        <fieLdset>
            <legend>Modifier votre profil</legend>

            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" value="<?= $user['nom'] ?>">
            <br>

            <label for="prenom">Prenom :</label>
            <input type="text" id="prenom" name="prenom" value="<?= $user['prenom'] ?>">
            <br>

            <label for="adresse">Adresse :</label>
            <input type="text" id="adresse" name="adresse" value="<?= $user['adresse'] ?>">
            <br>

            <label for="ville">Ville :</label>
            <input type="text" id="ville" name="ville" value="<?= $user['ville'] ?>">
            <br>

            <label for="codePostal">Code Postal :</label>
            <input type="text" id="codePostal" name="codePostal" value="<?= $user['codePostal'] ?>">
            <br>

            <input type="submit" value="MODIFIER">

        </fieLdset>
    </form>
</body>
</html>