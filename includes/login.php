<?php
if(isset($_POST['lformsend'])){
    extract($_POST);

     if(!empty($lemail)  && !empty($lpassword)){
        $emailConnexion=$db->prepare("SELECT * from users WHERE email=:email");
        $emailConnexion->execute(['email'=>$lemail]);
        $infosUser=$emailConnexion->fetch(PDO::FETCH_ASSOC); //récupète un tab composé de toutes les infos de l'user qui essaye de se co, si on rappelle fetch une 2eme fois ca appelleras le prochain user
        // var_dump($infosUser);
        

        if($infosUser){
            
            $hashpassword=$infosUser['password'];

            if (password_verify($lpassword,$hashpassword)) {
                echo "<p>Connexion en cours ...</p>";

                $_SESSION['id']=$infosUser['id'];
                $_SESSION['pseudo']=$infosUser['pseudo'];
                $_SESSION['date']=$infosUser['date'];
                header("Location: index.php?id=".$_SESSION['id']);
            }else{
                echo "<p>Mot de passe incorrecte</p>";
            }
        }else{
            echo '<p>Impossible de se connecter l\'email '. $lemail. ' n\'existe pas </p>';
        }
     }else{
         echo "<p>Veuillez compléter tous les champs</p>";
     }
}



?>