<?php
require 'model.php';
function _register($data){
    global $link;
    $nama = mysqli_real_escape_string($link,htmlspecialchars($data['nama']));
    $email = mysqli_real_escape_string($link,htmlspecialchars(strtolower($data['email'])));
    $password = mysqli_real_escape_string($link,password_hash($data['password'],PASSWORD_DEFAULT));
    $date = time();
    $q = mysqli_query($link,"SELECT * FROM user WHERE email='$email'");
    if(mysqli_num_rows($q)){
        echo "<script>
                alert('Akun Sudah Terdaftar!');
                document.location.href='register.php';
            </script>";
        return FALSE;
    }
    $sql = "INSERT INTO user VALUES(null,'$nama','$email','1','$password','$date','$date','No Cookie','2','default')";
    mysqli_query($link,$sql);
    return mysqli_affected_rows($link);
}
?>