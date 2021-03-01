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
		$sorgula = $db->prepare("SELECT * FROM adminler WHERE admin_kullanici=:kadi AND admin_sifre=:sifre");
		$sorgula->execute(array('kadi' => $admin_kadi,
								'sifre'=> $admin_sifre));
		$kontrol = $sorgula->rowCount();

		if($kontrol>0)
		{
			$_SESSION['pmadmin_kullaniciadi'] = $admin_kadi;

			$sorgula=$db->prepare("SELECT admin_resim FROM adminler WHERE admin_kullanici='$admin_kadi'");
			$sorgula->execute(array(0));
			$resmicek=$sorgula->fetch(PDO::FETCH_ASSOC);
			$_SESSION['pmadmin_foto'] = $resmicek['admin_resim'];
			Header('Location:../production/index');
		}
		else
		{
			Header('Location:../login?basarisiz=1');
		}
	}

}
?>
