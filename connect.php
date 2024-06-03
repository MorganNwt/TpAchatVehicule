<?php
    session_start();

    require_once 'service/db_connect.php';
   

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $_POST = filter_input_array( INPUT_POST, [
            'id'=>FILTER_SANITIZE_NUMBER_INT,
            'nom'=>FILTER_SANITIZE_FULL_SPECIAL_CHARS
        ]);

        $id = $_POST['id'];
        $nom = $_POST['nom'];

        $requete = 'SELECT id_personne, nom FROM PROPRIETAIRES WHERE id_personne = :id AND nom = :nom';
        $stmt = $pdo->prepare($requete);

        // 5 - Je remplace les paramètres par des variables qui possèdent les valeurs à persister
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nom', $nom);
       

        // 6 - Execution de la requête
        $stmt->execute();

        $nb = $stmt->rowCount();

        if ($nb > 0) {
            $_SESSION['id'] = $id;
            header('Location: updateProprietaire.php');
        }
    }
   
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP login</title>
</head>
<body>
    <h1>PHP le login + update sur la table propriétaires</h1>
    <h2>Ici, le login</h2>

    <form action="#" method="POST">
        <label for="id">Identifiant</label>
        <input type="text" name="id" id="id">

        <label for="nom">Nom</label>
        <input type="text" name="nom" id="idNom">

        <input type="submit" value="Se connecter">
    </form>
    
</body>
</html>