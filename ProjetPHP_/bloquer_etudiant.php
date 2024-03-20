<?php
// Récupérer l'ID du joueur à bloquer depuis la requête Ajax
if(isset($_POST['id_etudiant'])) {
    $id_etudiant = $_POST['id_etudiant'];

    // Database connection settings
    $dbhost = 'localhost';
    $dbname = 'memoireiam';
    $dbuser = 'root';
    $dbpswd = '';

    // Establish database connection
    try {
        $connect = new PDO('mysql:host='.$dbhost.';dbname='.$dbname, $dbuser, $dbpswd, array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
        ));
    } catch (PDOException $e) {
        die("Une erreur est survenue lors de la connexion à la Base de données !");
    }

    // Requête pour mettre à jour le statut du joueur en 'blocked'
    $stmt = $connect->prepare("UPDATE etudiant SET status = 'blocked' WHERE id_etudiant = ?");
    $stmt->execute([$id_etudiant]);

    // Répondre à la requête Ajax
    echo "Le joueur a été bloqué avec succès.";
} else {
    // Répondre à la requête Ajax en cas de problème
    echo "Une erreur est survenue lors du blocage du joueur.";
}
?>