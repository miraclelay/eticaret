<?php

try{

$db=new PDO("mysql:host=192.168.100.231;port=3308;dbname=eticaret;charset=utf8", 'root','root');

echo"Veritabanı bağlantısı başarılı";


}
catch(PDOException $e){
echo $e;
}


?>


