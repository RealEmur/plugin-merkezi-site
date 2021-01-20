<?php 
try{
	$db = new PDO("mysql:host=localhost;dbname=plugiyqm_pluginmerkezi", 'plugiyqm_qua', 'tl!]cF^5]h_%');
	//$db = new PDO("mysql:host=localhost;dbname=plugiyqm_pluginmerkezi", 'root', ''); // qua localhost
}
catch(PDOException $e)
{
	echo $e->getMessage();
}
?>