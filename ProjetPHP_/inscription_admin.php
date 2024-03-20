<?php
require_once("connexion.php");
if($_SERVER ["REQUEST_METHOD"] == "POST"){
    if(isset($_POST ['nom_admin'], $_POST['prenom_admin'],$_POST['email_admin'],$_POST['mot_de_passe_admin'])){
        $nom = $_POST['nom_admin'];
        $prenom = $_POST['prenom_admin'];
        $email = $_POST['email_admin'];
        $motdepasse = $_POST['mot_de_passe_admin'];
        $query = $connect -> prepare ("INSERT INTO administrateur(nom_admin,prenom_admin,email_admin,mot_de_passe_admin) VALUES (?,?,?,?)");
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


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="head">
        
        <h1>Inscription administrateur</h1>
        <div>
            <article>Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                Beatae est laboriosam vel, quo esse nulla aliquam architecto 
                rerum provident magnam delectus sit enim reiciendis in blanditiis
                exercitationem itaque quos officia.
            </article>
        </div>
    </div>
    <div class="center">
       <div class="boite">
       <form method="post" class="formAJ">
    <div>
        <label for="nom_admin">Nom : </label>
        <input type="text" id="nom_admin" name="nom_admin" required>
    </div>
    <div>
        <label for="prenom_admin"> Prenom : </label>
        <input type="text" id="prenom_admin" name="prenom_admin" required>
    </div>
    <div>
        <label for="email_admin">Email : </label>
        <input type="text" id="email_admin" name="email_admin" placeholder="exemple0@email.com" required>
    </div>
    <div>
        <label for="mot_de_passe_admin">Mot de passe : </label>
        <input type="password" id="mot_de_passe_admin" name="mot_de_passe_admin" required>
    </div>
    <div>
        <label><input type="checkbox" required>J'accepte les conditions d'utilisation.</label>
    </div>
    <div>
        <a href="https://youtu.be/LvvD9RSp6c8?si=0i4NcOQr0pPoRLDP">Conditions d'utilisation.</a>
        <input type="submit" value="Soumettre" class="boutton_soumission">
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