<?php
$link = mysqli_connect('localhost','root','','econter');
function get($sql){
    global $link;
    $query = mysqli_query($link,$sql);
    $rows=[];
    while($row = mysqli_fetch_assoc($query)){
        $rows[]= $row;
    }
    return $rows;
}
function dberror(){
    global $link;
    return var_dump(mysqli_error($link));
}
function adminrole(){
    if($_SESSION['user'][0]['id_role'] != 1){
        echo "<script>
                alert('Anda Bukan Admin!');
                document.location.href='index.php';
            </script>";
    }
}
function antisql($data){
    global $link;
    return mysqli_real_escape_string($link,htmlspecialchars($data));
}
function cookieset($id){
    global $link;
    $date = time();
    $cookie = uniqid();
    $sql = "UPDATE `user` SET `date_login` = '$date', `cookie` = '$cookie' WHERE `user`.`id` = '$id';";
    mysqli_query($link,$sql);
    return mysqli_affected_rows($link);
}
function upload(){
    $namefile = $_FILES['gambar']['name'];
    $ukuran = $_FILES['gambar']['size'];
    $tempfile = $_FILES['gambar']['tmp_name'];
    $error = $_FILES['gambar']['error'];
    if($error ===4){
        echo "<script>
                alert('File Tidak Boleh Kosong');
            </script>";
        return FALSE;
    }
    $tipefilevalid = ['jpg','jpeg','png'];
    $tipefile   = explode('.',$namefile);
    $tipefile   = strtolower(end($tipefile));
    if(!in_array($tipefile,$tipefilevalid)){
        echo "<script>
                alert('File Tidak Sesuai !');
            </script>";
        return FALSE;
    }
    $namefilenew = uniqid();
    $namefilenew .='.'.$namefile;
    move_uploaded_file($tempfile,'img/'.$namefilenew);
    return $namefilenew;
}
function deletefile($id,$table,$dbfile){
    $get = get("SELECT * FROM $table WHERE id='$id'");
    $file = $get[0][$dbfile];
  
    if(is_file('img/'.$file)){
        unlink('img/'.$file);
    }else{
        return FALSE;
    }  
}
function kasadd($data){
    global $link;
    $nama_barang = mysqli_real_escape_string($link,htmlspecialchars($data['nama_barang'])); 
    $keterangan = mysqli_real_escape_string($link,htmlspecialchars($data['keterangan']));
    $harga = mysqli_real_escape_string($link,htmlspecialchars($data['harga'])); 
    $qty = mysqli_real_escape_string($link,htmlspecialchars($data['qty']));
    $id_user = $_SESSION['user'][0]['id'];
    $date = time();
    $gambar = upload();
    if(!$gambar){
        return FALSE;
    }
    $sql = "INSERT INTO `kas` (`id`, `nama_barang`, `keterangan`, `harga`, `qty`, `id_user`, `date`, `gambar_kas`) VALUES (NULL, '$nama_barang', '$keterangan', '$harga', '$qty', '$id_user', '$date', '$gambar');";
    mysqli_query($link,$sql);
    return mysqli_affected_rows($link);
}
function kasupdate($data){
    global $link;
    $id = antisql($data['id']);
    $nama_barang = antisql($data['nama_barang']);
    $keterangan = antisql($data['keterangan']);
    $harga = antisql($data['harga']);
    $qty = antisql($data['qty']);
    $id_user = $_SESSION['user'][0]['id'];
    $date = time();
    $gambarlama = antisql($data['gambarlama']);
    if($_FILES['gambar']['error']==4){
        $gambar = $gambarlama;
    }else{
        deletefile($id,'kas','gambar_kas');
        $gambar = upload();
        if(!$gambar){
            return FALSE;
        }
    }
    $sql ="UPDATE `kas` SET `nama_barang` = '$nama_barang', `keterangan` = '$keterangan', `harga` = '$harga', `qty` = '$qty', `id_user` = '$id_user', `date` = '$date', `gambar_kas` = '$gambar' WHERE `kas`.`id` = '$id';";
    mysqli_query($link,$sql);
    return mysqli_affected_rows($link);
}
// hutang
function hutangadd($data){
    global $link;
    $nama_hutang = antisql($data['nama_hutang']);
    $nominal = antisql($data['nominal']);
    $nohp = antisql($data['nohp']);
    $id_karyawan = antisql($_SESSION['user'][0]['id']);
    $date = antisql(time());
    $status = antisql($data['status_hutang']);
    $gambar = upload();
    if(!$gambar){
        return FALSE;
    }
    $sql ="INSERT INTO hutang VALUES(null,'$nama_hutang','$nominal','$nohp','$id_karyawan','$date','$status','$gambar')";
    mysqli_query($link,$sql);
    return mysqli_affected_rows($link);
}
function hutangupdate($data){
    global $link;
    $id = antisql($data['id']);
    $nama_hutang = antisql($data['nama_hutang']);
    $nominal = antisql($data['nominal']);
    $nohp = antisql($data['nohp']);
    $id_karyawan = antisql($_SESSION['user'][0]['id']);
    $date = antisql(time());
    $status = antisql($data['status_hutang']);
    $gambarlama = antisql($data['gambarlama']);
    if($_FILES['gambar']['error']===4){
        $gambar = $gambarlama;
    }else{
        deletefile($id,'hutang','gambar_hutang');
        $gambar = upload();
    }
    $sql ="UPDATE `hutang` SET `nama_hutang` = '$nama_hutang', `nominal` = '$nohp', `nohp` = '$nohp', `user_id` = '$id_karyawan', `date` = '$date', `status_hutang` = '$status', `gambar_hutang` = '$gambar' WHERE `hutang`.`id` = '$id';";
    mysqli_query($link,$sql);
    return mysqli_affected_rows($link);
}
function delete($id,$table){
    global $link;
    $sql = "DELETE FROM $table WHERE $table.id='$id'";
    mysqli_query($link,$sql);
    return mysqli_affected_rows($link);}
?>