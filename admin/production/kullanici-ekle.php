<?php 
include 'header.php';
yetkikontrol($_SESSION['pmadmin_kullaniciadi'], "yetki_kullanici");
?>

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Yönetici Ekle</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <br />

                        <form action="../veritabani/islem.php" method="POST" id="demo-form2" data-parsley-validate
                            class="form-horizontal form-label-left">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanıcı Adı
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input name="admin_kullanici" type="text" placeholder="Kullanıcı adını giriniz"
                                        class="required form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Şifre
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input name="admin_sifre" type="text" placeholder="Şifreyi giriniz" id="first-name"
                                        class="required form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input name="admin_resim" type="text"
                                        placeholder="Profil fotoğrafının linkini giriniz" id="first-name"
                                        class="required form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Admin
                                    Dokunulmazlık
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input name="admin_doku" type="text"
                                        placeholder="Admin Dokunulmazlık Seviyesini Giriniz" id="first-name"
                                        class="required form-control col-md-7 col-xs-12">
                                    <input type="hidden" name="yetki_kullanan"
                                        value="<?php echo $_SESSION['pmadmin_kullaniciadi'];?>">
                                </div>
                            </div>
                            <div style="margin-left: 22%;margin-top: 3%;">

                                <!---- Checkboxda seçilmezse veri geçiremiyorsun o yüzden seçilmediği takdirde 0 geçiriyorum -->
                                <input type="hidden" name="yetki_eklenti" value="0" />
                                <input type="hidden" name="yetki_kullanici" value="0" />
                                <input type="hidden" name="yetki_yorum" value="0" />
                                <input type="hidden" name="yetki_genel" value="0" />
                                <input type="hidden" name="yetki_footer" value="0" />

                                <?php if(yetkikontrol2($_SESSION['pmadmin_kullaniciadi'], "yetki_eklenti")){ ?>
                                <label style="margin-left: 5%; margin-bottom: 5%;">
                                    <input type="checkbox" name="yetki_eklenti" value="1" class="js-switch" />
                                    Eklentiler
                                </label>
                                <?php }if(yetkikontrol2($_SESSION['pmadmin_kullaniciadi'], "yetki_kullanici")){ ?>
                                <label style="margin-left: 5%; margin-bottom: 5%;">
                                    <input type="checkbox" name="yetki_kullanici" value="1" class="js-switch" />
                                    Kullanıcılar
                                </label>
                                <?php }if(yetkikontrol2($_SESSION['pmadmin_kullaniciadi'], "yetki_yorum")){ ?>
                                <label style="margin-left: 5%; margin-bottom: 5%;">
                                    <input type="checkbox" name="yetki_yorum" value="1" class="js-switch" /> Yorumlar
                                </label>
                                <?php }if(yetkikontrol2($_SESSION['pmadmin_kullaniciadi'], "yetki_genel")){ ?>
                                <label style="margin-left: 5%; margin-bottom: 5%;">
                                    <input type="checkbox" name="yetki_genel" value="1" class="js-switch" /> Genel
                                    Ayarlar
                                </label>
                                <?php }if(yetkikontrol2($_SESSION['pmadmin_kullaniciadi'], "yetki_footer")){ ?>
                                <label style="margin-left: 5%; margin-bottom: 5%;">
                                    <input type="checkbox" name="yetki_footer" value="1" class="js-switch" /> Footer
                                </label>
                                <?php } ?>
                            </div>

                            <div align="center" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" name="yenikullaniciekle" class="btn btn-success">Kullanıcı
                                    Ekle</button>
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