<?php 
$title="E-Conter";
$title2="Porofil";
$title3="";
?>
<?php include_once 'Morvin/header.php'?>
<?php
    $id = $_SESSION['user'][0]['id'];
    $data = get("SELECT * FROM user WHERE id='$id'");
    foreach($data as $data){
        $data;
    }
    if(isset($_POST['sumbitnama'])){
        if(!$_POST['nama']){
            echo "<script>
                    alert('Form Tidak Boleh Kosong !');
                  </script>";
        }else{
            if(changename($id,$_POST) > 0){
                echo "<script>
                        alert('Nama Berhasil Di Ubah!');
                        document.location.href='profil.php';        
                    </script>";
            }else{
                echo "<script>
                    alert('Nama Belum Di Ubah!');  
                    </script>";
            }
        }
    }
    if(isset($_POST['sumbit'])){
        if(!$_POST['passwordlama']||!$_POST['passwordbaru']){
            echo"<script>
                    alert('Password Lama Dan Password Baru Tidak Boleh Kosong');
                </script>";
        }else{
            if(changepassword($id,$_POST) > 0){
                echo "<script>
                        alert('Password Berhasil Di Ubah');
                    </script>";
            }
        }
    }
    if(isset($_POST['sumbitfoto'])){
        if($_FILES['file']['error']===4){
            echo "Upload Dulu Boss";
        }else{
           if(changephoto($id) > 0){
            echo"<script>
                    alert('Foto Profil Sudah Di Ubah!');
                    document.location.href='profil.php';
                </script>";
           }
        }
    }
?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <!-- Simple card -->
            <div class="card">
                <center>
                    <?php if(!is_file('img/'.$data['gambar'])){;?>
                    <img src="img/avatar.jpg" width="150">   
                    <?php }else{;?>
                    <img src="img/<?=$data['gambar'];?>" width="150">   
                    <?php };?>            
                    <h4 class="card-title font-size-16 mt-0"><?=$data['nama'];?></h4>
                    <p class="card-text">
                        <?php if($_SESSION['user'][0]['id_role']==1){;?>
                        <small>Administrator</small>
                        <?php }else{;?>
                        <small>Karyawan</small>
                        <?php };?>
                    </p>
                </center> 
                <div class="card-body">
                    <p class="card-text">Email : <?=$data['email'];?></p>
                    <p class="card-text">Tanggal Daftar : <?= date('d-m-y (h:i:s)',$data['date_created']);?></p>
                    <p class="card-text">Tanggal Login : <?= date('d-m-y (h:i:s)',$data['date_login']);?></p>
                    <form action="profilupdate.php" method="post" enctype="multipart/form-data">
                    <div class="col-lg-5">
                    <label>Foto Profil</label>       
                        <div class="input-group">
                            <input type="file" name="gambar" class="form-control">
                            <input type="hidden" name="id" value="<?=$data['id'];?>" class="form-control">
                            <button type="sumbit" class="btn btn-primary" name="updatefoto">Ubah Foto Profil</button>
                        </div>
                    </div>
                    </form>
                    <form action="profilupdate.php" method="post">
                    <div class="col-lg-5">
                    <label>Nama</label>       
                        <div class="input-group">
                            <input type="text" name="nama" value="<?=$data['nama'];?>"class="form-control">
                            <input type="hidden" name="id" value="<?=$data['id'];?>" class="form-control">
                            <button type="sumbit" class="btn btn-primary" name="updatenama">Ubah Nama</button>
                        </div>
                    </div>
                    </form>
                    <form action="profilupdate.php" method="post">
                        <label for="password">Password Lama :</label>
                        <input type="hidden" name="id" value="<?=$_SESSION['user'][0]['id'];?>">
                        <input type="password" name="passwordlama" class="form-control" id="password">
                        <label for="passwordnew">Password Baru :</label>
                        <input type="password" name="passwordbaru" class="form-control" id="passwordnew">
                        <br>
                        <button type="sumbit" class="btn btn-primary" name="updatepassword">Ubah Password</button>
                    </form>  
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once 'Morvin/footer.php'?>