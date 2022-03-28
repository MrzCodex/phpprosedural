<?php
    require 'functions/model.php';
   
    if(!isset($_POST['id'])){
        echo "<script>
                alert('Delete Tidak Valid');
                document.location.href='index.php';
            </script>";
    }
    $id =$_POST['id'];
    if(isset($_POST['duser'])){
        $table ='user';
        deletefile($id,$table,'gambar');
        if(delete($id,$table) >0){
            echo "<script>
                    alert('Data User Berhasil Di Hapus!');
                    document.location.href='user.php';
                </script>";
        }else{
            echo "<script>
                    alert('Data User Gagal Di Hapus!');
                    document.location.href='user.php';
                 </script>";
        }
    }
    
    if(isset($_POST['dkas'])){
        $table ='kas';
        deletefile($id,$table,'gambar_kas');
        if(delete($id,$table) >0){
            echo "<script>
                    alert('Data Kas Berhasil Di Hapus!');
                    document.location.href='kas.php';
                </script>";
        }else{
            echo "<script>
                    alert('Data Kas Gagal Di Hapus!');
                    document.location.href='kas.php';
                 </script>";
        }
    }
    if(isset($_POST['dhutang'])){
        $table ='hutang';
        deletefile($id,$table,'gambar_hutang');
        if(delete($id,$table)>0){           
            echo "<script>
                    alert('Data Hutang Berhasil Di Hapus!');
                    document.location.href='hutang.php';
                </script>";
        }else{
            echo "<script>
                    alert('Data Hutang Gagal Di Hapus!');
                    document.location.href='hutang.php';
                 </script>";
        }
    }
?>