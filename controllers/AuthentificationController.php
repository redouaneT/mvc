<?php
    // Procéder à l'authentification 
    function authentification_controller_login($request){
        // Initier un tableau de donnée vide
        $data = [];
        // Ajouter le fichier du model authentification
        require(MODEL_DIR.'/authentification.php');
        // Interoger la base de donnée et demmander les information de l'utilisateur 
        // Envoyer en paramêtre la requête venant du formulaire
        // La demande est traitée par la fonction login() du model authentification.php
        // Sauvegarder les données de l'utilisateur dans la variable $data 
        $data['user'] = authentification_model_login($request); 
        // Vérréfier la réponse obtenue
        // Si la réponse contien un message d'erreur 
        if ($data['user'] === "1" || $data['user'] === "2") {
            // Récupérer le message dans une variable $msg
            $msg =  $data['user'];
            // Rediriger la requette vers le controller login  avec le code de l'erreur renvoyée
            header("Location: ?module=login&action=index&msg=$msg");
        // Si non, si l'authentification s'est bien déroulée
        // Et qu'une session est créee  
        }else {
            // Inclure le ficher du model article.php
            require(MODEL_DIR.'/article.php');
            // Obtenir tous les articles de la base de donnée
            // Sauvegarder les données des articles dans la variable $data
            $data['article'] = article_model_list();
            // Afficher la page d'acceuil inclue les informations de l'utilisateur 
            // avec la liste des articles  
            render(VIEW_DIR.'/base/welcome.php', $data);
        }
        // À la fin, toutes les données sont sauvegardées dans la session
        $_SESSION['data'] = $data;
    }
?>

