<?php 

        if (isset($_POST["formsend"])) {
            
            extract($_POST); //On va pouvoir récuperer les valeurs du tab POST sans faire $_POST['...']
                             //$_POST['email'] sera = à $email

            if(!empty($pseudo) && !empty($password1) && !empty($password2) && !empty($email)){
                if($password1 == $password2){
                    $options=[
                        'cost'=>12,
                    ];

                    $hashpass=password_hash($password1,PASSWORD_BCRYPT,$options);

                    $c=$db->prepare("SELECT email from users WHERE email= :email");
                    $c->execute(["email"=>$email]);

                    $result=$c->rowCount();

                    if($result == 0){ //Si $result ==0 cela veut dire que l'email n'existe pas dans la bdd donc qu'on peut créer le compte
                        $q=$db->prepare("INSERT INTO users(pseudo,email,password) VALUES (:pseudo,:email,:password)");
                    //Le execute ici fait la meme chose que 3 bindValue avec un execute qui les suit
                    $q->execute([
                        'pseudo'=>$pseudo,
                        'email'=>$email,
                        'password'=>$hashpass
                    ]);
                    echo "<p> Le compte a bien été crée </p>";
                    }else{
                        echo "<p>Cette email existe déjà</p>";
                    }          
                }else{
                    echo "<p>Les mots de passe ne sont pas les mêmes</p>"; 
                }
            }else{
                echo "<p>Les champs ne sont pas tous remplies</p>";
            }
        }
    ?>