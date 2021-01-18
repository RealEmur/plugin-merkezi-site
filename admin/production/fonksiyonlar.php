<?php

function yetkikontrol($kullaniciadi, $yetki)
{
	include "../veritabani/baglan.php";
	$yetkikontrol=$db->prepare("SELECT * FROM adminyetkiler WHERE yetki_admin = '".$kullaniciadi."'");
	$yetkikontrol->execute(array(0));
	$yetkicek=$yetkikontrol->fetch(PDO::FETCH_ASSOC);
	if($yetkicek[$yetki] == 0)
	{
		Header("Location:index.php");
	}
}

function yetkikontrol2($kullaniciadi, $yetki)
{
	include "../veritabani/baglan.php";
	$yetkikontrol=$db->prepare("SELECT * FROM adminyetkiler WHERE yetki_admin = '".$kullaniciadi."'");
	$yetkikontrol->execute(array(0));
	$yetkicek=$yetkikontrol->fetch(PDO::FETCH_ASSOC);
	if($yetkicek[$yetki] == 0)
		return false;
	else
		return true;
}
?>