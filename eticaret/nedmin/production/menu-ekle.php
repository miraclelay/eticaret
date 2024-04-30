<?php

require_once 'header.php';
$sql = $db->prepare("SELECT * FROM menu WHERE id=:id"); // id column ismidir.
$sql->execute(    //php ile açılan bölgenin tümü datagripeki menu verilerinin forma çekilmesini sağlamak için yazılmıştır.
    [
        'id'=>1
    ]
);

$menucek = $sql->fetch(PDO::FETCH_ASSOC);

?>
<head>
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
</head>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Menü Ekle</h3>
              </div>


            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> Menu Formu <small>Menu Eklemek İçin Lütfen Formu Doldurunuz <3 </small></h2>

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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="menu_ad">Menu Ad<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" placeholder="Lütfen ad giriniz." name="menu_ad" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>



                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="menu_detay"> Menü Detay <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea class="ckeditor" id="first-name" placeholder="Lütfen menü detay giriniz." name="menu_detay"></textarea>

                            </div>

                        </div>


                        <script type="text/javascript">

                            CKEDITOR.replace('editor1',


                                {


                                    filebrowserBrowseUrl: 'ckfinder/ckfinder.html',


                                    filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?type=Images',


                                    filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?type=Flash',


                                    filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',


                                    filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',


                                    filebrowserFlashUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',


                                    forcePasteAsPlainText: true


                                }


                            );


                        </script>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="menu_url">Menü URL <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="first-name" placeholder="Lütfen URL giriniz." name="menu_url" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="menu_sira">Menü Sıra <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="first-name" placeholder="Lütfen sırasını giriniz." name="menu_sira" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="durum">Menü Durum <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="first-name" placeholder="Lütfen aktiflik durumunu giriniz." name="durum" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>


                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="menuekle" class="btn btn-success">Güncelle</button>
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
