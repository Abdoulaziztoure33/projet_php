<?php
$dbhost = 'localhost';
$dbname = 'mémoireiam';
$dbuser = 'root';
$dbpswd = '';

try {
    $connect = new PDO('mysql:host='.$dbhost.';dbname='.$dbname, $dbuser, $dbpswd, array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
    ));
} catch (PDOException $e) {
    die("Une erreur est survenue lors de la connexion à la Base de données !");
}

// Requête SQL pour sélectionner toutes les questions
$sql = "SELECT * FROM memoires";

// Exécution de la requête
$result = $connect->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Questions</title>
    <link rel="stylesheet" href="Style2.css">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
        <div class="center">
            <div class="box">
            <h2>Liste des Questions</h2>

<table>
    <tr>
        <th>ID</th>
        <th>memoires</th>
        <th>Action</th>
    </tr>
    <?php
    if ($result && $result->rowCount() > 0) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['id_memoires'] . "</td>";
            echo "<td>" . $row['fichier'] . "</td>";
            echo "<td>";
            echo "<button onclick='deletememoires(" . $row['id_memoires'] . ")'>Supprimer</button>";
            echo "<button onclick='editmemoires(" . $row['id_memoires'] . ")'>Modifier</button>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>Aucun memoires trouvée dans la base de données.</td></tr>";
    }
    ?>
</table>
            </div>

        </div>


<script>
    function deleteQuestion(id) {
        if (confirm("Êtes-vous sûr de vouloir supprimer cette question?")) {
            // Utiliser AJAX pour envoyer une requête de suppression
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Actualiser la liste des questions après suppression
                    window.location.reload();
                }
             
            };
            xhr.open("POST", "delete_question.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("id=" + id);
        }
    

    function editQuestion(id) {
        // Rediriger vers la page de modification avec l'ID de la question
        window.location.href = "edit_question.php?id=" + id;
    }
</script>

</body>
</html>

<?php
// Fermeture de la connexion à la base de données
$connect = null;
?>

