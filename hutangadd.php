<?php
$title="E-Conter";
$title2="Tambah Hutang";
$title3="Form Hutang";
?>
<?php include_once 'Morvin/header.php';?>
<?php
if(isset($_POST['sumbit'])){
    if(hutangadd($_POST) > 0){
        echo "<script>
                alert('Data Hutang Berhasil Di Tambah!');
                document.location.href='hutang.php'; 
            </script>";
    }else{
        echo "<script>
                alert('Data Hutang Gagal Di Tambah!');
                document.location.href='hutang.php'; 
            </script>";
    }
}
?>
<form action="" method="post" enctype="multipart/form-data">
    <label for="nama_hutang">Nama Hutang</label>
    <input type="text" name="nama_hutang" class="form-control" placeholder="Nama Hutang" id="nama_hutang">
    <br>
    <label for="nominal">Nominal</label>
    <input type="number" name="nominal" class="form-control" placeholder="Nominal" id="nominal">
    <br>
    <label for="nohp">No Hp</label>
    <input type="number" name="nohp" class="form-control" placeholder="No Hp" id="nohp">
    <br>
    <label for="status_hutang">Status</label>
    <select name="status_hutang" class="form-control" id="status_hutang">
        <option value="Lunas">Lunas</option>
        <option value="Belum Lunas">Belum Lunas</option>
    </select>
    <br>
    <label for="gambar_hutang">Gambar</label>
    <input type="file" name="gambar" class="form-control">
    <br>
    <button type="sumbit" name="sumbit" class="btn btn-primary">Tambah Hutang</button>
</form>
<?php include_once 'Morvin/footer.php';?>