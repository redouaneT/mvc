<?php
session_start(); 
if(isset($_SESSION['fingerPrint']) and $_SESSION['fingerPrint'] == md5($_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR'])){
    return true;
}else{
    require_once 'lib/logout.php';
    return false;
}
?>