<?php 
include 'admin/veritabani/baglan.php';
$yorumsor=$db->prepare("SELECT * FROM yorumlar WHERE yorum_durum = 1 ORDER BY yorum_sira DESC");
$yorumsor->execute();
if($yorumcek=$yorumsor->fetch(PDO::FETCH_ASSOC))
  {?>
<section id="testimonials" class="testimonials section-bg">
    <div class="container">
        <div class="section-title">
            <span>Yorumlar</span>
            <h2>Yorumlar</h2>
            <p>Siz değerli müşterilerimizden gelen bazı yorumlar</p>
        </div>
        <div class="owl-carousel testimonials-carousel">
            <div class="testimonial-item">
                <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    <?php echo $yorumcek['yorum_aciklama'];?>
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="
            <?php 
            if(empty($yorumcek['yorum_resim']))
            {
              if(is_numeric($yorumcek['yorum_steamdec']))
                $link = sprintf("http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=CB8E7C461AFBD3946BFEA9FC8D228D82&steamids=%s", $yorumcek['yorum_steamdec']);
              else
              {
                $link = sprintf("http://api.steampowered.com/ISteamUser/ResolveVanityURL/v0001/?key=CB8E7C461AFBD3946BFEA9FC8D228D82&vanityurl=%s", $yorumcek['yorum_steamdec']);
                $link = file_get_contents($link);
                $link = json_decode($link, true);
                $link = sprintf("http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=CB8E7C461AFBD3946BFEA9FC8D228D82&steamids=%s", $link['response']['steamid']);
              }
              $steam = file_get_contents($link);
              $steamJson = json_decode($steam, true);
              foreach ($steamJson['response']['players'] as $deger) {
                echo $deger['avatarfull'];
              }
            }
            else
              echo $yorumcek['yorum_resim'];
            ?>" class="testimonial-img" alt="">
                <h3>
                    <?php 
              if(empty($yorumcek['yorum_yazici']))
              {
                if(is_numeric($yorumcek['yorum_steamdec']))
                  $link = sprintf("http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=CB8E7C461AFBD3946BFEA9FC8D228D82&steamids=%s", $yorumcek['yorum_steamdec']);
                else
                {
                  $link = sprintf("http://api.steampowered.com/ISteamUser/ResolveVanityURL/v0001/?key=CB8E7C461AFBD3946BFEA9FC8D228D82&vanityurl=%s", $yorumcek['yorum_steamdec']);
                  $link = file_get_contents($link);
                  $link = json_decode($link, true);
                  $link = sprintf("http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=CB8E7C461AFBD3946BFEA9FC8D228D82&steamids=%s", $link['response']['steamid']);
                }
                $steam = file_get_contents($link);
                $steamJson = json_decode($steam, true);
                foreach ($steamJson['response']['players'] as $deger) {
                  echo $deger['personaname'];
                }
              }
              else
                echo $yorumcek['yorum_yazici'];
              ?>
                </h3>
                <h4><?php echo $yorumcek['yorum_rol'];?></h4>
            </div>
            <?php
          while($yorumcek=$yorumsor->fetch(PDO::FETCH_ASSOC))
            {?>

            <div class="testimonial-item">
                <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    <?php echo $yorumcek['yorum_aciklama']; ?>
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="<?php echo $yorumcek['yorum_resim']; ?>" class="testimonial-img" alt="">
                <h3><?php echo $yorumcek['yorum_yazici']; ?></h3>
                <h4><?php echo $yorumcek['yorum_rol']; ?></h4>
            </div>
            <?php }?>
        </div>

        <!--<div align="center">
            <a href="eklentiler.php"><button type="submit" class="col-md-3 btn btn-danger"><b>Yorum Yap</b></button></a>
          </div>-->
    </div>
</section>
<?php } 
      ?>