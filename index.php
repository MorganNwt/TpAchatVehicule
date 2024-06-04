<?php
    require_once 'service/db_connect.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/main.css">

    <title>TP BDD : cartesgrises</title>
</head>
<body>
    <h1>TP BDD : cartesgrises</h1>
    <h2>Prmières insertions de données</h2>

    <?php
        // Valeurs d'un article à insérer en BDD ( attention si actualisation changer l'id erreur ligne 70 "intégrité" id ligne 59)
    //     $id = 1;
    //     $immatriculation = 'FQ288KE';
    //     $dateCartes = '1999/10/12';

    //     // La requête
    //     $query = 'INSERT INTO cartesgrises 
    //         VALUES (
    //             \'' . $id . '\',
    //              \''. $immatriculation . '\' ,
    //               \'' . $dateCartes  .'\' )';

    //  $rowCount = $pdo->exec($query);
    //  echo '<p>Nombre de lignes insérées = ' . $rowCount . '</p>';
    ?>

    <br><hr><br>

    <h2>Exercice 2</h2>
    <p> Créer un script permettant d’afficher le contenu de la table « modeles » dans un tableau
        HTML. Les résultats doivent être triés par marque
    </p>

    <?php
        // la requête SELECT
        $requete = ' SELECT * FROM MODELES ORDER BY marque ASC';
       
        // Préparation de la requête
        $stmt = $pdo->query($requete);

        // Réupération des résultats
        $listeModeles = $stmt->fetchAll();

      // var_dump($listeModeles);
    ?>

    <br><hr><br>

    <h2>Exercice 3</h2>
    <p>Créer un formulaire qui permet l’insertion de nouvelles données dans la table 
        « modeles ».
    </p>

    <table>
        <tr>
            <th>id_modele</th>
            <th>Modèle</th>
            <th>Marque</th>
            <th>Carburant</th>
        </tr>

        <?php
            // Affichage des données
            foreach($listeModeles as $modele){
                 echo '<tr class="border">';
                
                foreach($modele as $valeur){
                    echo '<td class="border">' . $valeur . '</td>';
                }
                echo '</tr>';
            }
        ?>  
    </table>

    <br><hr><br>

    <h2>Exercice 4</h2>

    <a href="view/ajoutModele.php">Ajout Modèle PHP</a>
    <br>
    <a href="view/connect.php">Ce connecter</a>

    <br><hr><br>

    <h2>Exercice 5</h2>

    <a href="view/voiture.php">Voitures</a>
    
    



</body>
</html>