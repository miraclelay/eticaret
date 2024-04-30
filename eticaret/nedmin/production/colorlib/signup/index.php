<?php ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!doctype html>
<html lang="en">
<head>
    <title>Sign Up 10</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">Üye Ol</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="wrap d-md-flex">
                    <div class="text-wrap p-4 p-lg-5 d-flex img d-flex align-items-end"
                         style="background-image: url(images/bg.jpg);">

                    </div>
                    <div class="login-wrap p-4 p-md-5">
                        <h3 class="mb-3">Create an account</h3>
                        <form action="../../netting/islem.php" data-parsley-validate method="post" class="signup-form"
                              enctype="multipart/form-data">

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="label"  for="name">Adınız<span class="required">*</span></label>
                                        <input type="text" name="ad" class="form-control">
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="label"  for="mail">Email Adresiniz<span
                                                    class="required">*</span></label>
                                        <input name="mail" type="email" class="form-control">
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="label" for="phone">Tel.<span
                                                    class="required">*</span></label>
                                        <input name="phone" type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="label" for="password">Şifre<span class="required">*</span></label>
                                        <input name="password" type="password" class="form-control">
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" name="kullanici_sign"
                                                class="btn btn-secondary submit p-3">Hesap Oluştur
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </form>

                        <div class="w-100 text-center">
                            <p class="mt-4">Ben zaten kullanıcıyım!<a href="../../onyuz/index.php">Giriş Yap</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>

