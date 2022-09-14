<?php
function user_model_insert($request){
    $msg="";
    require(CONNEX_DIR);
    print_r($request);
    foreach($request as $key=>$value){
        $$key=mysqli_real_escape_string($con,$value);
    }
    $password = password_hash($password, PASSWORD_BCRYPT);
    $sql = "INSERT INTO users (name, username, password, birthday) VALUES ('$name','$username','$password','$birthday')";
    $result = mysqli_query($con, $sql);
    mysqli_close($con);
    if (!$result) {
        $msg="1";
    }else {
        $msg="2";
    }
    return $msg;
}
?>