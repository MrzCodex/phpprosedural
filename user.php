<?php
$title="E-Conter";
$title2="User";
$title3="Data User";
?>
<?php include_once 'Morvin/header.php';adminrole()?>
<?php
$set = get("SELECT * FROM setting WHERE menu='user'");
if(!$set[0]['status_menu']==1){
    echo "<script>
            alert('Menu User Belum Di Buka');
            document.location.href='index.php';
        </script>";
}
$keyword ='';
$role ='';
    $result = get("SELECT * FROM user"); 
    if(isset($_POST['cari'])){
       
        global $link;
        $keyword = mysqli_real_escape_string($link,$_POST['keyword']);
        $role = mysqli_real_escape_string($link,$_POST['role']);
        $result = get("SELECT * FROM user WHERE nama LIKE '%$keyword%' AND id_role LIKE '%$role%'");
    }
?>
<h4>Data User</h4>
    <form action="" method="post" class="input-group">    
        <input type="text" value="<?=$keyword;?>" class="form-control" autocomplate="off" name="keyword" autofocus placeholder="Cari....">
        <select name="role" id="" class="form-control">
            <option value="">Role</option>
            <option value="1">Administrator</option>
            <option value="2">Karyawan</option>
        </select>
        <button class="btn btn-primary" type="sumbit" name="cari">Cari</button>
    </form>
<div class="col-lg">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-dark mb-0">
            
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama</th>
                                                            <th>Email</th>
                                                            <th>Status</th>
                                                            <th>Role</th>
                                                            <th>Tanggal Daftar</th>
                                                            <th>Tanggal Login</th>
                                                            <th>Gambar</th>
                                                            <?php if($_SESSION['user'][0]['id_role']==1){?>
                                                            <th>Aksi</th>
                                                            <?php }?>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $i = 1; foreach($result as $row):$i +1;?>
                                                        <tr>
                                                            <th scope="row"><?=$i;?>.</th>
                                                            <td><?=$row['nama'];?></td>
                                                            <td><?=$row['email'];?></td>
                                                            <td><?php if($row['status_user']==0){echo "<div class='btn btn-danger'>Ban</div>";}else{echo "<div class='btn btn-success'>Aktif</div>";};?></td>
                                                            <td><?php if($row['id_role']==1){echo "Administrator";}else{echo "Karyawan";};?></td>
                                                            <td><?=date('d-m-y(h:i:s)',$row['date_created']);?></td>
                                                            <td><?=date('d-m-y(h:i:s)',$row['date_login']);?></td>
                                                            <td>
                                                                <?php if(!is_file('img/'.$row['gambar'])){;?>
                                                                <img src="img/avatar.jpg" width="150">
                                                                <?php }else{;?>
                                                                <img src="img/<?=$row['gambar'];?>" width="150">
                                                                <?php };?>
                                                            </td>
                                                            <td>
                                                                <?php if($row['id_role']==1){;?>
                                                                    <button class="btn btn-danger">Administrator</button>
                                                                <?php }else{;?>
                                                                    <form action="delete.php" method="post">
                                                                    <input type="hidden" name="id" value="<?=$row['id'];?>">
                                                                    <button class="btn btn-danger" type="sumbit" name="duser">Hapus</button>
                                                                    </form>
                                                                    <br>
                                                                    <?php if($row['status_user']==1){;?>
                                                                    <form action="userban.php" method="post">
                                                                    <input type="hidden" name="id" value="<?=$row['id'];?>">
                                                                    <button class="btn btn-warning" type="name" name="ban">Ban</button>
                                                                    <?php }else{?>
                                                                    <form action="userban.php" method="post">
                                                                    <input type="hidden" name="id" value="<?=$row['id'];?>">
                                                                    <button class="btn btn-success" type="name" name="uban">Uban</button>
                                                                    <?php };?>
                                                              	</form>
                                                                <?php }?>
                                                            </td>
                                                        </tr>
                                                    <?php $i++; endforeach?>
                                                    </tbody>
                                                </table>
                                            </div>
            
                                        </div>
                                    </div>
                                </div>
                            </div>
<?php include_once 'Morvin/footer.php';?>