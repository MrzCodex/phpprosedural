<?php
    require 'functions/login.php';
    if(!isset($_SESSION['user'])){
        session_start();
    }
    $user = $_COOKIE['key'];
    $email = $_SESSION['lock'] = $user;

    setcookie('ekey','',time()-3600);
    setcookie('cookie','',time()-3600);

    $data = get("SELECT * FROM user WHERE id='$email'");
    if(isset($_POST['sumbit'])){
        _login($_POST);
    }
?>
<!doctype html>
<html lang="en">


<head>

    
    <meta charset="utf-8" />
    <title>Lock Sreen page | E-Conter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="Morvin/assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="Morvin/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="Morvin/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="Morvin/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />


</head>


<body class="authentication-bg bg-primary">
    <div class="home-center">
        <div class="home-desc-center">

            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="px-2 py-3">


                                    <div class="text-center">
                                        <a href="index.html">
                                            <img src="Morvin/assets/images/logo-dark.png" height="22" alt="logo">
                                        </a>

                                        <h5 class="text-primary mb-2 mt-4">Lock Screen</h5>
                                        <p class="text-muted">Enter your password to unlock the screen!</p>
                                    </div>


                                    <form class="form-horizontal" action="" method="post">
            
                                        <div class="user-thumb text-center mb-4 mt-4">
                                            <?php if(!is_file('./img/'.$data[0]['gambar'])){;?>
                                            <img src="img/avatar.jpg" class="rounded-circle img-thumbnail avatar-md" alt="thumbnail">
                                            <?php }else{;?>
                                                <img src="img/<?=$data[0]['gambar'];?>" class="rounded-circle img-thumbnail avatar-md" alt="thumbnail">  
                                            <?php };?>
                                            <h5 class="font-size-15 mt-3"><?=$data[0]['nama'];?></h5>
                                        </div>
                    
            
                                        <div class="mb-3">
                                            <label for="userpassword">Password</label>
                                            <input type="hidden" name="email" value="<?=$data[0]['email'];?>">
                                            <input type="password" name="password" class="form-control" id="userpassword" placeholder="Enter password">
                                        </div>
            
                                        <div class="row mb-0">
                                            <div class="col-12 text-end">
                                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit" name="sumbit">Unlock</button>
                                            </div>
                                        </div>
    
                                    </form>


                                </div>
                            </div>
                        </div>

                        <div class="mt-5 text-center text-white">
                            <p>Not you ? return <a href="auth-login.html" class="fw-bold text-white"> Sign In </a> </p>
                            <p>?? <script>document.write(new Date().getFullYear())</script> Morvin. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign</p>
                        </div>
                    </div>
                </div>

            </div>


        </div>
        <!-- End Log In page -->
    </div>

    <!-- JAVASCRIPT -->
    <script src="Morvin/assets/libs/jquery/jquery.min.js"></script>
    <script src="Morvin/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="Morvin/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="Morvin/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="Morvin/assets/libs/node-waves/waves.min.js"></script>

    <script src="Morvin/assets/js/app.js"></script>

</body>


<!-- Mirrored from themesdesign.in/morvin/layouts/auth-lock-screen.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 29 Dec 2021 15:09:57 GMT -->
</html>