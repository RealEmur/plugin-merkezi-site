<?php 
include 'header.php';
yetkikontrol($_SESSION['pmadmin_kullaniciadi'], "yetki_eklenti");

$eklentiid=$_GET['eklentiid'];
$eklentisor=$db->prepare("SELECT * FROM eklentiler WHERE eklenti_id = $eklentiid");
$eklentisor->execute(array(0));

$eklenticek=$eklentisor->fetch(PDO::FETCH_ASSOC);
?>

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Eklenti Düzenle</h3>
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
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Eklenti İsmi
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input name="eklenti_isim" type="text"
                                        value="<?php echo $eklenticek['eklenti_isim'];?>" id="first-name"
                                        class="required form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim Linki
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input name="eklenti_resim" type="text"
                                        value="<?php echo $eklenticek['eklenti_resim'];?>" id="first-name"
                                        class="required form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Eklenti
                                    Açıklaması
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea name="eklenti_aciklama"
                                        class="resizable_textarea form-control"><?php echo $eklenticek['eklenti_aciklama'];?></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Eklenti Fiyatı
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input name="eklenti_fiyat" type="text"
                                        value="<?php echo $eklenticek['eklenti_fiyat'];?>" id="first-name"
                                        class="required form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Eklenti Sırası
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input name="eklenti_sira" type="text"
                                        value="<?php echo $eklenticek['eklenti_sira'];?>" id="first-name"
                                        class="required form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Eklenti Durumu
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="eklenti_durum" value="<?php echo $eklenticek['eklenti_durum'];?>"
                                        id="heard" class="form-control" required>
                                        <option value="1">Aktif</option>
                                        <option value="0">Pasif</option>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="eklentiid" value="<?php echo $eklentiid;?>">
                            <div align="center" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" name="eklentiduzenle" class="btn btn-success">Eklentiyi
                                    Düzenle</button>
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