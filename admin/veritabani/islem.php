<?php
session_start();
ob_start();
include 'baglan.php';
include '../production/fonksiyonlar.php';

if(isset($_POST['genelayarkaydet']))
{
	$ayarkaydet=$db->prepare("UPDATE ayarlar SET
		ayar_url=:url,
		ayar_title=:title,
		ayar_logo=:logo,
		ayar_author=:author,
		ayar_description=:description,
		ayar_discord=:discord,
		ayar_keywords=:keywords,
		ayar_isim=:isim
		WHERE ayar_id = 0");
	$guncelle=$ayarkaydet->execute(array(
		'url' => $_POST['ayar_url'],
		'title' => $_POST['ayar_title'],
		'logo' => $_POST['ayar_logo'],
		'author' => $_POST['ayar_author'],
		'description' => $_POST['ayar_description'],
		'discord' => $_POST['ayar_discord'],
		'keywords' => $_POST['ayar_keywords'],
		'isim' => $_POST['ayar_isim']
	));
	if($guncelle)
		Header("Location:../production/genel-ayarlar?durum=basarili");
	else
		Header("Location:../production/genel-ayarlar?durum=basarisiz");
}
else if(isset($_POST['discordayarkaydet']))
{
	$ayarkaydet=$db->prepare("UPDATE ayarlar SET ayar_discord_webhook=:webhook, ayar_discord_etiket=:etiket");
	$guncelle=$ayarkaydet->execute(array('webhook' => $_POST['ayar_discord_webhook'], 'etiket' => $_POST['ayar_discord_etiket']));
	if($guncelle)
		Header("Location:../production/discord-ayarlar?durum=basarili");
	else
		Header("Location:../production/discord-ayarlar?durum=basarisiz");
}
else if(isset($_POST['footerayarkaydet']))
{
	$ayarkaydet=$db->prepare("UPDATE footer SET
		footer_resim=:resim,
		footer_aciklama=:aciklama,
		footer_baslik=:baslik
		WHERE footer_id = 0");
	$guncelle=$ayarkaydet->execute(array(
		'resim' => $_POST['footer_resim'],
		'aciklama' => $_POST['footer_aciklama'],
		'baslik' => $_POST['footer_baslik']
	));
	if($guncelle)
		Header("Location:../production/footer-ayarlar?durum=basarili");
	else
		Header("Location:../production/footer-ayarlar?durum=basarisiz");
}
else if(isset($_POST['yeniyorumekle']))
{
	$kaydet=$db->prepare("INSERT INTO yorumlar SET
		yorum_steamdec=:steam,
		yorum_yazici=:yazici,
		yorum_resim=:resim,
		yorum_rol=:rol,
		yorum_aciklama=:aciklama,
		yorum_sira=:sira,
		yorum_durum=:durum
		");
	$insert=$kaydet->execute(array(
		'steam' => $_POST['yorum_steamdec'],
		'yazici' => $_POST['yorum_yazici'],
		'resim' => $_POST['yorum_resim'],
		'rol' => $_POST['yorum_rol'],
		'aciklama' => $_POST['yorum_aciklama'],
		'sira' => $_POST['yorum_sira'],
		'durum' => $_POST['yorum_durum']

	));
	if($insert)
		Header("Location:../production/yorumlar.php?durum=basarili");
	else
		Header("Location:../production/yorumlar.php?durum=basarisiz");
}
else if(isset($_POST['yorumduzenle']))
{
	$kaydet=$db->prepare("UPDATE yorumlar SET
		yorum_yazici=:yazici,
		yorum_resim=:resim,
		yorum_rol=:rol,
		yorum_aciklama=:aciklama,
		yorum_sira=:sira,
		yorum_durum=:durum
		WHERE yorum_id = '".$_POST['yorumid']."'");
	$insert=$kaydet->execute(array(
		'yazici' => $_POST['yorum_yazici'],
		'resim' => $_POST['yorum_resim'],
		'rol' => $_POST['yorum_rol'],
		'aciklama' => $_POST['yorum_aciklama'],
		'sira' => $_POST['yorum_sira'],
		'durum' => $_POST['yorum_durum']
	));
	if($insert)
		Header("Location:../production/yorumlar?durum=basarili");
	else
		Header("Location:../production/yorumlar?durum=basarisiz");
}
else if(isset($_POST['yorumsil']))
{
	$kaydet=$db->prepare("DELETE FROM yorumlar WHERE yorum_id = '".$_POST['yorumid']."'");
	$insert=$kaydet->execute(array());
	if($insert)
		Header("Location:../production/yorumlar?durum=basarili");
	else
		Header("Location:../production/yorumlar?durum=basarisiz");
}
else if(isset($_POST['yenieklentiekle']))
{
	$kaydet=$db->prepare("INSERT INTO eklentiler SET
		eklenti_isim=:isim,
		eklenti_resim=:resim,
		eklenti_aciklama=:aciklama,
		eklenti_fiyat=:fiyat,
		eklenti_sira=:sira,
		eklenti_durum=:durum,
		eklenti_author=:author
		");
	$insert=$kaydet->execute(array(
		'isim' => $_POST['eklenti_isim'],
		'resim' => $_POST['eklenti_resim'],
		'aciklama' => $_POST['eklenti_aciklama'],
		'fiyat' => $_POST['eklenti_fiyat'],
		'sira' => $_POST['eklenti_sira'],
		'durum' => $_POST['eklenti_durum'],
		'author' => $_SESSION['pmadmin_kullaniciadi']
	));
	if($insert)
		Header("Location:../production/eklentiler.php?durum=basarili");
	else
		Header("Location:../production/eklentiler.php?durum=basarisiz");
}
else if(isset($_POST['eklentiduzenle']))
{
	$kaydet=$db->prepare("UPDATE eklentiler SET
		eklenti_isim=:isim,
		eklenti_resim=:resim,
		eklenti_aciklama=:aciklama,
		eklenti_fiyat=:fiyat,
		eklenti_sira=:sira,
		eklenti_durum=:durum
		WHERE eklenti_id = '".$_POST['eklentiid']."'");
	$insert=$kaydet->execute(array(
		'isim' => $_POST['eklenti_isim'],
		'resim' => $_POST['eklenti_resim'],
		'aciklama' => $_POST['eklenti_aciklama'],
		'fiyat' => $_POST['eklenti_fiyat'],
		'sira' => $_POST['eklenti_sira'],
		'durum' => $_POST['eklenti_durum']
	));
	if($insert)
		Header("Location:../production/eklentiler.php?durum=basarili");
	else
		Header("Location:../production/eklentiler.php?durum=basarisiz");
}
else if(isset($_POST['eklentisil']))
{
	$kaydet=$db->prepare("DELETE FROM eklentiler WHERE eklenti_id = '".$_POST['eklentiid']."'");
	$insert=$kaydet->execute(array());
	if($insert)
		Header("Location:../production/eklentiler.php?durum=basarili");
	else
		Header("Location:../production/eklentiler.php?durum=basarisiz");
}
else if(isset($_POST['eklentigonder']))
{
	if(isset($_POST['eklentiid']))
	{
		sendToDiscord($_POST['eklentiid']);
		//Header("Location:../production/eklentiler.php?durum=basarili");
	}
	else{
		//Header("Location:../production/eklentiler.php?durum=basarisiz");
	}
}
else if(isset($_POST['yenikullaniciekle']))
{
	$sorgu = $db->prepare("SELECT * FROM adminler WHERE admin_kullanici = '".$_POST['yetki_kullanan']."'");
	$sorgu->execute();
	if($kullanici = $sorgu->fetch(PDO::FETCH_ASSOC))
	{
		$dokunulmazlik = intval($_POST['admin_doku']);
		if($dokunulmazlik > intval($kullanici['admin_doku']))
			$dokunulmazlik = intval($kullanici['admin_doku']);
	}
	$kaydet=$db->prepare("INSERT INTO adminler SET
		admin_kullanici=:kullanici,
		admin_sifre=:sifre,
		admin_resim=:resim,
		admin_doku=:doku
		");
	$insert=$kaydet->execute(array(
		'kullanici' => $_POST['admin_kullanici'],
		'sifre' => $_POST['admin_sifre'],
		'resim' => $_POST['admin_resim'],
		'doku' => strval($dokunulmazlik)
	));
	$kaydet2=$db->prepare("INSERT INTO adminyetkiler SET
		yetki_kullanici=:kullanici,
		yetki_eklenti=:eklenti,
		yetki_yorum=:yorum,
		yetki_footer=:footer,
		yetki_genel=:genel,	
		yetki_admin=:admin	
	");
	$insert2=$kaydet2->execute(array(
		'kullanici' => $_POST['yetki_kullanici'],
		'eklenti' => $_POST['yetki_kullanici'],
		'yorum' => $_POST['yetki_yorum'],
		'footer' => $_POST['yetki_footer'],
		'genel' => $_POST['yetki_genel'],
		'admin' => $_POST['admin_kullanici']
	));
	Header("Location:../production/kullanicilar.php");
}
else if(isset($_POST['yetkiliguncelle']))
{
	$sorgu = $db->prepare("SELECT admin_doku FROM adminler WHERE admin_kullanici = '".$_POST['yetki_kullanan']."'");
	$sorgu->execute();
	if($kullanici = $sorgu->fetch(PDO::FETCH_ASSOC))
	{
		$sorgu = $db->prepare("SELECT admin_doku FROM adminler WHERE admin_kullanici = '".$_POST['yetki_admin']."'");
		$sorgu->execute();
		if($kullanilan = $sorgu->fetch(PDO::FETCH_ASSOC))
		{
			if($kullanilan['admin_doku'] <= $kullanici['admin_doku'])
			{
				$guncelle=$db->prepare("UPDATE adminyetkiler SET
					yetki_eklenti=:eklenti,
					yetki_yorum=:yorum,
					yetki_footer=:footer,
					yetki_genel=:genel,
					yetki_kullanici=:kullanici
					WHERE yetki_admin = '".$_POST['yetki_admin']."'");
				$guncelle->execute(array(
					'eklenti' => $_POST['yetki_eklenti'],
					'yorum' => $_POST['yetki_yorum'],
					'footer' => $_POST['yetki_footer'],
					'genel' => $_POST['yetki_genel'],
					'kullanici' => $_POST['yetki_kullanici']
				));
				Header("Location:../production/kullanicilar.php?durum=basarili");
			}
			else{
				Header("Location:../production/kullanicilar.php?durum=basarisiz");
			}
		}
	}
}
else if(isset($_POST['yetkilisil']))
{
	$sorgu = $db->prepare("SELECT admin_doku FROM adminler WHERE admin_kullanici = '".$_POST['yetki_kullanan']."'");
	$sorgu->execute();
	if($kullanici = $sorgu->fetch(PDO::FETCH_ASSOC))
	{
		$sorgu = $db->prepare("SELECT admin_doku FROM adminler WHERE admin_kullanici = '".$_POST['yetki_admin']."'");
		$sorgu->execute();
		if($kullanilan = $sorgu->fetch(PDO::FETCH_ASSOC))
		{
			if($kullanilan['admin_doku'] <= $kullanici['admin_doku'])
			{
				$kaydet=$db->prepare("DELETE FROM adminler WHERE admin_kullanici = '".$_POST['yetki_admin']."'");
				$kaydet->execute(array());
				
				$kaydet=$db->prepare("DELETE FROM adminyetkiler WHERE yetki_admin = '".$_POST['yetki_admin']."'");
				$kaydet->execute(array());
				Header("Location:../production/kullanicilar.php?durum=basarili");
			}
			else{
				Header("Location:../production/kullanicilar.php?durum=basarisiz");
			}
		}
	}
}
else if(isset($_POST['adminbilgileriguncelle']))
{
	$guncelle=$db->prepare("UPDATE adminler SET
		admin_kullanici=:kullanici,
		admin_sifre=:sifre,
		admin_resim=:resim
		WHERE admin_id = '".$_POST['admin_id']."'");
	$guncelle->execute(array(
		'kullanici' => $_POST['admin_kullanici'],
		'sifre' => $_POST['admin_sifre'],
		'resim' => $_POST['admin_resim']
	));
	$kaydet=$db->prepare("UPDATE adminyetkiler SET
		yetki_admin=:kullanici
		WHERE yetki_admin = '".$_SESSION['pmadmin_kullaniciadi']."'");
	$kaydet->execute(array(
		'kullanici' => $_POST['admin_kullanici']
	));
	$_SESSION['pmadmin_kullaniciadi'] = $_POST['admin_kullanici'];
	$_SESSION['pmadmin_foto']  = $_POST['admin_resim'];
	Header("Location:../production/profil.php");
}
//ob_end();
?>
