  <?php include 'header.php';?> 
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1>CS:GO SUNUCUN</h1>
          <h2>En iyisi mi olsun istiyorsun? En iyisini <br>kullanmalısın.</h2>
          <div class="d-flex">
            <a href="eklentiler.php" class="btn-get-started scrollto"> Ücretli Eklentiler</a>
            <a href="https://forum.pluginmerkezi.com" class="btn-get-started scrollto"
            style="margin-left: 15px; background-color: #36437566;">Forum</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img">
          <img src="assets/img/anasayfa-sag.png" class="img-fluid animated" alt="csgo" height="40%">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row">
          <div class="col-lg-6">
            <img src="assets/img/anasayfa-sol.png" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content">
            <h3>Diğerleri Gibi Değil!</h3>
            <p class="font-italic">
              Daha öncesinde farklı yerlerden hizmet alıp memnun kalmadığınızı biliyoruz. Merak etmeyin artık emin
              ellerdesiniz..
            </p>
            <ul>
              <li><i class="icofont-check-circled"></i> Hızlı teslimat</li>
              <li><i class="icofont-check-circled"></i> Kaliteli hizmet</li>
              <li><i class="icofont-check-circled"></i> Ucuz fiyatlar</li>
              <li><i class="icofont-check-circled"></i> 7/24 Destek</li>
              <li><i class="icofont-check-circled"></i> Tecrübe</li>
              <li><i class="icofont-check-circled"></i> Başkasını aratmayan ürünler</li>
            </ul>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container">

        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">16</span>
            <p>Mutlu Müşteri</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">
            <?php 
              $eklentisayi = $db->prepare("SELECT * FROM eklentiler WHERE eklenti_durum = 1 ORDER BY eklenti_sira DESC LIMIT 999");
              $eklentisayi->execute(array());
              $kontrol = $eklentisayi->rowCount();
              echo($kontrol);?>
            </span>
            <p>Eklenti</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">7/24</span>
            <p>Hazır Destek</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">3</span>
            <p>Pluginer</p>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Plugins Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container">

        <div class="section-title">
          <span>BAZI EKLENTİLERİMİZ</span>
          <h2>BAZI EKLENTİLERİMİZ</h2>
          <p>Hepsi birbirinden iyi ama bir kaçını göstermemiz gerekiyordu.</p>
        </div>

        <div class="row">
          <?php 
          $eklentisor=$db->prepare("SELECT * FROM eklentiler WHERE eklenti_durum = 1 ORDER BY eklenti_sira DESC LIMIT 3");
          $eklentisor->execute();
          if($eklenticek=$eklentisor->fetch(PDO::FETCH_ASSOC))
            {?>
              <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
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
              <?php
              while($eklenticek=$eklentisor->fetch(PDO::FETCH_ASSOC))
                {?>

                 <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                  <div class="icon-box" style="width: 100%;">
                    <div class="icon"><img style="height: 200px;<?php 
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
              <?php }} ?>

              <div align="center" style="margin-top: 5%;">
                <a href="eklentiler.php"><button type="submit" class="col-md-3 btn btn-success"><b>Tümünü Gör</b></button></a>
              </div>

            </div>
          </div>
        </section><!-- End Plugins Section -->

        <!-- ======= Testimonials Section ======= -->
        <?php include 'comments.php';?>
        <!-- End Testimonials Section -->

      </main><!-- End #main -->
      <?php include 'footer.php';?> 