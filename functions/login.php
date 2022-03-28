<?php
require 'model.php';
function _login($data){
    global $link;
    $email = antisql($data['email']);
    $password = antisql($data['password']);
    $check = mysqli_query($link,"SELECT * FROM user WHERE email='$email'");
    while($row = mysqli_fetch_assoc($check)){
        $rows[]=$row;
        $nama = $row['nama'];
        $id = $row['id'];
    }
    if(mysqli_num_rows($check) ===1){
        if(password_verify($password,$rows[0]['password'])){
            if($rows[0]['status_user']==0){
                echo "<script>
                        alert('Akun Anda Telah Ban Harap Hubungi Admin');
                        document.location.href='logout.php';
                    </script>";
            }
            cookieset($id);
            $check = mysqli_query($link,"SELECT * FROM user WHERE email='$email'");
            while($row = mysqli_fetch_assoc($check)){
                $r[]=$row;
                $nama = $row['nama'];
                $key = $row["id"];
                $ekey = hash('sha256',$row['email']);
                $cookie = $row["cookie"];
            }
            $_SESSION['user'] = $r;
            setcookie('key',$key);
            setcookie('ekey',$ekey);
            setcookie('cookie',$cookie);
            if(isset($data['ingat'])){
                setcookie('key',$key,time()+3600);
                setcookie('ekey',$ekey,time()+3600);
                setcookie('cookie',$cookie,time()+3600);
            }
            echo "<script>
                    alert('Login Berhasil Selamat Datang $nama');
                    document.location.href='index.php';
                </script>";
        }else{
            echo "<script>
                    alert('Password Salah!');
                </script>";
        }
    }else{
        echo "<script>
                alert('Email Belum Terdaftar!');
            </script>";
    }
}
?>