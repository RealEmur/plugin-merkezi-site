<?php include 'header.php';?>
<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
  </section><!-- End Breadcrumbs -->

  <section id="services" class="services section-bg">
    <div class="container">

      <div class="section-title">
        <span>EKLENTİLERİMİZ</span>
        <h2>EKLENTİLERİMİZ</h2>
      </div>

      <div class="row">
        <?php 
        $eklentisor=$db->prepare("SELECT * FROM eklentiler WHERE eklenti_durum = 1 ORDER BY eklenti_sira DESC");
        $eklentisor->execute();
        if($eklenticek=$eklentisor->fetch(PDO::FETCH_ASSOC))
          {?>
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" style="margin-bottom: 5%;">
              <div class="icon-box" style="width: 100%;">
                <div class="icon"><img style="height: 200px; <?php 
                  list($genislik, $yukseklik)= getimagesize($eklenticek['eklenti_resim']);
                  if($genislik/$yukseklik > 1.5)
                  {
                    echo "width: 300px;";
                  }
                  ?>margin-bottom: 4%;"src="<?php echo $eklenticek['eklenti_resim'];?>"></div>
                <h4><?php echo $eklenticek['eklenti_isim'];?></h4>
                <div style="height: 70px; overflow:hidden; text-overflow:ellipsis; margin-bottom: 3%;">
                  <p style="padding-left: 5%; padding-right: 5%;"><?php echo $eklenticek['eklenti_aciklama'];?></p>
                  
                </div>

                <div align="center">
                  <a href="eklenti.php?eklentiid=<?php echo $eklenticek['eklenti_id'];?>"><button style="margin-top: 10%;" type="submit" class="col-md-6 btn btn-primary"><b>Devamını Gör</b></button></a>
                </div>
              </div>
            </div>
            <?php
            while($eklenticek=$eklentisor->fetch(PDO::FETCH_ASSOC))
              {?>

               <div class="col-lg-4 col-md-6 d-flex align-items-stretch" style="margin-bottom: 5%;">
                <div class="icon-box" style="width: 100%;">
                  <div class="icon"><img style="height: 200px; <?php 
                  list($genislik, $yukseklik)= getimagesize($eklenticek['eklenti_resim']);
                  if($genislik/$yukseklik > 1.5)
                  {
                    echo "width: 300px;";
                  }
                  ?>margin-bottom: 4%;"src="<?php echo $eklenticek['eklenti_resim'];?>"></div>
                  <h4><?php echo $eklenticek['eklenti_isim'];?></h4>
                  <div style="height: 70px; overflow:hidden; text-overflow:ellipsis; margin-bottom: 3%;">
                    <p style="padding-left: 5%; padding-right: 5%;"><?php echo $eklenticek['eklenti_aciklama'];?></p>
                  </div>

                  <div align="center">
                    <a href="eklenti.php?eklentiid=<?php echo $eklenticek['eklenti_id'];?>"><button style="margin-top: 10%; margin-bottom: 0%;" type="submit" class="col-md-6 btn btn-primary"><b>Devamını Gör</b></button></a>
                  </div>

                </div>
              </div>
            <?php }}?>
          </div>

        </div>
      </section><!-- End Services Section -->

    </main><!-- End #main -->
    <?php include 'footer.php';?>