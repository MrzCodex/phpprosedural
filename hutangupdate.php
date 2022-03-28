<?php
$title="E-Conter";
$title2="Edit Hutang";
$title3="Form Edit Hutang";
?>
<?php include_once 'Morvin/header.php';?>
<?php
$id = $_POST['id'];
$result = get("SELECT * FROM hutang INNER JOIN user ON user.id=hutang.user_id WHERE hutang.id='$id'");
if(isset($_POST['sumbit'])){
    if(hutangupdate($_POST) > 0){
        echo "<script>
                alert('Data Hutang Berhasil Di Edit!');
                document.location.href='hutang.php'; 
            </script>";
    }else{
        echo "<script>
                alert('Data Hutang Gagal Di Edit!');
                document.location.href='hutang.php'; 
            </script>";
    }
}
?>
<form action="" method="post" enctype="multipart/form-data">
    <label for="nama_hutang">Nama Hutang</label>
    <input type="hidden" name="id" value="<?=$id;?>">
    <input type="text" name="nama_hutang" value="<?=$result[0]['nama_hutang'];?>" class="form-control" placeholder="Nama Hutang" id="nama_hutang">
    <br>
    <label for="nominal">Nominal</label>
    <input type="number" name="nominal" value="<?=$result[0]['nominal'];?>"  class="form-control" placeholder="Nominal" id="nominal">
    <br>
    <label for="nohp">No Hp</label>
    <input type="number" name="nohp" value="<?=$result[0]['nohp'];?>" class="form-control" placeholder="No Hp" id="nohp">
    <br>
    <label for="status_hutang">Status</label>
    <select name="status_hutang" class="form-control" id="status_hutang">
        <option value="<?=$result[0]['status_hutang'];?>"><?=$result[0]['status_hutang'];?></option>
        <option value="Lunas">Lunas</option>
        <option value="Belum Lunas">Belum Lunas</option>
    </select>
    <br>
    <label for="gambar_hutang">Gambar</label>
    <input type="file" name="gambar" class="form-control">
    <input type="hidden" name="gambarlama" value="<?=$result[0]['gambar_hutang'];?>">
    <img src="img/<?=$result[0]['gambar_hutang'];?>" width="150">
    <br>
    <br>
    <button type="sumbit" name="sumbit" class="btn btn-primary">Edit Hutang</button>
</form>
<?php include_once 'Morvin/footer.php';?>