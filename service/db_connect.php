<?php
// Dans le cadre du versionning, AVANT D'INDEXER les premiers fichiers,
// PENSER TOUJOURS à ajouter ce fichier (db_connect.php) dans le fichier qui doit ce trouver 
// à la racine du projet et qui se nomme ' gitignore".

try{
    // Renseignement des 3 informations nécessaires pour accéder à la BDD LEGUMES

    // chaine de caractères de connexion à la BDD LEGUMES
    $dsn = 'mysql:host=localhost;dbname=achatvehicule';
    // Identifiant pour accéder à la BDD
    $user = 'admin';
    //Le mot de passe de l'identifiant
    $password = 'Morgan2toi1*$';

    // Si besoin ajout d'options
    $options = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"];

    // création d'une instance de connexion à la BDD puis ouverture de la connexion
    $pdo = new PDO($dsn, $user, $password, $options);
    // choix de la méthode d'information en cas d'erreur
    // - Levé des exeption
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo '<p>Connexion effectuée avec le driver ' . $pdo->getAttribute(PDO::ATTR_DRIVER_NAME) . '</p>';
}
catch(PDOException $e){
    $msg = '<p>ERREUR PDO dans ' . $e->getFile() . '<br>Numéro de ligne ' . $e->getLine() . '<br>Message d\'erreur : ' . $e->getMessage() . '</p>';
    echo $msg;

    // la fonction die() supprime cette variable pour libérer de l'espace en mémoire
    die($msg);
}



