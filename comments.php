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
            <img src="<?php echo $yorumcek['yorum_resim']; ?>" class="testimonial-img" alt="">
            <h3><?php echo $yorumcek['yorum_yazici'];?></h3>
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