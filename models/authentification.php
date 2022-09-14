<?php
// Ouvrrir une nouvelle session
    function authentification_model_login($request){
        // initier le message d'erreur à afficher
        $msg = "";
        // Demmare la session
        session_start();
        require(CONNEX_DIR);
        // Récupére et netoie chaque variable envoyé dans $request arrivé du formulaire
        foreach($request as $key=>$value){
            $$key=mysqli_real_escape_string($con,$value);
        }
        //1 verifier le username
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($con, $sql);
        // Verrifier le nombre de lignes récupérés dans la base de donnée
        // Si plus d'une ligne est presente, 
        // un message d'erreur est crée dans le bloc else
        $count = mysqli_num_rows($result);
        // Si un seul utilisateur est renvoyé dans la requête 
        // On procéde à la vérrification du mot de passe
        if($count==1){
            // Convértir le résultat en un tableau associative 
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            // récupérer le mot de passe enregestré dans la base de donnée 
            $dbpassword = $user['password'];
            // Verrifier si le mot de passe envoyé dans la requête 
            // correspond bien au hash dans la base de donnée 
            if(password_verify($password, $dbpassword)){
                // Si le mot de passe est correcte, une session est créee
                // Si non un message d'érreur est crée dans le bloc else
                $_SESSION['name'] = $user['name']; // Nommer la session
                $_SESSION['userId'] = $user['userId']; // Sauvegarder l'id de l'utilisateur
                $_SESSION['fingerPrint'] =md5($_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR']); // Donner une emprente unique à la session
                // retourner le tableau associative $user avec les information sur l'utilisateur
                return $user;
            }else{
                // renvoyer l'erreur 1 : password incorrecte 
                $msg = "1";
            }
        }else{
              //  renvoyer l'erreur 2 : Username incorrecte
            $msg = "2";
        }
        // 
        // Si une erreur est renvoyée, le code de 'erreur est retourné 
        return $msg;
    }
?>