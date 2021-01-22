<?php 
include 'header.php';
$gelenid = $_GET['eklentiid'];
?>
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
        <?php 
    $eklentisor=$db->prepare("SELECT * FROM eklentiler WHERE eklenti_id = $gelenid");
    $eklentisor->execute();
    if($eklenticek=$eklentisor->fetch(PDO::FETCH_ASSOC))
      {?>
        <div align="center" class="container">
            <h1 style="color: #264653;"><b><?php echo $eklenticek['eklenti_isim']?></b></h1>
            <p style="margin-bottom: 4%;">Tarih: <?php echo $eklenticek['eklenti_tarih'];?></p>
            <img style="margin-bottom: 4%; border: 1px transparent; background: #edf6f9; padding: 10px; box-shadow: 0px 0px 15px #888888; text-align: center; height:400px;"
                src="<?php echo $eklenticek['eklenti_resim']?>">
            <p style="text-align: center;"><br><?php echo $eklenticek['eklenti_aciklama']?></small></p>
            <?php 
          $indirimsor=$db->prepare("SELECT * FROM indirimler WHERE indirim_tur = 'eklenti'");
          $indirimsor->execute();
          if($indirimcek=$indirimsor->fetch(PDO::FETCH_ASSOC))
          {
            $yenifiyat = ($eklenticek['eklenti_fiyat'] / 100) * (100 - $indirimcek['indirim_miktar']);?>
            <a href="https://pluginmerkezi.com/sartlar">
                <button style="margin-top: 3%;" type="submit" class="btn btn-success">
                    İndirimli: <?php echo $yenifiyat ?>TL<del><?php echo $eklenticek['eklenti_fiyat']."TL"?></del>
                </button>
            </a><?php 
          }
          else
          {
              ?>
            <a href="https://pluginmerkezi.com/sartlar">
                <button style="margin-top: 3%;" type="submit" class="btn btn-success">Satın Al:<?php echo $eklenticek['eklenti_fiyat']?>TL</button>
            </a><?php 
          }?>
        </div>
        <?php } 
          else
            Header("Location:eklentiler");?>
    </section>

</main><!-- End #main -->
<?php include 'footer.php';?>