<?php
if(!isset($_SESSION)){
    session_start();
}
$_SESSION=[];
session_destroy();
session_unset();

setcookie('key',time()-3600);
setcookie('ekey',time()-3600);
setcookie('cookie',time()-3600);
header('Location:login.php');
?>