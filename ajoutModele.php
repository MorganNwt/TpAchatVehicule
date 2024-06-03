<?php
    // Import des ressources
    require_once 'service/db_connect.php';

    // Récupérer les données issus du formulaire APRES validation
    // 1 - Le code doit être execute que si $_POST est définie
    if ($_SERVER['REQUEST_METHOD'] === '$_POST'){
        $_POST = filter_input_array( INPUT_POST, [
            'modele'=>FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'marque'=>FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'carburant'=>FILTER_SANITIZE_FULL_SPECIAL_CHARS
        ]);
        // 2- J'hydrate les variables à utiliser pour remplacer les paramètres de la requête
        $modele = $_POST['modele'];
        $marque = $_POST['marque'];
        $carburant = $_POST['carburant'];

        // 3-j'écris ma requête paramétrées nommées
        $requete = 'INSERT INTO MODELES VALUES (DEFAULT, :modele, :marque, :carburant)';

        // 4- Je prpare la requête
        $stmt = $pdo->prepare($requete);

        // 5 - Je remplace les paramètres par des variables qui possèdent les valeurs à persister
        $stmt->bindParam(':modele', $modele);
        $stmt->bindParam(':marque', $marque);
        $stmt->bindParam(':carburant',$carburant);

        // 6 - Execution de la requête
        $stmt->execute();

        $nb = $stmt->rowCount();
    }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP : CREATE sur une BDD </title>
</head>
<body>
    <h1>PHP : Requêter ( INSERT INTO ) sur une BDD </h1>
    <p>Créer un formulaire  PHP qui permet l'ajout de nouveaux modèles.
    </p>

    <?php
        if(isset($nb) && $nb > 0) {
            echo '<p>Le modèle à bien été crée</p>';
        }
    ?>

    <form action="#" method="POST">
        <fieldset>
            <legend>Ajouter un nouveau modèle</legend>

            <label for="modele">Modèle :</label>
            <input type="text" name="modele" id="idModele">

            <label for="marque">Marque :</label>
            <input type="text" name="marque" id="idMarque">

            <label for="carburant">Carburant :</label>
            <select name="Carburant" id="idCarburant">
                <option value="">Sélectionner un carburant</option>
                <option value="essence">essence</option>
                <option value="dissel">Dissel</option>
                <option value="gpl">GPL</option>
                <option value="electrique">Electrique</option>
            </select>
                <br>
            <input type="submit" value="Ajouter">
        </fieldset>
    </form>


</body>
</html>