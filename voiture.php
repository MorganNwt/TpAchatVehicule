<?php
    // Ouvrir la session pour pouvoir récupérer les valeurs stockées dans $_session
    session_start();

    /*****************************************************************************************
     *                                  TRES IMPORTANT :
     *  NE PAS OUBLIER DE VERIFIER SI L'UTILISATEUR EST VRAIMENT CONNECTE !!!
     * et que son id = 17 (pour simuler un employé de la préfecture)
     * Sinon, il est redirigé vers la page de connexion
     ****************************************************************************************/
    if(!$_SESSION['id'] == 17){
        header('Location: updateProprietaire.php');
    }

    require_once 'service/db_connect.php';

    $requete = 'SELECT immatriculation, couleur, dateVoiture FROM voitures';
    $stmt = $pdo->query($requete);
    $listeVoitures = $stmt->fetchAll();
    var_dump($listeVoitures);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP les voitures</title>
</head>
<body>
    <nav>
        <a href="voitures/createVoiture.php">Enregistrer un nouveau véhicule</a>
        <br>
        <a href="">Modifier un véhicule existant</a>
    </nav>

    <h1>PHP : Accueil du CRUD pour les voitures</h1>

    <!-- Afficher toutes les voitures de la BDD -->
    <table>
        <tr>
            <th>Immatriculation</th>
            <th>Couleur</th>
            <th>Date d'achat</th>
        </tr>

        <?php
            foreach ($listeVoitures as $voiture) {
                echo '<tr>';

                foreach($voiture as $valeur){
                    echo '<td> ' . $valeur . '</td>';
                }

                echo'</tr>';
            }
        ?>
    </table>


</body>
</html>