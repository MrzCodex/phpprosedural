<?php
$title="E-Conter";
$title2="Setting";
$title3="All";
?>
<?php include_once 'Morvin/header.php';adminrole();?>
<?php
    $get = get("SELECT * FROM setting");
?>
<h5>Setting Page</h5>
<form action="" method="post">
    <?php foreach($get as $menu):?>
    <?php
          if(isset($_POST['sumbit'])){
            global $link;
            $id = $menu['id'];
            $s = antisql($_POST[$menu['menu']]); //ini di ambel dari post di bawah karena menggunakan db maka di akan berulang bebanyak yang ada di db di tabel setting
            $sql = "UPDATE `setting` SET `status_menu` = '$s' WHERE `setting`.`id` = '$id';";
            mysqli_query($link,$sql);
            echo "<script>
                    alert('Setting Berhasil Ubah!');
                    document.location.href='setting.php';
                </script>";
        }
    ?>
    <label for="<?=$menu['menu'];?>"><?= $menu['menu'];?></label>
    <input type="hidden" name="id" value="<?=$menu['id'];?>">
    <select name="<?=$menu['menu'];?>" id="register" class="form-control">
        <option value="<?=$menu['status_menu'];?>"><?php if($menu['status_menu']==1){echo "Aktif";}else{echo "Non Aktif";}?></option>
        <option value="1">Aktif</option>
        <option value="0">Non Aktif</option>
    </select>
    <br>
    <?php endforeach?>
    
    <button class="btn  btn-primary" type="sumbit" name="sumbit">Save</button>
</form>
<?php include_once 'Morvin/footer.php';?>