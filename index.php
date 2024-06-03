<?php
    require_once 'service/db_connect.php';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP BDD : cartesgrises</title>
</head>
<body>
    <h1>TP BDD : cartesgrises</h1>
    <h2>Prmières insertions de données</h2>

    <?php
        // Valeurs d'un article à insérer en BDD ( attention si actualisation changer l'id erreur ligne 70 "intégrité" id ligne 59)
        $id = 1;
        $immatriculation = 'FQ288KE';
        $dateCartes = '1999/10/12';

        // La requête
        $query = 'INSERT INTO cartesgrises 
            VALUES (
                \'' . $id . '\',
                 \''. $immatriculation . '\' ,
                  \'' . $dateCartes  .'\' )';

     $rowCount = $pdo->exec($query);
     echo '<p>Nombre de lignes insérées = ' . $rowCount . '</p>';
    ?>

    <br><hr><br>



</body>
</html>