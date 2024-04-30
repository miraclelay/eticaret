<?php
 require_once 'header.php';
$sql = $db->prepare("SELECT * FROM kullanici WHERE id=:id"); // id column ismidir.
$sql->execute(    //php ile açılan bölgenin tümü datagripeki ayar verilerinin forma çekilmesini sağlamak için yazılmıştır.
    [
        'id'=> $_GET['id']
    ]
);

$kullanicicek = $sql->fetch(PDO::FETCH_ASSOC);

?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Kullanıcı Düzenle</h3>
              </div>


            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Kullanıcı Düzenle Formu <small>Lütfen Formu Doldurunuz <3 </small></h2>

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
                    <?php

                    ?>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="zaman">Kayıt Tarihi <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="date"  value="<?php echo $zaman[0];?>" name="zaman" required="required" class="form-control col-md-7 col-xs-12">

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="zaman">Kayıt Saati <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <input type="time"  value="<?php echo $zaman[0];?>" name="zaman" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ad">Kullanıcı Ad<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name"  value="<?php echo $kullanicicek['ad']?>" name="ad" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>



                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="soyad">Kullanıcı Soyad<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="first-name" value="<?php echo $kullanicicek['soyad']?>" name="soyad"  required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tc">Kullanıcı TC <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="first-name" value="<?php echo $kullanicicek['tc']?>" name="tc" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="author">Kullanıcı Mail <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="mail" disabled="" id="first-name" value="<?php echo $kullanicicek['mail']?>"   required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanıcı Durum <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12"  >
                             <select type="text" name="durum"   value="<?php echo $kullanicicek['mail']?>"   required="required" class="form-control col-md-7 col-xs-12">


                                 <?php echo $kullanicicek['durum']=='1' ? 'selected=""':'';?>
                                    <option value="1" <?php echo $kullanicicek['durum']=='1' ? 'selected=""' : '';?>>Aktif</option>
                                    <option value="0"<?php if ($kullanicicek['durum']=='0') {echo 'selected=""';}?>>Pasif</option>
                            </select>
                            </div>
                        </div>

                        <input type="hidden" name="id" value="<?php echo $kullanicicek['id']?>">
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                          <button type="submit" name="kullanicidüzenle" class="btn btn-success">Güncelle</button>
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