<?php 
try{
	$db = new PDO("mysql:host=localhost;dbname=plugiyqm_pluginmerkezi", 'plugiyqm_qua', 'tl!]cF^5]h_%');
	//echo "veritabanı bağlantısı başarılı";
}
catch(PDOException $e)
{
	echo $e->getMessage();
}
?>