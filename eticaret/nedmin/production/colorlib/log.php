<?php
require_once '../netting/islem.php';
?>
<!doctype >
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Giriş Yap</title>
  </head>
  <body>
  

  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('images/aslan.jpg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <div class="mb-4">
              <h3>Kullanıcı Girişi</h3>
              <p class="mb-4">Site ayarlarını düzenlemek için lütfen giriş yapınız..</p>
            </div>
              <form action="../netting/islem.php" method="POST">
              <div class="form-group first">
                <label >Kullanıcı Adı</label>
                <input type="text" class="form-control" name="mail">

              </div>
              <div class="form-group last mb-3">
                <label >Şifre</label>
                <input type="text" class="form-control" name="password">
                
              </div>
              
<!--              <div class="d-flex mb-5 align-items-center">-->
<!--                <label class="control control--checkbox mb-0"><span class="caption">Beni Hatırla</span>-->
<!--                  <input type="checkbox" checked="checked"/>-->
<!--                  <div class="control__indicator"></div>-->
<!--                </label>-->
<!--                <span class="ml-auto"><a href="#" class="forgot-pass">Şifrenizi mi unuttunuz?</a></span>-->
<!--              </div>-->

              <input type="submit"  name="admingiris" class="btn btn-block btn-primary">
                  <?php
                  if (isset($_GET['durum'])) {
                      $durum = $_GET['durum'];

                      switch ($durum) {
                          case "no":
                              echo "Kullanıcı Bulunamadı...";
                              break;
                          case "exit":
                              echo "Başarıyla Çıkış Yaptınız.";
                              break;
                          default:
                              echo "Bilinmeyen bir durum.";
                              break;
                      }
                  } else {
                      echo "Durum parametresi eksik.";
                  }
                  ?>


                  <span class="d-block text-center my-4 text-muted">&mdash; or &mdash;</span>
              
              <div class="social-login">
                <a href="#" class="facebook btn d-flex justify-content-center align-items-center">
                  <span class="icon-facebook mr-3"></span>Facebook ile Giriş Yap
                </a>
                <a href="#" class="twitter btn d-flex justify-content-center align-items-center">
                  <span class="icon-twitter mr-3"></span> Twitter ile Giriş Yap
                </a>
                <a href="#" class="google btn d-flex justify-content-center align-items-center">
                  <span class="icon-google mr-3"></span>Google ile Giriş Yap
                </a>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>

    
  </div>
