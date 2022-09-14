<?php
function article_model_index($request){
    require(CONNEX_DIR);
    foreach($request as $key=>$value){
        $$key=mysqli_real_escape_string($con,$value);
    }
    $sql = "SELECT * FROM articles INNER JOIN users on articles.users_userId = users.userId WHERE userId = $userId  ORDER BY date DESC";
    $result = mysqli_query($con, $sql);
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_close($con);
    return $result;
}
// Récupérer tous les articles dans la base de donnée avec les informations des auteur
function article_model_list(){
    require(CONNEX_DIR);
    $sql = "SELECT title, name, date, content, articleId, userId FROM articles INNER JOIN users on articles.users_userId = users.userId ORDER BY date DESC";
    $result = mysqli_query($con, $sql);
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_close($con);
    return $result;
}
// Obtenir l'article demandé afin de l'afficher dans l'éditeur
function article_model_update($request){
    session_start();
    require(CONNEX_DIR);
    foreach($request as $key=>$value){
        $$key=mysqli_real_escape_string($con,$value);
    }
    $sql = "SELECT articleId, title, content FROM articles WHERE articleId = $articleId";
    $result = mysqli_query($con, $sql);
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_close($con);
    return $result;
}

// Une fois qu'un article est modifié, l'article est mis à jour 
function article_model_edit($request){
    require(CONNEX_DIR);
    foreach($request as $key=>$value){
        $$key=mysqli_real_escape_string($con,$value);
    }
    $sql = "UPDATE articles SET title = '$title', content = '$content' WHERE articleId = '$articleId'";
    mysqli_query($con, $sql);
    mysqli_close($con);
}

// Supprimer un article
function article_model_delete($request){
    require(CONNEX_DIR);
    foreach($request as $key=>$value){
        $$key=mysqli_real_escape_string($con,$value);
    }
    $sql = "DELETE FROM articles WHERE articleId = '$articleId'";
    mysqli_query($con, $sql);
    mysqli_close($con);
}

// Créer un article
function article_model_create($request){
    require(CONNEX_DIR);
    foreach($request as $key=>$value){
        $$key=mysqli_real_escape_string($con,$value);
    }
    $sql = "INSERT INTO articles (title, content, date, users_userId) VALUES ('$title', '$content', now(), '$userId')";
    $result = mysqli_query($con, $sql);
    mysqli_close($con);
    return $result;
}
// Consulter un article
function article_model_read($request){
    session_start();
    require(CONNEX_DIR);
    foreach($request as $key=>$value){
        $$key=mysqli_real_escape_string($con,$value);
    }
    $sql = "SELECT name, articleId, title, content, date, userId FROM articles IINER JOIN users ON users_userId = userId WHERE articleId = '$articleId'";
    $result = mysqli_query($con, $sql);
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_close($con);
    return $result;
}
// Afficher les articles de l'utilisateur courant
function article_model_show($request){
    require(CONNEX_DIR);
    foreach($request as $key=>$value){
        $$key=mysqli_real_escape_string($con,$value);
    }
    $sql = "SELECT title, name, date, content, articleId, userId FROM articles INNER JOIN users on articles.users_userId = users.userId WHERE userId = $userId ORDER BY date DESC";
    $result = mysqli_query($con, $sql);
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_close($con);
    return $result;
}
?>