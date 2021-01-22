<?php 
include 'header.php';
yetkikontrol($_SESSION['pmadmin_kullaniciadi'], "yetki_genel");

$ayarsor=$db->prepare("select * from ayarlar where ayar_id=?");
$ayarsor->execute(array(0));

$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);
?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Ayarlar</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Ne arıyorsun?">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Ara</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Genel Ayarlar <small>
                                <?php if(isset($_GET['durum']))
              { 
                if($_GET['durum'] == 'basarili') 
                {?>
                                <b style="color: green;">Güncelleme başarılı</b>
                                <?php } else 
                {?>
                                <b style="color: red;">Güncelleme başarısız</b>
                                <?php }
              }?></small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form action="../veritabani/islem.php" method="POST" id="demo-form2" data-parsley-validate
                            class="form-horizontal form-label-left">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Site Başlığı
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input name="ayar_title" value="<?php echo $ayarcek['ayar_title']?>" type="text"
                                        id="first-name" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Logo (Title)
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input name="ayar_logo" value="<?php echo $ayarcek['ayar_logo']?>" type="text"
                                        id="first-name" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Author
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input name="ayar_author" value="<?php echo $ayarcek['ayar_author']?>" type="text"
                                        id="first-name" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Site
                                    Açıklaması
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input name="ayar_description" value="<?php echo $ayarcek['ayar_description']?>"
                                        type="text" id="first-name" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Discord Adresi
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input name="ayar_discord" value="<?php echo $ayarcek['ayar_discord']?>" type="text"
                                        id="first-name" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Anahtar
                                    Kelimeler
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input name="ayar_keywords" value="<?php echo $ayarcek['ayar_keywords']?>"
                                        type="text" id="first-name" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Site ismi
                                    (Header)
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input name="ayar_isim" value="<?php echo $ayarcek['ayar_isim']?>" type="text"
                                        id="first-name" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Site Url
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input name="ayar_url" value="<?php echo $ayarcek['ayar_url']?>" type="text"
                                        id="first-name" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div align="center" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" name="genelayarkaydet" class="btn btn-success">Kaydet</button>
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