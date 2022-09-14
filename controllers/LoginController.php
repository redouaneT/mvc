<?php 
    function login_controller_index($request){
        $data = $request;
        render(VIEW_DIR.'/authentification/login.php', $data);
    }
    function login_controller_logout(){
        require_once 'lib/logout.php';
        header("Location: ?module=base&action=index");
    }
?>
