<?php
function article_controller_update($request){
    require(MODEL_DIR.'/article.php');
    $data = article_model_update($request);
    render(VIEW_DIR.'/articles/article-edit.php', $data);
}
function article_controller_edit($request){
    require(MODEL_DIR.'/article.php');
    article_model_edit($request);
    header("Location: ?module=base&action=index");
}
function article_controller_create($request){
    require(MODEL_DIR.'/article.php');
    $data = article_model_create($request);
    header("Location: ?module=base&action=index");
}
function article_controller_delete($request){
    require(MODEL_DIR.'/article.php');
    $data = article_model_delete($request);
    header("Location: ?module=base&action=index");
}
function article_controller_read($request){
    require(MODEL_DIR.'/article.php');
    $data = article_model_read($request);
    render(VIEW_DIR.'/articles/article-read.php', $data);
}
function article_controller_show(){
    $request = [];
    $onSession = require_once 'lib/check_session.php';
    if (isset($onSession) && $onSession === true) {
        $data = $_SESSION['data'];
        require(MODEL_DIR.'/article.php');
        $data['article'] = article_model_show($data['user']);
        render(VIEW_DIR.'/base/welcome.php', $data);
    }else {
        header("Location: ?module=login&action=index&msg=3");
    }
}
function article_controller_write($request){
    $onSession = require_once 'lib/check_session.php';
    if (isset($onSession) && $onSession === true) {
        $data['userId'] = $_SESSION['userId'];
        render(VIEW_DIR.'/articles/article-create.php', $data);
    }else {
        header("Location: ?module=login&action=index&msg=3");
    }
}
?>