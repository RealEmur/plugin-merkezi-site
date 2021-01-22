<?php 
include 'header.php';
    $webhook=$db->prepare("select ayar_discord_webhook, ayar_discord_etiket from ayarlar");
    $webhook->execute(array());
    $webhook=$webhook->fetch(PDO::FETCH_ASSOC);
?>

<div class="right_col" role="main">
  <div class="page-title">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>WebHook Ayarları 
              <small>
                <?php if(isset($_GET['durum'])) { 
                        if($_GET['durum'] == 'basarili') {?>
                            <b style="color: green;">Güncelleme başarılı</b>
                  <?php } else {?>
                            <b style="color: red;">Güncelleme başarısız</b>
                  <?php }
                      }?>
              </small>
            </h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br/>
            <form action="../veritabani/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">WebHook Link</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input name="ayar_discord_webhook" value="<?php echo $webhook["ayar_discord_webhook"]?>" type="text" id="first-name" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">WebHook Etiket</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input name="ayar_discord_etiket" value="<?php echo $webhook["ayar_discord_etiket"]?>" type="text" id="first-name" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div align="center" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" name="discordayarkaydet" class="btn btn-success">Kaydet</button>
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