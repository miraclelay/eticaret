<?php

require_once 'header.php';
$sql = $db->prepare("SELECT * FROM slider WHERE id=:id"); // id column ismidir.
$sql->execute(    //php ile açılan bölgenin tümü datagripeki slider verilerinin forma çekilmesini sağlamak için yazılmıştır.
    [
        'id'=>1
    ]
);

$slidercek = $sql->fetch(PDO::FETCH_ASSOC);

?>
<head>
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
</head>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>slider Ekle</h3>
              </div>


            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> slider Formu <small>slider Eklemek İçin Lütfen Formu Doldurunuz <3 </small></h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                      <?php
                      ?>
                      <?php
                      if($_SESSION['durum']=="ok") {?>
                          <div class="alert alert-success">
                              <p>Güncelleme başarılı</p>
                          </div>

                          <?php
                          unset($_SESSION['durum']);
                      } else if($_SESSION['durum']=="no"){?> <!--  burası update işleminin başarılı olduğunu sayfada göstermemizi sağlayan kodlar.-->
                          <div class="alert alert-danger">
                              <p>Güncelleme başarısız</p></div>
                          <?php unset($_SESSION['durum']); }
                      ?>



                    <form action="netting/islem.php" data-parsley-validate class="form-horizontal form-label-left" method="post">

                        <div class="form-group">
                            <label for="resim-sec" class="control-label col-md-3 col-sm-3 col-xs-12">Resim Seç</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file"  name="slider_resimyol" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="slider_ad">slider Ad<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" placeholder="Lütfen ad giriniz." name="slider_ad" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                          <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="slider_link">Slider Link<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" placeholder="Lütfen resmin linkini giriniz." name="slider_link" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>


                        </script>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="slider_sira">Slider Sıra <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="first-name" placeholder="Lütfen sırasını giriniz." name="slider_sira" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="slider_durum">Slider Durum <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="heard" class="form-control" name="slider_durum" required>
                                <option value="1">Aktif</option>
                                <option value="0">Pasif</option>
                                </select>
                            </div>
                        </div>


                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="sliderekle" class="btn btn-success">Kaydet</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


<!--  </body>-->
<!--</html>-->
            <?php include'footer.php'?>
