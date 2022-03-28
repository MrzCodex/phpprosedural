<?php
$title="E-Conter";
$title2="Dashboard";
$title3="All Data";
?>
<?php include_once 'Morvin/header.php';?>
<?php
//user
$totaluser ="SELECT * FROM user";
$user ="SELECT * FROM user WHERE id_role='1'";
$karyawan ="SELECT * FROM user WHERE id_role='2'";
$cadmin = count(get($user));
$ckaryawan = count(get($karyawan));
$ctotal = count(get($totaluser));
//kas
$ckas = count(get("SELECT * FROM kas"));
?>
<div class="row">
    <h4>User</h4>
        <div class="col-xl-3 col-md-3">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <div class="text-center">
                        <p class="font-size-16">Total</p>
                            <div class="mini-stat-icon mx-auto mb-4 mt-3">
                                    <span class="avatar-title rounded-circle bg-soft-dark">
                                        <i class="mdi mdi-account-outline text-success font-size-20"></i>
                                    </span>
                            </div>
                                    <h5 class="font-size-22 text-white"><?=$ctotal;?></h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <div class="text-center">
                        <p class="font-size-16">Administrator</p>
                            <div class="mini-stat-icon mx-auto mb-4 mt-3">
                                    <span class="avatar-title rounded-circle bg-soft-dark">
                                        <i class="mdi mdi-account-outline text-success font-size-20"></i>
                                    </span>
                            </div>
                                    <h5 class="font-size-22 text-white"><?=$cadmin;?></h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-3">
            <div class="card bg-danger text-white">
                <div class="card-body">
                    <div class="text-center">
                        <p class="font-size-16">Karyawan</p>
                            <div class="mini-stat-icon mx-auto mb-4 mt-3">
                                    <span class="avatar-title rounded-circle bg-soft-dark">
                                        <i class="mdi mdi-account-outline text-success font-size-20"></i>
                                    </span>
                            </div>
                                    <h5 class="font-size-22 text-white"><?=$ckaryawan;?></h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <div class="text-center">
                        <p class="font-size-16">Status Aktif</p>
                            <div class="mini-stat-icon mx-auto mb-4 mt-3">
                                    <span class="avatar-title rounded-circle bg-soft-dark">
                                        <i class="mdi mdi-account-outline text-success font-size-20"></i>
                                    </span>
                            </div>
                                    <h5 class="font-size-22 text-white"><?=$ckaryawan;?></h5>
                    </div>
                </div>
            </div>
        </div>
<h4>Kas</h4>

        <div class="col-xl-3 col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <div class="text-center">
                        <p class="font-size-16">Kas</p>
                            <div class="mini-stat-icon mx-auto mb-4 mt-3">
                                    <span class="avatar-title rounded-circle bg-soft-dark">
                                        <i class="mdi mdi-account-outline text-success font-size-20"></i>
                                    </span>
                            </div>
                            <h5 class="font-size-22 text-white"><?=$ckas;?></h5>
                    </div>
                </div>
            </div>
        </div>
<h4>Hutang</h4>
</div> <!-- end row -->
<?php include_once 'Morvin/footer.php';?>