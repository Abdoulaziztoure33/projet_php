<?php
require_once("connexion.php"); // Assuming "connexion.php" contains your database connection code

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['titre'], $_POST['fichier'], $_POST['date_de_publication'])) {
        $titre = $_POST['titre'];
        $fichier = $_POST['fichier'];
        $date_de_publication = $_POST['date_de_publication'];
        $query = $connect->prepare("INSERT INTO memoires(titre,fichier,date_de_publication) VALUES (?,?,?)");
        $testquery = $query->execute([$titre , $fichier, $date_de_publication]);
        if ($testquery) {
            echo "Données insérées avec succès";
        } else {
            echo "Erreur";
        }
    } else {
        echo "Erreur";
    }
    $query = $connect->query("SELECT * FROM memoires ");
    $list = $query->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Style2.css">
</head>
<body>
    <div class="center">
        <div class="box">
            <h2>Ajoutez un memoire</h2>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div>
                    <label for="titre">titre:</label>
                    <input type="text" id="titre" name="titre" required>
                </div>
                <div>
                    <label for="fichier">fichier</label>
                    <input type="text" id="fichier" name="fichier" required>
                </div>
                <div>
                    <label for="date_de_publication">Libellés</label>
                    <input type="text" id="date_de_publication" name="date_de_publication" required>
                </div>
                <div>
                    <label for="domaine">domaines</label>
                    <input type="number" id="domaine" name="damine" placeholder="Entrez l'identifant du domaine" required>
                </div>
                <input type="submit" value="ajouter" class="boutton">
            </form>
        </div>
    </div>
</body>
</html>