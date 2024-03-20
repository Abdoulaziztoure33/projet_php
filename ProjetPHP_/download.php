<?php
// Connexion à la base de données
$dbhost = 'localhost';
$dbname = 'mémoireiam';
$dbuser = 'root';
$dbpswd = '';

try {
    $connect = new PDO('mysql:host='.$dbhost.';dbname='.$dbname, $dbuser, $dbpswd, array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ));
} catch (PDOException $e) {
    die("Une erreur est survenue lors de la connexion à la Base de données !");
}

// Vérification de l'existence de l'identifiant de mémoire dans l'URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id_memoire = $_GET['id'];

    // Récupération des informations de la mémoire depuis la base de données
    $stmt = $connect->prepare("SELECT * FROM memoires WHERE id_memoire = ?");
    $stmt->execute([$id_memoire]);
    $memory = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérification de l'existence de la mémoire
    if ($memory) {
        // Définition des entêtes pour forcer le téléchargement
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $memory['nom_fichier'] . '"');

        // Lecture et sortie du contenu du fichier
        readfile($memory['memoirespdf']);
        exit;
    } else {
        die("La mémoire spécifiée n'existe pas !");
    }
} else {
    die("L'identifiant de la mémoire est manquant !");
}
?>
