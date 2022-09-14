<?php
// Verrifie si une session est en cours
// Afficher la page welcome avec les informations demandées
function base_controller_index(){
    $onSession = require_once 'lib/check_session.php';
    if (isset($onSession) && $onSession === true) {
        // Si une session éxiste, on récupére juste le data de la session en cours
        // Mettre à jours le data des articles et écraser les enciens donneés
        // Afficher les articles à jours tout en concervant les données de la session en cours
        $data = $_SESSION['data'];
        require(MODEL_DIR.'/article.php');
        $data['article'] = article_model_list();
        render(VIEW_DIR.'/base/welcome.php', $data);
    }else {
        // Si aucune session est ouverte ou une ssession est détruite
        // On affiche juste la liste des articles dans la page d'acceuil welcome
        require(MODEL_DIR.'/article.php');
        $data = article_model_list();
        render(VIEW_DIR.'/base/welcome.php',$data);
    }
}
?>