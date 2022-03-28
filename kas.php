<?php
$title="E-Conter";
$title2="Kas";
$title3="Data Kas";
?>

<?php include_once 'Morvin/header.php';?>
<?php 
    global $link;
    $set = get("SELECT * FROM setting WHERE menu='kas'");
    if($set[0]['status_menu'] !=1){
        echo"<script>
                alert('Menu Kas Di Tutup Oleh Admin');
                document.location.href='index.php';
            </script>";
    }
    $result = get("SELECT kas.id,nama_barang,keterangan,harga,qty,id_user,nama,kas.date,gambar_kas FROM kas INNER JOIN user ON user.id=kas.id_user");
    $resultuser = get("SELECT * FROM user");

    if(isset($_POST['cari'])){
        $keyword = antisql($_POST['keyword']);
        $karyawanname = antisql($_POST['karyawan']);
        $result = get("SELECT kas.id,nama_barang,keterangan,harga,qty,id_user,nama,kas.date,gambar_kas FROM kas INNER JOIN user ON user.id=kas.id_user WHERE nama_barang LIKE'%$keyword%' AND id_user LIKE '%$karyawanname%'");
    }
    $totalall = 0;

?>
<h4>Kas</h4>
<form action="" method="post">
    <div class="input-group">
        <input type="text" name="keyword" class="form-control" placeholder="Cari..">
        <select name="karyawan" class="form-control" id="">
            <option value="">==KARYAWAN==</option>
            <?php foreach($resultuser as $karyawan):?>
            <option value="<?=$karyawan['id'];?>"><?=$karyawan['nama'];?></option>
            <?php endforeach?>
        </select>
        <button type="sumbit" name="cari" class="btn btn-primary">Cari</button>
    </div>
</form>
<div class="col-lg">
    <div class="card">
        <div class="card-body">
            <h5>Kas</h5>
            <a href="kasadd.php" class="btn btn-primary">Tambah Kas</a>
            <br>
            <br>
            <div class="table-responsive">
                <table class="table table-dark mb-0">
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Keterangan</th>
                        <th>Harga</th>
                        <th>Qty</th>
                        <th>Nama Karyawan</th>
                        <th>Tanggal</th>
                        <th>Gambar Kas</th>
                        <th>Aksi</th>
                        <th>Total</th>
                    </tr>
                    <?php $i = 0;foreach($result as $row):$i +1;$i++;?>
                    <tr>
                    <td><?=$i;?>.</td>
                    <td><?=$row['nama_barang'];?></td>
                    <td><?=$row['keterangan'];?></td>
                    <td><?=$row['harga'];?></td>
                    <td><?=$row['qty'];?></td>
                    <td><?=$row['nama'];?></td>
                    <td><?= date('d-m-y(h:i:s)',$row['date']);?></td>
                    <td><a href="img/<?=$row['gambar_kas'];?>"><img src="img/<?=$row['gambar_kas'];?>" width="150"></a></td>
                    <td>
                        <?php if($_SESSION['user'][0]['id'] != $row['id_user']){?>
                            <h6 class="btn btn-success"><?=$row['nama'];?></h6>
                        <?php }else{?>
                            <form action="delete.php" method="post">
                                <input type="hidden" name="id" value="<?=$row['id'];?>">
                                <button class="btn btn-danger" type="sumbit" name="dkas">Hapus</button>
                            </form>
                            <br>
                            <form action="kasupdate.php" method="post">
                                <input type="hidden" name="id" value="<?=$row['id'];?>">
                                <button class="btn btn-warning">Update</button>
                            </form>
                        <?php }?>
                    </td>
                    <?php 
                        $total = $row['harga'] * $row['qty'];
                        $totalall += $total;
                        ?>
                    <td>
                        Rp. <?=$total;?>
                    </td>
                     <?php endforeach?>
                    </tr>
                    <tr>
                            <th colspan="9">Total Semua</th>
                            <th>Rp. <?=$totalall;?></th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include_once 'Morvin/footer.php';?>