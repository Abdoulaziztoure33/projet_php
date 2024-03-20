<?php
require_once("connexion.php");
if($_SERVER ["REQUEST_METHOD"] == "POST"){
    if(isset($_POST ['nom_etudiant'], $_POST['prenom_etudiant'],$_POST['email_etudiant'],$_POST['mot_de_passe_etudiant'])){
        $nom = $_POST['nom_etudiant'];
        $prenom = $_POST['prenom_etudiant'];
        $email = $_POST['email_etudiant'];
        $motdepasse = $_POST['mot_de_passe_etudiant'];
        $query = $connect -> prepare ("INSERT INTO etudiant(nom_etudiant,prenom_etudiant,email_etudiant,mot_de_passe_etudiant) VALUES (?,?,?,?)");
        $testquery = $query -> execute([$nom,$prenom,$motdepasse,$email]);
        if($testquery){
            echo "Données insérés avec succés";
        }
        else{
            echo"Erreur";
        }
    } else{
        echo"Erreur dihjzdhkjzd";
    }

}

$query = $connect -> query ("SELECT * FROM etudiant ");
$list = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="head">
        
        <h1>Inscription etudiant</h1>
        <div>
            <article>Bienvenue sur la page d'inscription joueur de memoire IAM.</article>
        </div>
    </div>
    <div class="center">
        <div class="boite">
            <form method="post" class="formAJ">  
            <div>
                <label for="nom_etudiant">Nom : </label>
                <input type="text" id="nom_etudiant" name="nom_etudiant" required>
            </div>
            <div>
                <label for="Prenom_etudiant"> Prenom : </label>
                <input type="text" id="prenom_etudiant" name="prenom_etudiant" required>
            </div>
            <div>
                <label for="email_etudiant">Email : </label>
                <input type="text" id="email_etudiant" name="email_etudiant" placeholder="exemple0@email.com" required>
            </div>
            <div>
                <label for="mot_de_passe_etudiant">Mot de passe : </label>
                <input type="password" id="mot_de_passe_etudiant" name="mot_de_passe_etudiant" required>
            </div>
            <div>
                <button type="submit" class="boutton_soumission">S'inscrire</button>
            </div>
            </form>

        </div>
    </div>
    <footer class="footer">
        <article>Lorem ipsum dolor sit amet consectetur adipisicing elit.
             Quod qui at velit repudiandae quas ullam praesentium dolorem earum 
             voluptatum hic veniam debitis, natus illo deserunt distinctio. 
             Consectetur cumque odit eius?
        </article>
    </footer>
    
</body>
</html>