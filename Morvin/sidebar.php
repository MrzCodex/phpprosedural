<?php
    //count
    $user =count(get("SELECT * FROM user"));
    $kas = count(get("SELECT * FROM kas"));
    $hutang = count(get("SELECT * FROM hutang"));
    $all = $user+$kas+$hutang;
    //id_role
    $id = $_SESSION['user'][0]['id'];
    $role= get("SELECT id_role FROM user WHERE id='$id'");
    $settingadmin = get("SELECT * FROM setting WHERE status_menu='1' AND id_role=1");
    $settingkaryawan = get("SELECT * FROM setting WHERE status_menu='1' AND id_role=2");
?>
<div class="vertical-menu">

            <div data-simplebar class="h-100">


                <div class="user-sidebar text-center">
                    <div class="dropdown">
                        <div class="user-img">
                            <?php if(!is_file('img/'.$_SESSION['user'][0]['gambar'])){;?>
                            <img src="img/avatar.jpg" alt="" class="rounded-circle">
                            <?php }else{;?>
                            <img src="img/<?=$_SESSION['user'][0]['gambar'];?>" alt="" class="rounded-circle">
                            <?php };?>
                            <span class="avatar-online bg-success"></span>
                        </div>
                        <div class="user-info">
                            <h5 class="mt-3 font-size-16 text-white"><?=$_SESSION['user'][0]['nama'];?></h5>
                            <span class="font-size-13 text-white-50">
                            <?php if($_SESSION['user'][0]['id_role']==1){;?>
                                Administrator
                            <?php }else{;?>
                                Karyawan
                            <?php };?>
                            </span>
                        </div>
                    </div>
                </div>



                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title">Menu Karyawan</li>

                        <li>
                            <a href="index.php" class="waves-effect">
                                <i class="dripicons-home"></i><span class="badge rounded-pill bg-success float-end"><?=$all;?></span>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <?php foreach($settingkaryawan as $sidekaryawan):?>
                        <li>
                            <a href="<?=$sidekaryawan['link'];?>" class="waves-effect">
                                <?php $namemenu = $sidekaryawan['menu']; $count = count(get("SELECT * FROM $namemenu"));?>
                                <i class="<?=$sidekaryawan['icon'];?>"></i><span class="badge rounded-pill bg-success float-end"><?=$count;?></span>
                                <span><?=$sidekaryawan['menu'];?></span>
                            </a>
                        </li>
                        <?php endforeach?>
                        <?php if($role[0]['id_role']== 1):?>
                        <li class="menu-title">Menu Admin</li>
                        <?php foreach($settingadmin as $sideadmin):?>
                            <li>
                            <a href="<?=$sideadmin['link'];?>" class="waves-effect">
                                <?php $namemenu = $sideadmin['menu'];$count = count(get("SELECT * FROM $namemenu"));?>
                                <i class="<?=$sideadmin['icon'];?>"></i><span class="badge rounded-pill bg-info float-end"><?=$count;?></span>
                                <span><?=$sideadmin['menu'];?></span>
                            </a>
                            </li>
                        <?php endforeach?>
                        <?php endif;?> 
                        <!-- <li class="menu-title">Extras</li> -->

                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>