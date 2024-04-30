<?php //echo"<pre>";
ob_start();
session_start();
//print_r($_POST);
//echo "<pre>";
require_once 'baglan.php';
//echo"<pre>"; //pre kodu daha düzenli görmemizi sağladı.
//print_r($_POST);
//echo"<pre>";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(isset($_POST['kullanici_sign'])) {
//    try {
        echo $ad = htmlspecialchars($_POST['ad']);
        echo "<br>";
        echo $mail = htmlspecialchars($_POST['mail']);
        echo "<br>";
        echo $phone = $_POST['phone'];
        echo "<br>";
        echo $password = $_POST['password'];
        echo "<br>";
        if (strlen($password) >= 6) {
            $kullanicisor = $db->prepare("select * from kullanici SET mail=:mail");
            $kullanicisor->execute(array(
                'mail' => $mail
            ));
            $say = $kullanicisor->rowCount();
            if ($say == 0) {
                $password = ($password);
//        kayıt
                $kullanicisign = $db->prepare("INSERT INTO kullanici Set
                          'ad'=:ad,
                          'mail'=:mail,
                          'phone'=:phone,
                          'password'=:password
                      ");
                $insert = $kullanicisign->execute(array(
                    'ad' => $ad,
                    'mail' => $mail,
                    'phone' => $phone,
                    'password' => $password
                ));
                if ($insert) {
                    echo "kayıt başarılı";
                } else {
                    echo "başarısız";
                }
//        bitişi
            } else {
                header("location:../colorlib/signup/index.php?durum=eksiksifre");
            }
        }
//    }catch(Exception $ex) {
//        echo  $ex;
//    }
}

if (isset($_POST['slider_kaydet'])) {

    $slider_id = $_POST['slider_id'];  // Get the slider_id from the form
}

    if (!empty($_FILES['slider_resimyol']["tmp_name"]))
    {

        $uploads_dir = '../dimg/slider';       //dosya yolu
        $tmp_name = $_FILES['slider_resimyol']["tmp_name"];  //yüklenen dosyanın geçici adı
        $name = $_FILES['slider_resimyol']["name"];   //dosyanın adı
        $benzersizsayi4 = rand(20000, 32000);
        $refimgyol = $benzersizsayi4 . $name;
        move_uploaded_file($tmp_name, "$uploads_dir/$refimgyol");

        $duzenle = $db->prepare("UPDATE slider SET slider_resimyol=:slider_resimyol WHERE slider_id = $slider_id");
        $update = $duzenle->execute(array('slider_resimyol' => $refimgyol));
    }

    try {
        $sql = $db->prepare("UPDATE slider SET
    slider_ad=:slider_ad,
    slider_link=:slider_link,
    slider_sira=:slider_sira,
    slider_durum=:slider_durum
     WHERE slider_id =$slider_id");

        $update = $sql->execute([
            'slider_ad' => $_POST['slider_ad'],
            'slider_link' => $_POST['slider_link'],
            'slider_sira' => $_POST['slider_sira'],
            'slider_durum' => $_POST['slider_durum']
        ]);
    }
    catch (Exception $ex)
    {
        echo $ex->getMessage();
        exit();
    }

    if($update){
        $_SESSION['durum'] = "ok";

        header("Location:../slider-duzenle.php");
        exit;
    }else
    {
        $_SESSION['durum'] = "no";
        header("location:../slider-duzenle.php?sil=ok");     //slider silme işlemleri
        exit;

}


if(isset($_GET['slidersil'])){
    $sil=$db->prepare("DELETE FROM slider WHERE slider_id=:slider_id");
    $kontrol=$sil->execute(array(
        'slider_id'=>$_GET["slider_id"]
    ));
    if($kontrol){
        header("Location:../slider.php?sil=ok");
        exit;
    }else{
        header("Location:../slider.php?sil=no");
        exit;
    }
}

if(isset($_POST['sliderekle'])) {

    $uploads_dir = '../dimg/slider';
    @$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
    //resmin isminin benzersiz olması için
    $benzersizsayi1 = rand(20000, 32000);
    $benzersizsayi2 = rand(20000, 32000);
    $benzersizsayi3 = rand(20000, 32000);
    $benzersizsayi4 = rand(20000, 32000);
    $benzersizad = $benzersizsayi1 . $benzersizsayi2 . $benzersizsayi3 . $benzersizsayi4;

    $refimgyol = substr($uploads_dir, 6);"/" . $benzersizad . $name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$bensersizad$name");

$kaydet=$db->prepare("INSERT INTO slider SET 
                       slider_ad=:slider_ad,
                   slider_sira=:slider_sira,
                   slider_link=:slider_link,
                   slider_resimyol=:slider_resimyol
                   ");
$insert=$kaydet->execute(array(
    'slider_ad'=>$_POST['slider_ad'],
    'slider_sira'=>$_POST['slider_sira'],
    'slider_link'=>$_POST['slider_link'],
    'slider_resimyol'=>$_POST['slider_resimyol']
));
if($insert){
    header("location:../slider.php?durum=ok");
}else{
    header("location:../slider.php?durum=no");
}
}








if(isset($_POST['logoduzenle'])){
    $uploads_dir='../dimg';
    @$tmp_name =$_FILES['logo']["tmp_name"];
    @$name =$_FILES['logo']["name"];
    $benzersizsayi4=rand(20000,32000);
    $refimgyol=substr($uploads_dir).$benzersizsayi4.$name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");

    $duzenle=$db->prepare("UPDATE ayar SET logo=:logo WHERE id=1");
    $update=$duzenle->execute(array('logo'=> $refimgyol));

    if($update){
        $resimsilunlink=$_POST['eski_yol'];
        unlink("../$resimsilunlink");
        header("location:../genel-ayar.php?durum=ok");
    }else{
        header("location:../genel-ayar.php?durum=no");
//        if ($update) {
//            // Your success logic here
//            echo "başarılı";
//        } else {
//            // Handle the database update error
//            echo "Database update failed: " . $duzenle->errorInfo()[2];
//        }
//    if ($_FILES['logo']['error'] === UPLOAD_ERR_OK) {
//        // Continue with file processing
//        echo"başarılı";
//    } else {
//        // Handle the upload error (e.g., display an error message)
//        echo "Database upload failed: " . $duzenle->errorInfo()[2]; belirttiğimiz klasöre yüklemede hata olup olmadığını kontrol etmek için yazdığımız kodlar..
//    }
//
    }




}






if (isset($_POST['menuekle'])) {
    try {
        $seo_url = seo($_POST['menu_ad']);

        $ayarekle = $db->prepare("INSERT INTO menu SET
    menu_ad=:menu_ad,
    menu_detay=:menu_detay,
    menu_url=:menu_url,
    menu_sira=:menu_sira,
    seo_url=:seo_url,
    durum=:durum");

        $insert = $ayarekle->execute([
            'menu_ad' => $_POST['menu_ad'],
            'menu_detay' => $_POST['menu_detay'],
            'menu_url' => $_POST['menu_url'],
            'menu_sira' => $_POST['menu_sira'],
            'seo_url' => $_POST['seo_url'],
            'durum' => $_POST['durum']

        ]);

    } catch (Exception $ex) {
        echo $ex->getMessage();
        exit;
    }
    if ($insert) {
        header("Location:../menu-duzenle.php?menuekle=ok");
        exit;
    } else {
        header("location:../menu.php?menuekle=no");
        exit;
    }


}
if(isset($_GET['menusil'])){
    $sil=$db->prepare("DELETE FROM menu WHERE id=:id");
    $kontrol=$sil->execute(array(
        'id'=>$_GET["id"]
    ));
    if($kontrol){
        header("Location:../menu.php?sil=ok");
        exit;
    }else{
        header("Location:../menu.php?sil=no");
        exit;
    }

}

if (isset($_POST['menu_kaydet'])) {
    $id=$_POST['id'];
    $seo_url=seo($_POST['menu_ad']);
    try {
        $sql = $db->prepare("UPDATE menu SET
    menu_ad=:menu_ad,
    menu_detay=:menu_detay,
    menu_url=:menu_url,
    menu_sira=:menu_sira,
    seo_url=:seo_url,
    durum=:durum
    WHERE id=1");

        $update = $sql->execute([
            'menu_ad' => $_POST['menu_ad'],
            'menu_detay' => $_POST['menu_detay'],
            'menu_url' => $_POST['menu_url'],
            'menu_sira' => $_POST['menu_sira'],
            'seo_url' => $_POST['seo_url'],
            'durum' => $_POST['durum']

        ]);
    }
    catch (Exception $ex)
    {
        echo $ex->getMessage();
        exit();
    }

    if($update){
        $_SESSION['durum'] = "ok";
        header("Location:../menu-duzenle.php");
        exit;
    }else
    {
        $_SESSION['durum'] = "no";
        header("location:../menu-duzenle.php?sil=ok");     //kullanıcı silme işlemleri
        exit;
    }
    }
if(isset($_GET['kullanicisil'])){
    $sil=$db->prepare("DELETE from kullanici where id=:id");
    $kontrol=$sil->execute(array(
        'id'=> $_GET['id']     //yapılan değişiklikerin ardından id'm düzenlenmiş ıdlere eşit dedim.
    ));
    if($kontrol){
        header("location:../kullanici.php?sil=ok");     //kullanıcı silme işlemleri
        exit;
    }else {
        header("location:../kullanici.php?sil=no");
        exit;
    }
}

try {
    {
    }
    if (isset($_POST['kullanicidüzenle'])) {
        $id = $_POST['id'];
        $sql = $db->prepare(" UPDATE kullanici SET
    tc=:tc,
    ad=:ad,
    soyad=:soyad,
    durum=:durum
    WHERE id={$_POST['id']}");

        $update = $sql->execute([
            'tc' => $_POST['tc'],
            'ad' => $_POST['ad'],
            'soyad' => $_POST['soyad'],
            'durum' => $_POST['durum']

        ]);
        if ($update) {
            header("Location:../kullanici-duzenle.php?kullanici_id=$id&durum=ok");
        } else {
            header("Location:../kullanici-duzenle.php?kullanici_id=$id&durum=no");
        }
    }
    }catch(Exception $e){
    echo"Hata:". getMessage();
}

if (isset($_POST['admingiris'])) {
    $mail = $_POST['mail'];
    $password = ($_POST['password']);

    $kullanicisor = $db->prepare("SELECT * FROM kullanici WHERE mail=:mail and password=:password");
    $kullanicisor->execute(array(
        'mail'=>$mail,
        'password'=>$password
    ));

    echo $say = $kullanicisor->rowCount(); // "rowcount()" kullanılmıştır.

    if ($say == 1) {
        $_SESSION['mail'] = $mail;
        header("Location: ../index.php");
        exit;

    } else {
        $_SESSION['durum'] = "no";
        header("Location: ../colorlib/log.php");
        exit;
    }
}

function ayar_table_update($db)
{
    try
    {

        $sql = $db->prepare("UPDATE ayar SET
                title=:title,
                description=:description,
                keyword=:keyword,
                author=:author,
                phone=:phone,
                gsm=:gsm,
                faks=:faks,
                mail=:mail,
                il=:il,
                ilce=:ilce,
                adres=:adres,
                mesai=:mesai,
                maps=:maps,
                analiystic=:analiystic,
                zopim=:zopim,
                facebook=:facebook,
                twitter=:twitter,
                google=:google,
                youtube=:youtube,
                smtpost=:smtpost,
                smtpassword=:smtpassword,
                smtpport=:smtpport WHERE id=1");

        $update = $sql->execute([
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'keyword' => $_POST['keyword'],
            'author' => $_POST['author'],
            'phone' => $_POST['phone'],
            'gsm' => $_POST['gsm'],
            'faks' => $_POST['faks'],
            'mail' => $_POST['mail'],
            'il' => $_POST['il'],
            'ilce' => $_POST['ilce'],
            'adres' => $_POST['adres'],
            'mesai' => $_POST['mesai'],
            'maps' => $_POST['maps'],
            'analiystic' => $_POST['analiystic'],
            'zopim' => $_POST['zopim'],
            'facebook' => $_POST['facebook'],
            'twitter' => $_POST['twitter'],
            'google' => $_POST['google'],
            'youtube' => $_POST['youtube'],
            'smtpost' => $_POST['smtpost'],
            'smtpassword' => $_POST['smtpassword'],
            'smtpport' => $_POST['smtpport']
        ]);

    }
    catch (Exception $ex)
    {

        exit();
    }

    return $update;

}
    if(isset($_POST['ayar_kaydet'])) {
       $update =  ayar_table_update($db);
        if ($update) {
            $_SESSION['durum'] = "ok";
            header("Location:../genel-ayar.php");
            exit;
        }else
        {
            $_SESSION['durum'] = "no";
            header("Location:../genel-ayar.php");

            exit;
        }
    }

    if(isset($_POST['iletisim_kaydet'])) {
       $update =  ayar_table_update($db);

    if ($update) {
        $_SESSION['durum'] = "ok";
        header("Location:../iletisim-ayarlar.php");
        exit;
    }else
    {
        $_SESSION['durum'] = "no";
        header("Location:../iletisim-ayar.php");
        exit;
    }
}

if(isset($_POST['api_kaydet'])) {
    $update = ayar_table_update($db);

    if ($update) {
        $_SESSION['durum'] = "ok";
        header("Location:../api.php");
        exit;
    } else {
        $_SESSION['durum'] = "no";
        header("Location:../api.php");
        exit;
    }
}

if(isset($_POST['hak_kaydet'])){
    $sql=$db->prepare(" UPDATE hak SET
    title=:title,
    icerik=:icerik,
    video=:video,
    vizyon=:vizyon,
    misyon=:misyon WHERE id=1"
);
$update =$sql->execute([
    'title' => $_POST['title'],
    'icerik' => $_POST['icerik'],
    'video' => $_POST['video'],
    'vizyon' => $_POST['vizyon'],
    'misyon' => $_POST['misyon']
]);
    if ($update) {
        $_SESSION['durum'] = "ok";
        header("Location:../hak.php");
        exit;
    } else {
        $_SESSION['durum'] = "no";
        header("Location:../hak.php");
        exit;
    }
}

if(isset($_POST['hak_kaydet'])) {
    $sql = $db->prepare(" UPDATE hak SET
    title=:title,
    icerik=:icerik,
    video=:video,
    vizyon=:vizyon,
    misyon=:misyon WHERE id=1"
    );
    $update = $sql->execute([
        'title' => $_POST['title'],
        'icerik' => $_POST['icerik'],
        'video' => $_POST['video'],
        'vizyon' => $_POST['vizyon'],
        'misyon' => $_POST['misyon']
    ]);
    if ($update) {
        $_SESSION['durum'] = "ok";
        header("Location:../hak.php");
        exit;
    } else {
        $_SESSION['durum'] = "no";
        header("Location:../hak.php");
        exit;
    }}




