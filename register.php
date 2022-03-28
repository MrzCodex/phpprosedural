<?php
require 'functions/register.php';
if(!isset($_SESSION)){
    session_start();
}
// $set = get("SELECT * FROM setting WHERE menu='register'");
// if(!$set[0]['status_menu']==1){
//     echo "<script>
//             alert('Menu Register Belum Di Buka');
//             document.location.href='login.php';
//         </script>";
// }
if(isset($_SESSION['user'])){
    header('Location:index.php');
}
    if(isset($_POST['sumbit'])){
        if(!$_POST['email']||!$_POST['nama']||!$_POST['password']){
            echo "<script>
                    alert('Form Tidak Boleh Kososng !');
                </script>";
        }else{
            if(_register($_POST) >0){
                echo "<script>
                        alert('Akun Berhasil Terdaftar !');
                        document.location.href='login.php';
                    </script>";
            }else{
                echo "<script>
                        alert('Akun Gagal Terdaftar !');
                    </script>";
            }
        }
    }
?>
<!doctype html>
<html lang="en">

<head>

    
    <meta charset="utf-8" />
    <title>Register page | E Conter</title>
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

                                        <h5 class="text-primary mb-2 mt-4">Free Register</h5>
                                        <p class="text-muted">Get your free Morvin account now.</p>
                                    </div>


                                    <form class="form-horizontal" action="" method="post">
            
                                        <div class="mb-3">
                                            <label for="useremail">Email</label>
                                            <input type="email" name="email" class="form-control" id="useremail" placeholder="Enter Email">        
                                        </div>
                
                                        <div class="mb-3">
                                            <label for="username">Nama</label>
                                            <input type="text" name="nama" class="form-control" id="username" placeholder="Enter Name">
                                        </div>
                
                                        <div class="mb-3">
                                            <label for="userpassword">Password</label>
                                            <input type="password" name="password"class="form-control" id="userpassword" placeholder="Enter Password">        
                                        </div>
                    
                                        <div class="mt-4">
                                            <button class="btn btn-primary w-100 waves-effect waves-light" type="submit" name="sumbit">Register</button>
                                        </div>
                
                              
                                    </form>

                                </div>
                            </div>
                        </div>

                        <div class="mt-5 text-center text-white">
                            <p>Already have an account ? <a href="login.php" class="fw-bold text-white"> Login </a> </p>
                            <p>© <script>document.write(new Date().getFullYear())</script> Morvin. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign</p>
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

</html>