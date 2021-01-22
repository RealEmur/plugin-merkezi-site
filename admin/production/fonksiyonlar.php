<?php
function yetkikontrol($kullaniciadi, $yetki)
{
	include "../veritabani/baglan.php";
	$yetkikontrol = $db->prepare("SELECT * FROM adminyetkiler WHERE yetki_admin = '".$kullaniciadi."'");
	$yetkikontrol->execute(array(0));
	$yetkicek=$yetkikontrol->fetch(PDO::FETCH_ASSOC);
	if($yetkicek[$yetki] == 0)
	{
		Header("Location:index");
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

function sendToDiscord($eklentid)
{
	include "../veritabani/baglan.php";
	$timestamp = date("c", strtotime("now"));
	$sorgu = sprintf("SELECT eklenti_isim,eklenti_fiyat,eklenti_resim FROM eklentiler WHERE eklenti_id = %d", $eklentid);
	$sorgu = $db->prepare($sorgu);
	$sorgu->execute();
	if($eklenti = $sorgu->fetch(PDO::FETCH_ASSOC))
	{
		$content = sprintf(":small_red_triangle: **%s**\n
		:small_orange_diamond: [Gitmek için buraya veya başlığa tıklayın](https://pluginmerkezi.com/eklenti.php?eklentiid=%d)\n
		:small_orange_diamond: Fiyat: **%d₺**\n
		:small_red_triangle_down:"
		, $eklenti['eklenti_isim'], $eklentid, $eklenti['eklenti_fiyat']);
		
		$sorgu = $db->prepare("SELECT ayar_discord_webhook, ayar_discord_etiket FROM ayarlar");
		$sorgu->execute();
		if($webhook = $sorgu->fetch(PDO::FETCH_ASSOC))
		{
			$webhooklink = strval($webhook['ayar_discord_webhook']);
			$webhooketiket = strval($webhook['ayar_discord_etiket']);
			$json_data = json_encode([
				"content" => $webhooketiket,
				"username" => "",
				"tts" => false,
				"embeds" => [
					[
						//"title" => "Yeni Bir Eklenti Eklendi",
						"type" => "rich",
						"description" => $content,
						//"url" => "https://pluginmerkezi.com",
						"timestamp" => $timestamp,
						"color" => hexdec("3366ff"),
						"author" => [
							"name" => "Yeni Bir Eklenti Eklendi",
							"url" => sprintf("https://pluginmerkezi.com/eklenti.php?eklentiid=%d", $eklentid),
							"icon_url" => "https://cdn.discordapp.com/icons/734114055710834848/6981424f72f7b084b07b0f42e660cb26.webp?size=128"
						],
						"thumbnail" => [
							"url" => sprintf("%s", $eklenti['eklenti_resim'])
						],
						/*"footer" => [
							"text" => "PluginMerkezi © 2021",
							"icon_url" => sprintf("%s", $eklenti['eklenti_resim'])
						],
						"image" => [
							"url" => sprintf("%s", $eklenti['eklenti_resim'])
						],
						"fields" => [
							[
								"name" => "Field #1 Name",
								"value" => "Field #1 Value",
								"inline" => false
								]
								]*/
					]
				]		
			], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );
			$ch = curl_init($webhooklink);
			curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
			curl_setopt( $ch, CURLOPT_POST, 1);
			curl_setopt( $ch, CURLOPT_POSTFIELDS, $json_data);
			curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt( $ch, CURLOPT_HEADER, 0);
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
			
			$response = curl_exec( $ch );
			curl_close( $ch );
		}
	}
}
?>