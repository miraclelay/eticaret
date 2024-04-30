<?php
 require_once 'header.php';
$slidersor=$db->prepare("SELECT * FROM slider");
$slidersor->execute();
$slider = $slidersor->fetch(PDO::FETCH_ASSOC);

?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Slider Düzenle</h3>
              </div>


            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Slider Düzenle Formu <small>Lütfen Formu Doldurunuz <3 </small></h2>

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

                      <form action="netting/islem.php" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">

                          <div class="form-group">
                              <label for="" class="control-label col-md-3 col-sm-3 col-xs-12">Yüklü Resim</label>
                              </br>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php                                                               //mevcut logonun resmini sayfada görmemizi sağlayan divler..
                                if(strlen($slider['slider_resimyol'])>0){  ?>
                                    <img width="200" src="./dimg/slider/<?php echo $slider['slider_resimyol'];  ?>">
                                <?php }else{  ?>
                                    <img width="200" height="200" src="./dimg/logo-yok.png" alt="logo">
                                <?php }
                                ?>
                              </div>
                          </div>
                          <br>

                          <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Resim Seç</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                   <input type="file"  name="slider_resimyol" class="form-control ">
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="slider_ad">Slider Ad<span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text"  value="<?php echo $slider['slider_ad']; ?>" name="slider_ad" required="required" class="form-control col-md-7 col-xs-12">
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="slider_link">Slider Link<span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" id="first-name" value="<?php echo $slider['slider_link']; ?>" name="slider_link" required="required" class="form-control col-md-7 col-xs-12">
                              </div>
                          </div>


                          <input type="hidden" name="slider_id" value="<?php echo $slider['slider_id'] ?>">

                          <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="slider_sira">Slider Sıra <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" id="first-name" value="<?php echo $slider['slider_sira']; ?>" name="slider_sira" required="required" class="form-control col-md-7 col-xs-12">
                              </div>
                          </div>


                          <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="slider_durum">Slider Durum <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                  <select id="heard" class="form-control" name="slider_durum" value="<?php echo $slider['slider_ad']; ?>" required>
                                      <option value="1">Aktif</option>
                                      <option value="0">Pasif</option>
                                  </select>
                              </div>
                          </div>


                          <div class="ln_solid"></div>
                          <div class="form-group">
                              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                  <button type="submit" name="slider_kaydet" class="btn btn-success">Değişiklikleri Kaydet</button>
                              </div>
                          </div>

                      </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
<?php
require_once 'footer.php';
?>