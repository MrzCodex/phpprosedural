<?php
    require 'model.php';
function _security($cookie){
    global $link;
    if(!isset($cookie['key'])){
        echo "<script>
                alert('Terjadi Kesalahan 404');
                document.location.href='logout.php';
            </script>";
    }
    $id = $cookie['key'];
    $data = get("SELECT * FROM user WHERE id='$id'");
    if($cookie['key']==$data[0]['id']&&$cookie['ekey']==hash('sha256',$data[0]['email'])&&$cookie['cookie']==$data[0]['cookie']){
        $_SESSION['user']=$data;
    }else{
        echo "<script>
        alert('Terjadi Kesalahan 404');
        document.location.href='logout.php';
        </script>";
    }
    
}
?>