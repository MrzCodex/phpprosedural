<?php
$title ="E-conter";
$title2="Kas";
$title3="Tambah Kas";
?>
<?php include_once 'Morvin/header.php';?>
<?php 
    if(isset($_POST['sumbit'])){
        if(!$_POST['nama_barang']||!$_POST['keterangan']||!$_POST['harga']||!$_POST['qty']){
            echo "<script>
                    alert('Field Tidak Boleh Kosong');
                    document.location.href='kasadd.php';
                </script>";
        }
        if(kasadd($_POST) > 0){
            echo "<script>
                    alert('Data Berhasil Di Tambah !');
                    document.location.href='kas.php';
                </script>";
        } 
    }
?>
<h4>Tambah Kas</h4>
<br>
<form action="" method="post" enctype="multipart/form-data">
    <label for="nama_barang">Nama Barang</label>
    <input type="text" name="nama_barang" class="form-control" id="nama_barang">
    <br>
    <label for="keterangan">Keterangan</label>
    <input type="text" name="keterangan" class="form-control" id="keterangan">
    <br>
    <label for="harga">Harga</label>
    <input type="text" name="harga" class="form-control" id="harga">
    <br>
    <label for="qty">Qty</label>
    <input type="text" name="qty" class="form-control" id="qty">
    <br>
    <label for="gambar">Gambar</label>
    <input type="file" name="gambar" class="form-control" id="gambar">
    <br>
    <button type="sumbit" name="sumbit" class="btn btn-success">Tambah</button>
</form>
<?php include_once 'Morvin/footer.php';?>