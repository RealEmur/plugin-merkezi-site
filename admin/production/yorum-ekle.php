<?php 
include 'header.php';
yetkikontrol($_SESSION['pmadmin_kullaniciadi'], "yetki_yorum");
?>

<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Yorum Ekle</h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_content">
            <br />
            <form action="../veritabani/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

             <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">SteamDec
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input name="yorum_steamdec" type="text" placeholder="Yorum sahibinin steamdec adresi" id="first-name" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yorum Sahibi
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input name="yorum_yazici" type="text" placeholder="Yorum sahibinin nickini yazınız steamdec dolu ise boş bırakabilirsiniz" id="first-name" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim Linki
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input name="yorum_resim" type="text" placeholder="Kullanılmasını istediğiniz linki yazınız steamdec dolu ise boş bırakabilirsiniz" id="first-name" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sunucu
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input name="yorum_rol" type="text" placeholder="Sunucu ismini giriniz" id="first-name" class="required form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yorum
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input name="yorum_aciklama" type="text" placeholder="Yapılan yorumu yazınız" id="first-name" class="required form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sıra
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input name="yorum_sira" type="text" value="0" id="first-name" class="required form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Durum
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="yorum_durum" id="heard" class="form-control" required>
                    <option value="1">Aktif</option>
                    <option value="0">Pasif</option>
                  </select>
                </div>
              </div>

              <div align="center" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" name="yeniyorumekle" class="btn btn-success">Yorumu Ekle</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->
<?php include 'footer.php';?>