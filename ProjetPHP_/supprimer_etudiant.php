<?php
// Récupérer l'ID du joueur à supprimer depuis la requête Ajax
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

    // Requête pour supprimer le joueur de la base de données
    $stmt = $connect->prepare("DELETE FROM etudiant WHERE id_etudiant = ?");
    $stmt->execute([$id_etudiant]);

    // Répondre à la requête Ajax
    echo "Le joueur a été supprimé avec succès.";
} else {
    // Répondre à la requête Ajax en cas de problème
    echo "Une erreur est survenue lors de la suppression du joueur.";
}
?>
