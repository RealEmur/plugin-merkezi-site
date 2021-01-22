<?php 
include 'header.php';
yetkikontrol($_SESSION['pmadmin_kullaniciadi'], "yetki_yorum");
?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Yorum İşlemleri</h3>
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
                        <h2>Yorumlar <small>
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
                        <a href="yorum-ekle"><button style="margin-right: 2%;" class="btn btn-primary btn-xs"><i
                                    class="success fa fa-plus"> Yeni yorum ekle</i></button></a>
                    </div>
                    <div class="x_content">
                        <div class="table-responsive">
                            <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                    <tr class="headings">
                                        <th style="text-align: left;" class="column-title">Resim</th>
                                        <th style="text-align: center;" class="column-title">Yorum</th>
                                        <th style="text-align: center;" class="column-title">Yazan</th>
                                        <th style="text-align: center;" class="column-title">Sunucu</th>
                                        <th style="text-align: center;" class="column-title">Durum</th>
                                        <th style="text-align: center;" class="column-title">Üstünlük</th>
                                        <th class="column-title"></th>
                                        <th class="column-title"></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                  $yorumsor=$db->prepare("SELECT * FROM yorumlar ORDER BY yorum_sira DESC LIMIT 25");
                  $yorumsor->execute();
                  while($yorumcek=$yorumsor->fetch(PDO::FETCH_ASSOC))
                    {?>
                                    <tr class="even pointer">
                                        <td><img style="width: 150px;" src="
                      <?php 
                      if(empty($yorumcek['yorum_resim']))
                      {
                        if(is_numeric($yorumcek['yorum_steamdec']))
                          $link = sprintf("http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=CB8E7C461AFBD3946BFEA9FC8D228D82&steamids=%s", $yorumcek['yorum_steamdec']);
                        else
                        {
                          $link = sprintf("http://api.steampowered.com/ISteamUser/ResolveVanityURL/v0001/?key=CB8E7C461AFBD3946BFEA9FC8D228D82&vanityurl=%s", $yorumcek['yorum_steamdec']);
                          $link = file_get_contents($link);
                          $link = json_decode($link, true);
                          $link = sprintf("http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=CB8E7C461AFBD3946BFEA9FC8D228D82&steamids=%s", $link['response']['steamid']);
                        }
                        $steam = file_get_contents($link);
                        $steamJson = json_decode($steam, true);
                        foreach ($steamJson['response']['players'] as $deger) {
                          echo $deger['avatarfull'];
                        }
                      }
                      else
                        echo $yorumcek['yorum_resim'];
                      ?>"></td>
                                        <td style="text-align: center; width: 300px;">
                                            <?php echo $yorumcek['yorum_aciklama'];?></td>
                                        <td style="text-align: center;" class="">
                                            <?php 
                      if(empty($yorumcek['yorum_yazici']))
                      {
                        if(is_numeric($yorumcek['yorum_steamdec']))
                          $link = sprintf("http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=CB8E7C461AFBD3946BFEA9FC8D228D82&steamids=%s", $yorumcek['yorum_steamdec']);
                        else
                        {
                          $link = sprintf("http://api.steampowered.com/ISteamUser/ResolveVanityURL/v0001/?key=CB8E7C461AFBD3946BFEA9FC8D228D82&vanityurl=%s", $yorumcek['yorum_steamdec']);
                          $link = file_get_contents($link);
                          $link = json_decode($link, true);
                          $link = sprintf("http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=CB8E7C461AFBD3946BFEA9FC8D228D82&steamids=%s", $link['response']['steamid']);
                        }
                        $steam = file_get_contents($link);
                        $steamJson = json_decode($steam, true);
                        foreach ($steamJson['response']['players'] as $deger) {
                          echo $deger['personaname'];
                        }
                      }
                      else
                        echo $yorumcek['yorum_yazici'];
                      ?>
                                        </td>
                                        <td style="text-align: center;" class=""><?php echo $yorumcek['yorum_rol'];?>
                                        </td>
                                        <td style="text-align: center;" class="">
                                            <?php if($yorumcek['yorum_durum'] == 1) echo "Aktif"; else echo "Pasif"?>
                                        </td>
                                        <td style="text-align: center;" class="a-right a-right ">
                                            <?php echo $yorumcek['yorum_sira']?></td>
                                        <td style="text-align: center;" class=" "><a
                                                href="yorum-duzenle.php?yorumid=<?php echo $yorumcek['yorum_id']?>"><button
                                                    style="width: 70px; " class="btn btn-primary btn-xs"><i
                                                        class="success fa fa-edit"> Düzenle</i></button></td></a>

                                        <form action="../veritabani/islem.php" method="POST" id="demo-form2"
                                            data-parsley-validate class="form-horizontal form-label-left">
                                            <input type="hidden" name="yorumid"
                                                value="<?php echo $yorumcek['yorum_id']?>">
                                            <td class=" "><button name="yorumsil" style="width: 70px; "
                                                    class="btn btn-danger btn-xs"><i class="success fa fa-trash">
                                                        Sil</i></button></td>
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