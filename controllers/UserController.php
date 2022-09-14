<?php
function user_controller_create($request){
    $data = $request;
    render(VIEW_DIR.'/user/create.php', $data);
}

function user_controller_insert($request){
    require(MODEL_DIR.'/user.php');
    $data = user_model_insert($request);
    header("Location: ?module=user&action=create&msg=$data");
}
?>