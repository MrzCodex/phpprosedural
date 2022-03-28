<?php
require 'functions/model.php';
function ban($id){
    global $link;
    $sql = "UPDATE `user` SET `status_user` = '0' WHERE `user`.`id` = '$id';";
    $query = mysqli_query($link,$sql);
    return mysqli_affected_rows($link);
}
function uban($id){
    global $link;
    $sql = "UPDATE `user` SET `status_user` = '1' WHERE `user`.`id` = '$id';";
    $query = mysqli_query($link,$sql);
    return mysqli_affected_rows($link);
}
$id = $_POST['id'];
$get = get("SELECT nama FROM user WHERE id='$id'");
$nama = $get[0]['nama'];

if(isset($_POST['ban'])){
    if(ban($id) > 0){
        echo "<script>
                alert('User $nama telah Ban!');
                document.location.href='user.php';
            </script>";
    }
}

if(isset($_POST['uban'])){
    if(uban($id) > 0){
        echo "<script>
                alert('User $nama telah UnBan!');
                document.location.href='user.php';
            </script>";
    }
}
?>