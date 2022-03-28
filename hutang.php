<?php
$title='E-Conter';
$title2='Hutang';
$title3="Data Hutang";
$lunascol =0;
$belumlunascol =0;
$totalcol =0;
?>
<?php include_once 'Morvin/header.php';?>
<?php
$get = get("SELECT hutang.id,nama_hutang,nominal,nohp,nama,user_id,date,status_hutang,gambar_hutang FROM hutang INNER JOIN user ON user.id=hutang.user_id");
$getuser = get("SELECT * FROM user");
if(isset($_POST['cari'])){
    $keyword = $_POST['keyword'];
    $s = $_POST['status'];
    $get = get("SELECT hutang.id,nama_hutang,nominal,nohp,nama,user_id,date,status_hutang,gambar_hutang FROM hutang INNER JOIN user ON user.id=hutang.user_id WHERE nama_hutang LIKE '%$keyword%' AND status_hutang LIKE '$s%'");
}
?>
<div class="col-lg">
    <div class="card">
        <div class="card-body">
            <h4>Table Hutang</h4>
            <a href="hutangadd.php" class="btn btn-primary">Tambah Hutang</a>
            <br>
            <br>
            <form action=""  method="post">
                <div class="input-group">
                    <input type="text" name="keyword" class="form-control" autofocus="on" autocomplate="off">
                    <select name="status" id="" class="form-control">
                        <option value="">Status</option>
                        <option value="Lunas">Lunas</option>
                        <option value="Belum Lunas">Belum Lunas</option>
                    </select>
                    <button class="btn btn-success" type="sumbit" name="cari">Cari</button>
                </div>
            </form>
            <br>
            <br>
            <div class="table-responsive">
                <table class="table table-primary mb-0">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Nominal</th>
                        <th>No Hp</th>
                        <th>Nama Karyawan</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                        <th>Total</th>
                    </tr>
                    <?php $i =0;foreach($get as $data):$i+1;$i++;?>
                    <tr>
                        <td><?=$i;?>.</td>
                        <td><?=$data['nama_hutang'];?></td>
                        <td><?=$data['nominal'];?></td>
                        <td><?=$data['nohp'];?></td>
                        <td><?=$data['nama'];?></td>
                        <td><?=date('d-m-y(h:i:s)',$data['date']);?></td>
                        <td><?=$data['status_hutang'];?></td>
                        <td><img src="img/<?=$data['gambar_hutang'];?>" width="150"></td>
                        <td>
                            <?php if($_SESSION['user'][0]['id'] != $data['user_id']){?>
                                <button class="btn btn-danger"><?=$data['nama'];?></button>
                            <?php }else{?>
                                <form action="delete.php" method="post">
                                    <input type="hidden" name="id" value="<?=$data['id'];?>">
                                    <button class="btn btn-danger" name="dhutang" type="sumbit">Hapus</button>
                                </form>
                                <br>
                                <form action="hutangupdate.php" method="post">
                                    <input type="hidden" name="id" value="<?=$data['id'];?>">
                                    <button class="btn btn-warning" name="dhutang" type="sumbit">Upadte</button>
                                </form>
                            <?php }?>
                            <?php
                                      $totalrow = $data['nominal'] * 1;
                                      $totalcol += $totalrow;
                            ?>
                        </td>
                        <td><?=$totalrow;?></td>
                    <?php endforeach;?>
                    <?php
                        $lunas = get("SELECT * FROM hutang WHERE status_hutang LIKE 'Lunas'");
                        foreach($lunas as $nlunas){
                            $lunasrow = $nlunas['nominal'] * 1;
                            $lunascol += $lunasrow;
                        }
                        $belumlunas = get("SELECT nominal FROM hutang WHERE status_hutang LIKE 'Belum Lunas'");
                        foreach($belumlunas as $nbelumlunas){
                            $belumlunascol += $nbelumlunas['nominal'];
                        } 
                        ?>
                    </tr>
                    <tr>
                        <th colspan="9">Total Lunas</th>
                        <th>Rp.<?=$lunascol?></th>
                    </tr>
                    <tr>
                        <th colspan="9">Total Belum Lunas</th>
                        <th>Rp.<?=$belumlunascol;?></th>
                    </tr>
                    <tr>
                        <th colspan="9">Total Semuanya</th>
                        <th>Rp.<?=$lunascol+$belumlunascol;?></th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include_once 'Morvin/footer.php';?>