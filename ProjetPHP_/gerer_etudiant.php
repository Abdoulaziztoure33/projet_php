<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Joueurs</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="Style2.css">
</head>
<body>
    <div class="center">
        <div class="box">
        <h1>Liste des etudiant</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
        </tr>
        <?php 
        $dbhost = 'localhost';
        $dbname = 'mémoireiam';
        $dbuser = 'root';
        $dbpswd = '';
        try{
            $connect = new PDO('mysql:host='.$dbhost.';dbname='.$dbname,$dbuser,$dbpswd,
            array(
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
                )
            );
        }catch (PDOException $e){
            die("Une erreur est survenue lors de la connexion à la Base de données !");
        }

        // Fetch players from database
        $stmt = $connect->query("SELECT * FROM etudiant");
        $etudiants = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Check if $players is not empty
        if (!empty($etudiants)) {
            foreach ($etudiants as $etudiant): ?>
            <tr>
                <td><?php echo $etudiant['id_etudiant']; ?></td>
                <td><?php echo $etudiant['nom_etudiant']; ?></td>
                <td><?php echo $etudiant['prenom_etudiant']; ?></td>
                <td>
                    <!-- Block button -->
                    <?php if ($etudiant['status'] != 'blocked'): ?>
                        <button onclick="blockstudent(<?php echo $etudiant['id_etudiant'] ; ?>)">Bloquer</button>
                    <?php endif; ?>
                    <!-- Unblock button -->
                    <?php if ($etudiant['status'] == 'blocked'): ?>
                        <button onclick="unblockstudent(<?php echo $etudiant['id_etudiant']; ?>)">Débloquer</button>
                    <?php endif; ?>
                    <!-- Delete button -->
                    <button onclick="deletestudent(<?php echo $etudiant['id_etudiant']; ?>)">Supprimer</button>
                </td>
            </tr>
            <?php endforeach;
        } else {
            echo "<tr><td colspan='5'>Aucun joueur trouvé.</td></tr>";
        }
        ?>
    </table>
        </div>
    </div>
    

    <script>
        function blockstudent(studentId) {
            // Implement Ajax request to block the player
            $.post("bloquer_etudiant.php", { student_id: studentId }, function(data) {
                console.log(data); // You can handle the response here
            });
        }

        function unblockstudent(studentId) {
            // Implement Ajax request to unblock the player
            $.post("debloquer_etudiant.php", { student_id: studentId }, function(data) {
                console.log(data); // You can handle the response here
            });
        }

        function deletePlayer(playerId) {
            // Implement Ajax request to delete the player
            $.post("supprimer_etudiant.php", { student_id: studentId }, function(data) {
                console.log(data); // You can handle the response here
            });
        }
    </script>
</body>
</html>