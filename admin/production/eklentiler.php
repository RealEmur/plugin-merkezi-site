<?php 
include 'header.php';

yetkikontrol($_SESSION['pmadmin_kullaniciadi'], "yetki_eklenti");
?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Eklentiler</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Aranan kelime">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Bul!</button>
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
                        <h2>Eklentiler <small>
                                <?php if(isset($_GET['durum']))
              { 
                if($_GET['durum'] == 'basarili') 
                  {?>
                                <b style="color: green;">İşlem başarılı</b>
                                <?php } else 
                  {?>
                                <b style="color: red;">İşlem başarısız</b>
                                <?php }
                }?></small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div align="right" class="col md-12">
                        <a href="eklenti-ekle"><button style="margin-right: 2%;" class="btn btn-primary btn-xs"><i
                                    class="success fa fa-plus"> Yeni eklenti ekle</i></button></a>
                    </div>
                    <div class="x_content">
                        <div class="table-responsive">
                            <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                    <tr class="headings">
                                        <th style="text-align: center;" class="column-title">Eklenti Resmi</th>
                                        <th style="text-align: center;" class="column-title">İsim</th>
                                        <th style="text-align: center;" class="column-title">Açıklama</th>
                                        <th style="text-align: center;" class="column-title">Fiyat</th>
                                        <th style="text-align: center; width: 100px;" class="column-title">Tarih</th>
                                        <th style="text-align: center;" class="column-title">Durum</th>
                                        <th style="text-align: center;" class="column-title">Üstünlük</th>
                                        <th style="text-align: center;" class="column-title"></th>
                                        <th style="text-align: center;" class="column-title"></th>
                                        <th style="text-align: center;" class="column-title"></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                      $eklentisor=$db->prepare("SELECT * from eklentiler ORDER BY eklenti_sira DESC");
                      $eklentisor->execute();
                      while($eklenticek=$eklentisor->fetch(PDO::FETCH_ASSOC))
                        {?>
                                    <tr class="even pointer">
                                        <td><img style="width: 150px;" src="<?php echo $eklenticek['eklenti_resim']?>">
                                        </td>
                                        <td style="text-align: center;"><?php echo $eklenticek['eklenti_isim']?></td>
                                        <td style="text-align: center;" class="">
                                            <?php echo $eklenticek['eklenti_aciklama']?></td>
                                        <td style="text-align: center;" class="">
                                            <?php echo $eklenticek['eklenti_fiyat']?></td>
                                        <td style="text-align: center;" class="">
                                            <?php echo $eklenticek['eklenti_tarih']?></td>
                                        <td style="text-align: center;" class="">
                                            <?php if($eklenticek['eklenti_durum'] == '1')  echo "Aktif"; else echo "Pasif";?>
                                        </td>
                                        <td style="text-align: center; " class="a-right a-right ">
                                            <?php echo $eklenticek['eklenti_sira']?></td>
                                        <td class=" "><a
                                                href="eklenti-duzenle?eklentiid=<?php echo $eklenticek['eklenti_id'];?>"><button
                                                    style="width: 70px; " class="btn btn-primary btn-xs"><i
                                                        class="success fa fa-edit"> Düzenle</i></button></td></a>

                                        <form action="../veritabani/islem.php" method="POST" id="demo-form2"
                                            data-parsley-validate class="form-horizontal form-label-left">
                                            <input type="hidden" name="eklentiid"
                                                value="<?php echo $eklenticek['eklenti_id']?>">
                                            <td class=" "><button name="eklentisil" style="width: 70px; "
                                                    class="btn btn-danger btn-xs"><i class="success fa fa-trash">
                                                        Sil</i></button></td>
                                            <td class=" "><button name="eklentigonder" style="width: 70px; "
                                                    class="btn btn-success btn-xs"><i class="fa fa-share">
                                                        Gönder</i></button></td>
                                        </form>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
<?php include 'footer.php';?>