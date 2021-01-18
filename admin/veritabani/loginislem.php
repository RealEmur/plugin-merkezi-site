<?php
session_start();
ob_start();
include 'baglan.php';

if(isset($_POST['login']))
{
	$admin_kadi = $_POST['kullaniciadi'];
	$admin_sifre = $_POST['sifre'];
	if($admin_kadi && $admin_sifre)
	{
		$sorgula = $db->query("SELECT * FROM adminler WHERE admin_kullanici='$admin_kadi' AND admin_sifre='$admin_sifre'");
		$kontrol = $sorgula->rowCount();

		if($kontrol>0)
		{
			$_SESSION['pmadmin_kullaniciadi'] = $admin_kadi;

			$sorgula=$db->prepare("SELECT admin_resim FROM adminler WHERE admin_kullanici='$admin_kadi'");
			$sorgula->execute(array(0));
			$resmicek=$sorgula->fetch(PDO::FETCH_ASSOC);
			$_SESSION['pmadmin_foto'] = $resmicek['admin_resim'];
			Header('Location:../production/index.php');
		}
		else
		{
			Header('Location:../login.php?basarisiz=1');
		}
	}

}
?>
