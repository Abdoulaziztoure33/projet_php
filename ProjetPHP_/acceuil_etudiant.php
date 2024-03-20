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

// a. Afficher les mémoires disponibles
$stmt = $connect->query("SELECT * FROM memoires"); // Correction: 'memoires' au lieu de 'memoire'
$memories = $stmt->fetchAll(PDO::FETCH_ASSOC);

// b. Afficher les domaines disponibles
$stmt = $connect->query("SELECT * FROM domaine");
$domains = $stmt->fetchAll(PDO::FETCH_ASSOC);

// HTML pour l'interface utilisateur
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultation des mémoires</title>
    <link rel="stylesheet" href="Style2.css">
</head>
<body>
<div class="head">
            <img src="images/IAM-1568x1109.png" alt=""  class="logo">
            <div class="recherche">
                <input type="text" name="recherche" placeholder="rechercher..." required>
                <input type="submit" value=">" class="boutton">
            </div>
        <div class="Theader">
            <h1>Acceuil</h1>
        </div>
        <div class="nav">
                <a href="connexion2.php">connexion</a>
                <a href="contact.html">Nous contacter</a>
                <a href="info.html">A propos</a>
                <a href="inscription.php">inscription</a>
        </div>
    </div>
    <div class="center">
        <div class="box">
        <h1>Liste des mémoires disponibles</h1>
            <ul>
                <?php foreach ($memories as $memory): ?>
                    <li>
                        <a href="download.php?id=<?php echo $memory['fichier']; ?>">
                            <?php echo $memory['titre']; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="box">
        <h2>Rechercher par domaine</h2>
            <form action="search.php" method="GET" class="recherche">
                <select name="domain">
                    <option value="">Sélectionnez un domaine</option>
                    <?php foreach ($domains as $domain): ?>
                        <option value="<?php echo $domain['id_domaine']; ?>">
                            <?php echo $domain['nom_domaine']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <button type="submit" class="boutton">Rechercher</button>
            </form>
        </div>
    </div>
    <footer class="footer">
    <a href="connexion2.php">connexion</a>
    <a href="inscription.php">inscription_joeur</a>
    <a href="inscription_admin.php">inscription_admin</a>
    <a href="Ajoutmemoire.php">Ajouter_memoire</a>
    <a href="gerer_memoires.php">Gerer_memoire</a>
    <a href="gerer_etudiant.php">Gerer_etudiant</a>
    <a href="acceuil_joueur.php">acceuil_joueur</a>
   
        <article>
            Explorez une vaste gamme de memoires, soigneusement élaborés pour satisfaire tous les intérêts et niveaux de compétence. <br>
            Que vous soyez passionné par la science, la culture générale, la technologie, l'histoire, les langues, ou d'autres domaines encore, notre collection diversifiée de memoires vous offre une opportunité sans fin de découvrir de nouveaux sujets et de défier votre esprit.
        </article>
        
    </footer>
</body>
</html>
