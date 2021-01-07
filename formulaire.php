<?php 
session_start(); 

// unset($_SESSION['pseudo']); //1-On vide la session
// unset($_SESSION['age']); //2-Pareil que 1- 
// session_destroy(); //3-Puis on l'a détruit

//Ajout de cookie d'une durée de 1 mois
// setcookie('pseudo',"Dair95",time()+(30*24*3600));
// setcookie('id',18,time()+60);

// if(isset($_COOKIE['pseudo'])){
//     echo 'id : '.$_COOKIE['id'];
// }else{
//     echo "l'élement n'existe pas";
// }

// var_dump($_COOKIE);

// //Suppression du cookie pseudo
// setcookie('pseudo','',time());

// var_dump($_COOKIE);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="content/css/style.css">

    <title>Rejoins Nous</title>
</head>
<body>

    <div class="contenu">
    <h1>Bienvenue sur votre profil</h1>

    <?php
    include "includes/database.php";
    ?>
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">

    <fieldset>
        <div class="legend">Login</div>

        <input type="email" name="lemail" id="lemail" placeholder="email" required><br/>
        <input type="password" name="lpassword" id="lpassword" placeholder="password" required><br/>
        <input class="button" type="submit" name="lformsend" id="lformsend" value="Login"></p>
    </fieldset>
    </form>

    <?php
        include 'includes/login.php';
    ?>


    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
        
    <fieldset>
        <div class="legend">Sign in</div>

        <input type="text" name="pseudo" id="pseudo" placeholder="pseudo" required><br/>
        <input type="email" name="email" id="email" placeholder="email" required><br/>
        <input type="password" name="password1" id="password1" placeholder="password" required><br/>
        <input type="password" name="password2" id="password2" placeholder="confirm password" required><br/>
        <input class="button" type="submit" name="formsend" id="formsend" value="Signin"></p>
        </fieldset>
    </form>

    <?php 
        include 'includes/signin.php';
    ?>
    </div>

</body>
</html>