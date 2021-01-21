<?php
include "header.php";

$bilgisor = $db->prepare("SELECT * FROM adminler WHERE admin_kullanici = '".$_SESSION['pmadmin_kullaniciadi']."'");
$bilgisor->execute();
$bilgicek=$bilgisor->fetch(PDO::FETCH_ASSOC);
?>        
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_content">
          <div align="center" class="col-md-12 col-sm-12 col-xs-12" style="margin-top: 5%;">
            <div class="profile_img">
              <!-- Current avatar -->
              <img style="width: 40%; border-radius: 5px;box-shadow: 0px 0px 5px 3px black;" src="<?php echo $_SESSION['pmadmin_foto'] ?>" alt="">
            </div>

            <div style="width: 40%; margin-top: 1%;box-shadow: 0px 0px 5px 3px #8d99ae; background: #edf2f4; border: 10px, solid, black; border-radius: 5px; padding-top: 30px; padding-bottom: 30px;">
              <h3 style="color: #073b4c;"><?php echo $bilgicek['admin_kullanici']; ?></h3>

              <form action="../veritabani/islem.php" method="POST" style="text-align: left; color: #14213d;">
                <div class="form-group" style="margin-top:1%; color: #14213d;">
                  <label class="control-label col-md-12 col-sm-12 col-xs-12" for="first-name"><i class="fa fa-user"></i> Kullanıcı Adı
                  </label>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <input name="admin_kullanici" value="<?php echo $bilgicek['admin_kullanici'];?>" type="text" id="first-name" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="form-group" style="margin-top:1%;">
                  <label class="control-label col-md-12 col-sm-12 col-xs-12" for="first-name"><i class="fa fa-lock"></i> Şifre
                  </label>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <input name="admin_sifre" value="<?php echo $bilgicek['admin_sifre'];?>" type="password" id="first-name" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="form-group" style="margin-top:1%;">
                  <label class="control-label col-md-12 col-sm-12 col-xs-12" for="first-name"><i class="fa fa-image"></i> Profil Resmi
                  </label>
                  <div class="col-md-12 col-sm-6 col-xs-12">
                    <input name="admin_resim" value="<?php echo $bilgicek['admin_resim'];?>" type="text" id="first-name" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <input name="admin_id" value="<?php echo $bilgicek['admin_id'];?>" type="hidden">
                <div align="center" class="col-md-12" style="margin-top:1%;">
                  <button name="adminbilgileriguncelle" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Bilgileri Güncelle</button>
                </div>
                <br />
              </div>
            </div>


          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<!-- /page content -->
<?php
include 'footer.php'; 
?>