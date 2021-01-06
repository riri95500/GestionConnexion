<?php 
session_start();
include "includes/database.php";

if($_GET['id'] and $_GET['id'] > 0){
    $getid=intval($_GET['id']);
    $res=$db->prepare("SELECT * FROM users where id=:id");
    $res->execute(['id'=>$getid]);
    $tabinfo=$res->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
</head>
<body>
    <h1>Te voici sur ton site</h1>
    <?='<p>Bonjour '. $tabinfo['pseudo'] .'</p>';?>
    
    <?php if(isset($_SESSION['id']) and $tabinfo['id'] == $_SESSION['id'])
    {?>
    <a href="#">Editer mon profil</a>
    <a href="deconnexion.php">Se déconnecter</a>
    <?php
    }
    ?>
</body>
</html>
<?php
}else{
    header('Location: formulaire.php');
}
?>
