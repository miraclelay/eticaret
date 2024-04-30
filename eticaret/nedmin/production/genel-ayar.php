
<?php require_once 'header.php';
$sql = $db->prepare("SELECT * FROM ayar WHERE id=:id"); // id column ismidir.
$sql->execute(    //php ile açılan bölgenin tümü datagripeki ayar verilerinin forma çekilmesini sağlamak için yazılmıştır.
    [
        'id'=>1
    ]
);

$ayarcek = $sql->fetch(PDO::FETCH_ASSOC);

?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Genel Ayarlar</h3>
              </div>


            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Genel Ayar Formu <small>Lütfen Formu Doldurunuz <3 </small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <form class="x_content">
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
                      }else if($_SESSION['durum']=="no"){?> <!--  burası update işleminin başarılı olduğunu sayfada göstermemizi sağlayan kodlar.-->
                          <div class="alert alert-danger">
                              <p>Güncelleme başarısız</p></div>
                          <?php unset($_SESSION['durum']); }
                      ?>
                    </form>
<!--                      logo ekleme kodları-->
                      <form action="netting/islem.php" method="POST" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                          <div class="form-group">
                              <label for="logo" class="control-label col-md-3 col-sm-3 col-xs-12">Yüklü Logo</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                  <?php                                                               //mevcut logonun resmini sayfada görmemizi sağlayan divler..
                                  if(strlen($ayarcek['logo'])>0){  ?>
                                      <img width="200" height="200" src="./dimg/<?php echo $ayarcek['logo']; ?>" alt="logo">
                                  <?php }else{ ?>
                                      <img width="200" height="200" src="./dimg/logo-yok.png" alt="logo">
                                  <?php }
                                  ?>
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="resim-sec" class="control-label col-md-3 col-sm-3 col-xs-12">Resim Seç</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="file" id="logo" name="logo" class="form-control col-md-7 col-xs-12">
                              </div>
                          </div>
                          <input type="hidden" name="eski_yol" value="./dimg/<?php echo $ayarcek['logo']; ?>">

                          <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                              <button type="submit" name="logoduzenle" class="btn btn-success">Logo Güncelle</button>
                          </div>

                      </form>
<!--                      logo ekleme kodları bitiş-->
                    <hr>
                    <form action="netting/islem.php" data-parsley-validate class="form-horizontal form-label-left" method="post">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Site Başlığı<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" value="<?php echo $ayarcek['title']?>" name="title" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>



                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Site Açıklaması <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="<?php echo $ayarcek['description']?>" name="description"  required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="keyword">Site Anahtar Kelime <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="<?php echo $ayarcek['keyword']?>" name="keyword" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="author">Site Yazar <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="<?php echo $ayarcek['author']?>" name="author" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit"  class="btn btn-primary">Cancel</button>
                          <button type="submit" name="ayar_kaydet" class="btn btn-success">Submit</button>
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
