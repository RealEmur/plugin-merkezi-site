<?php 
try{
	$db = new PDO("mysql:host=localhost;dbname=plugiyqm_pluginmerkezi", 'plugiyqm_qua', 'tl!]cF^5]h_%');
	$names=$db->prepare("SET NAMES UTF8");
	$names->execute();
	//$db = new PDO("mysql:host=localhost;dbname=plugiyqm_pluginmerkezi", 'root', ''); // localhost
}
catch(PDOException $e)
{
	echo $e->getMessage();
}
?>
