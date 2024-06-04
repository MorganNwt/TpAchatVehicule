<?php
    session_start();

    /*****************************************************************************************
     *                                  TRES IMPORTANT :
     *  NE PAS OUBLIER DE VERIFIER SI L'UTILISATEUR EST VRAIMENT CONNECTE !!!
     * et que son id = 1 (pour simuler un employé de la préfecture)
     * Sinon, i lest redirigé vers la page de connexion
     ****************************************************************************************/
    if($_SESSION['id'] == 1){
        header('Location: updateProprietaire.php');
    }

    require_once '../service/db_connect.php';

    $requete = 'SELECT * FROM modeles';
    $stmt = $pdo->query($requete);
    $listeModeles = $stmt->fetchAll();
    var_dump($listeModeles);

    // Récupération de la date du jour pour préremplir le formulaire
    $today = date('Y-m-d');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
</head>
<body>
    <h1>Table VOITURES -> CREATE</h1>

    <form action="" method="POST">
        <fieldset>
            <legend>Enregistrer un nouveau véhicule</legend>

            <label for="immatriculation">Immatriculation</label>
            <input type="text" name="immatriculation" id="immatriculation">
            <br>

            <label for="modeles"></label>
            <select name="modeles" id="modeles">
                <option value="">Coisissez le modèle du véhicule :</option>

                <?php 
                    foreach($listeModeles as $valeurs) {
                        echo ' <option value=" ' . $valeurs['id_modele'] .' ">'. $valeurs['modele'] . ' - '  . $valeurs['marque'] . ' - ' . $valeurs['carburant']  . '</option>';
                    }
                ?>
            </select>
           
            <br>
            <fieldset>      
                <legend>Choisissez la couleur du véhicule</legend>
                <input type="radio" name="couleur" id="couleur_CL" value="CL">
                <label for="couleur">Clair</label>
                <br>

                <input type="radio" name="couleur" id="couleur_MO" value="MO">
                <label for="couleur">Moyen</label>
                <br>

                <input type="radio" name="couleur" id="couleur_FC" value="FC">
                <label for="couleur">Foncé</label>
                <br>
            </fieldset>     

            <label for="dateAchat">Date d'achat</label>
            <input type="date" name="dateAchat" id="dateAchat" value="<?= $today ?>">
            <br>

            <input type="submit" value="Enregistrer le nouvau véhicule">
        </fieldset>
    </form>

</body>
</html>