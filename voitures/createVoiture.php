<?php
    session_start();

    /*****************************************************************************************
     *                                  TRES IMPORTANT :
     *  NE PAS OUBLIER DE VERIFIER SI L'UTILISATEUR EST VRAIMENT CONNECTE !!!
     * et que son id = 1 (pour simuler un employé de la préfecture)
     * Sinon, i lest redirigé vers la page de connexion
     ****************************************************************************************/
    if(!$_SESSION['id'] == 17){
        header('Location: ../view/updateProprietaire.php');
    }

    require_once '../service/db_connect.php';

    $requete = 'SELECT * FROM modeles';
    $stmt = $pdo->query($requete);
    $listeModeles = $stmt->fetchAll();
    var_dump($listeModeles);

    // Récupération de la date du jour pour préremplir le formulaire
    $today = date('Y-m-d');
/**********************************************************
 * Traitement pour éxecuter une requête update
 *********************************************************/


    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $_POST = filter_input_array( INPUT_POST, [
            'immatriculation'=>FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'id_modele'=>FILTER_SANITIZE_NUMBER_INT,
            'couleur'=>FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'dateVoiture'=>FILTER_SANITIZE_FULL_SPECIAL_CHARS
        ]);

        // 2 - j'hydrate les variables à utiliser pour remplacer les paramètres de la requête
        $immatriculation = $_POST['immatriculation'];
        $id_modele = $_POST['id_modele'];
        $couleur = $_POST['couleur'];
        $dateVoiture = $_POST['dateVoiture'];

        // 3- J'écris ma requête paramétré
        $requete = 'INSERT INTO voitures VALUE (:immatriculation, :id_modele, :couleur, :dateVoiture)';

        // 4- Je prépare ma requête
        $stmt = $pdo->prepare($requete);     

         // 5 - Je remplace les paramètres par des variables qui possèdent les valeurs à persister
         $stmt->bindParam(':immatriculation', $immatriculation);
         $stmt->bindParam(':id_modele', $id_modele);
         $stmt->bindParam(':couleur', $couleur);
         $stmt->bindParam(':dateVoiture', $dateVoiture);
        
         // 6 - Execution de la requête
         $stmt->execute();
         $nb = $stmt->rowCount();

         if($nb > 0){
            session_unset();
            header('Location: ../view/voiture.php');
        }
     }
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

            <label for="id_modele"></label>
            <select name="id_modele" id="id_modele">
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

                <input type="radio" name="couleur" id="couleur_FO" value="FO">
                <label for="couleur">Foncé</label>
                <br>
            </fieldset>     

            <label for="dateVoiture">Date d'achat</label>
            <input type="date" name="dateVoiture" id="dateVoiture" value="<?= $today ?>">
            <br>

            <input type="submit" value="Enregistrer le nouveau véhicule">
        </fieldset>
    </form>

</body>
</html>