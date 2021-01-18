<?php 
include 'header.php';
yetkikontrol($_SESSION['pmadmin_kullaniciadi'], "yetki_eklenti");
?>

<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Eklenti Ekle</h3>
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
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Eklenti İsmi
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input name="eklenti_isim" type="text" placeholder="Eklenti ismini yazınız" id="first-name" class="required form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim Linki
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input name="eklenti_resim" type="text" placeholder="Eklenti resmininin dosya yolunu ve ya linkini yazın" id="first-name" class="required form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Eklenti Açıklaması
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea name="eklenti_aciklama" class="resizable_textarea form-control" placeholder="Eklenti açıklamasını yazın"></textarea>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Eklenti Fiyatı
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input name="eklenti_fiyat" type="text" placeholder="Eklenti fiyatını yazın" id="first-name" class="required form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Eklenti Sırası
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input name="eklenti_sira" type="text" value="0" id="first-name" class="required form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Eklenti Durumu
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="eklenti_durum" id="heard" class="form-control" required>
                    <option value="1">Aktif</option>
                    <option value="0">Pasif</option>
                  </select>
                </div>
              </div>

              <div align="center" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" name="yenieklentiekle" class="btn btn-success">Eklentiyi Ekle</button>
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