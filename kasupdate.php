<?php
$title ="E-conter";
$title2="Kas";
$title3="Update Kas";
?>
<?php include_once 'Morvin/header.php';?>
<?php 
    $id = $_POST['id'];
    $get = get("SELECT * FROM kas WHERE id='$id'");
    foreach($get as $data){
        $data;
    }
    if(isset($_POST['sumbitkas'])){
        if(!$_POST['nama_barang']||!$_POST['keterangan']||!$_POST['harga']||!$_POST['qty']){
            echo "<script>
                    alert('Field Tidak Boleh Kosong');
                </script>";
        }
        if(kasupdate($_POST) > 0){
            echo "<script>
                    alert('Data Berhasil Di Update !');
                    document.location.href='kas.php';
                </script>";
        }else{
            echo "<script>
                    alert('Data Gagal Di Update !');
                </script>"; 
        }
    }
?>

<h4>Update Kas</h4>
<br>
<form action="" method="post" enctype="multipart/form-data">
    <label for="nama_barang">Nama Barang</label>
    <input type="hidden" name="id" value="<?=$data['id'];?>">
    <input type="text" name="nama_barang" value="<?=$data['nama_barang'];?>"class="form-control" id="nama_barang">
    <br>
    <label for="keterangan">Keterangan</label>
    <input type="text" name="keterangan" value="<?=$data['keterangan'];?>" class="form-control" id="keterangan">
    <br>
    <label for="harga">Harga</label>
    <input type="text" name="harga" value="<?=$data['harga'];?>" class="form-control" id="harga">
    <br>
    <label for="qty">Qty</label>
    <input type="text" name="qty" value="<?=$data['qty'];?>" class="form-control" id="qty">
    <br>
    <label for="gambar">Gambar</label>
    <input type="hidden" name="gambarlama" value="<?=$data['gambar_kas'];?>">
    <input type="file" name="gambar" class="form-control" id="gambar">
    <img src="./img/<?=$data['gambar_kas'];?>" width="150">
    <br>
    <button type="sumbit" name="sumbitkas" class="btn btn-success">Update</button>
</form>
<?php include_once 'Morvin/footer.php';?>