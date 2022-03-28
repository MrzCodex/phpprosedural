<?php
    require 'functions/model.php';
    $id = $_POST['id'];
    global $link;
    $get = get("SELECT * FROM user WHERE id='$id'");
    //profil

    //update nama
    if(isset($_POST['updatenama'])){
        if(!$_POST['nama']){
            echo "<script>
            alert('Nama Tidak Boleh Kosong!');
            document.location.href='profil.php';
            </script>";
        }else{
            $nama = antisql($_POST['nama']);
            $sql ="UPDATE user SET nama = '$nama' WHERE id = $id";
            $query = mysqli_query($link,$sql);
            if(mysqli_affected_rows($link) > 0){
                echo "<script>
                alert('Nama Berhasil di Ubah');
                document.location.href='profil.php';
            </script>";
            }else{
                echo "<script>
                    alert('Nama Gagal di Ubah');
                    document.location.href='profil.php';
                </script>";
            }
        }
    }
    //updatepassword
    if(isset($_POST['updatepassword'])){
        if(!$_POST['passwordlama']||!$_POST['passwordbaru']){
            echo "Password lama dan baru tidak boleh kosong";
        }else{
            $passlama = antisql($_POST['passwordlama']);
            $passbaru = antisql($_POST['passwordbaru']);
            if(password_verify($passlama,$get[0]['password'])){
                $passbaru = password_hash($passbaru,PASSWORD_DEFAULT);
                mysqli_query($link,"UPDATE user SET password = '$passbaru' WHERE id = $id");
                if(mysqli_affected_rows($link) > 0){
                    cookieset($id);
                    echo "<script>
                            alert('Password Berhasil di Ubah');
                            document.location.href='profil.php';
                        </script>";
                }
            }else{
                echo "<script>
                alert('Password Salah');
                document.location.href='profil.php';
                </script>";
            }
        }
    }
    //updateprofil
    if(isset($_POST['updatefoto'])){
        $gambar = upload();
        if(!$gambar){
            header('Location:profil.php');
            return FALSE;
        }
        deletefile($id,'user','gambar');
        $sql = "UPDATE user SET gambar = '$gambar' WHERE id = $id";
        $query = mysqli_query($link,$sql);
        if(mysqli_affected_rows($link) > 0){
            echo "<script>
                    alert('Foto profil Berhasi di ubah');
                    document.location.href='profil.php';
                </script>";
        }
    }

?>
