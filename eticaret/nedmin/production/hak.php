
<?php require_once 'header.php';
$sql = $db->prepare("SELECT * FROM hak WHERE id=:id"); // id column ismidir.
$sql->execute(    //php ile açılan bölgenin tümü datagripeki ayar verilerinin forma çekilmesini sağlamak için yazılmıştır.
    [
        'id'=>1
    ]
);

$ayarcek = $sql->fetch(PDO::FETCH_ASSOC);

?>
<!-- page content -->
<head>
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
</head>
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
                        <h2>Hakkımızda Bilgi Formu <small>Formu Güncelleyebilirsiniz <3 </small></h2>
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
                    <div class="x_content">
                        <br />

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
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Site Başlığı<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" value="<?php echo $ayarcek['title']?>" name="title" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="icerik"> İçerik <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea class="ckeditor" id="1" name="icerik"><?php echo $ayarcek['icerik']; ?></textarea>

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
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="video"> Video <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" value="<?php echo $ayarcek['video']?>" name="video" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="vizyon">Vizyon <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" value="<?php echo $ayarcek['vizyon']?>" name="vizyon" required="required" class="form-control col-md-7 col-xs-12">
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="misyon"> Misyon <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" value="<?php echo $ayarcek['misyon']?>" name="misyon" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>


                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit"  class="btn btn-primary">Cancel</button>
                                    <button type="submit" name="hak_kaydet" class="btn btn-success">Submit</button>
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
