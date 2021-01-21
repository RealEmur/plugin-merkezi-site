<?php 
include 'header.php';
yetkikontrol($_SESSION['pmadmin_kullaniciadi'], "yetki_kullanici");
?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <a href="kullanici-ekle"><button class="btn btn-success btn-xs"><i class="success fa fa-plus"> Yeni Yetkili Ekle</i></button></a>
        <small>
        <?php if(isset($_GET['durum']))
        { 
          if($_GET['durum'] == 'basarili') 
            {?>
              <b style="color: green;">İşlem başarılı</b>
            <?php } else {?>
              <b style="color: red;">İşlem başarısız (Dokunulmazlık yetersiz)</b>
            <?php }
          }?></small>
      </div>
    </div>

    <div class="clearfix"></div>
    <div align="center" class="col-md-12" style="margin-top: 5%;">

      <?php
      $adminkontrol=$db->prepare("SELECT * FROM adminler ");
      $adminkontrol->execute();
      while($admincek=$adminkontrol->fetch(PDO::FETCH_ASSOC))
        {?>
          <div class="x_panel" style="margin-right: 5%;width: 40%; box-sizing:border-box;">
            <img style="margin-top: 5%; margin-bottom: 2%; height: 100px; <?php 
            list($genislik, $yukseklik)= getimagesize($admincek['admin_resim']);
            if($genislik/$yukseklik > 1.5)
            {
              echo "width: 150px;";
            }
            ?>"src="<?php echo $admincek['admin_resim']; ?>">
            <h3 style="color:black;"><?php echo $admincek['admin_kullanici'];?></h3>
            <form action="../veritabani/islem" method="POST" style="margin-top: 5%;">              
              <label style="margin-left: 5%; margin-bottom: 5%;">
                <input type="checkbox" name="yetki_eklenti" value="1" class="js-switch" 
                <?php 
                if(!yetkikontrol2($_SESSION['pmadmin_kullaniciadi'], "yetki_eklenti")){echo "disabled='disabled'";}
                if(yetkikontrol2($admincek['admin_kullanici'], "yetki_eklenti")) {echo "checked";}
                ?>/> Eklentiler
              </label>
              <label style="margin-left: 5%; margin-bottom: 5%;">
                <input type="checkbox" name="yetki_kullanici" value="1" class="js-switch" <?php 
                if(!yetkikontrol2($_SESSION['pmadmin_kullaniciadi'], "yetki_kullanici")){echo "disabled='disabled'";}
                if(yetkikontrol2($admincek['admin_kullanici'], "yetki_kullanici")) {echo "checked";}
                ?>/> Kullanıcılar
              </label>
              <label style="margin-left: 5%; margin-bottom: 5%;">
                <input type="checkbox" name="yetki_yorum" value="1" class="js-switch"<?php 
                if(!yetkikontrol2($_SESSION['pmadmin_kullaniciadi'], "yetki_yorum")){echo "disabled='disabled'";}
                if(yetkikontrol2($admincek['admin_kullanici'], "yetki_yorum")) {echo "checked";}
                ?>/> Yorumlar
              </label>
              <label style="margin-left: 5%; margin-bottom: 5%;">
                <input type="checkbox" name="yetki_genel" value="1" class="js-switch" <?php 
                if(!yetkikontrol2($_SESSION['pmadmin_kullaniciadi'], "yetki_genel")){echo "disabled='disabled'";}
                if(yetkikontrol2($admincek['admin_kullanici'], "yetki_genel")) {echo "checked";}
                ?>/> Genel Ayarlar
              </label>
              <label style="margin-left: 5%; margin-bottom: 5%;">
                <input type="checkbox" name="yetki_footer" value="1" class="js-switch" <?php 
                if(!yetkikontrol2($_SESSION['pmadmin_kullaniciadi'], "yetki_footer")){echo "disabled='disabled'";}
                if(yetkikontrol2($admincek['admin_kullanici'], "yetki_footer")) {echo "checked";}
                ?>/> Footer
              </label>
              <div class="ln_solid"></div>
              <input type="hidden" name="yetki_admin" value="<?php echo $admincek['admin_kullanici'];?>">
              <input type="hidden" name="yetki_kullanan" value="<?php echo $_SESSION['pmadmin_kullaniciadi'];?>">
              <button type="submit" name="yetkiliguncelle" class="btn btn-primary">Güncelle</button>
              <button type="submit" name="yetkilisil" class="btn btn-danger">Sil</button>
            </form>
          </div>
        <?php } ?>

      </div>
    </div>
  </div>
</div>
<!-- /page content -->
<?php include 'footer.php';?>