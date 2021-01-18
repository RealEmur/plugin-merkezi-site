<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet"  href="logincss.css">
</head>
<body>
  <div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Tabs Titles -->
      <h2 class="active">Plugin Merkezi Yönetim Paneli</h2>

      <!-- Icon -->
      <div class="fadeIn first">
      </div>

      <!-- Login Form -->
      <form action="veritabani/loginislem.php" method="POST">
        <?php
        if(isset($_GET['basarisiz']))
        {?>
          <p style="color: red;">Giriş başarısız</p>
        <?php } ?>
        <input type="text" name="kullaniciadi" id="login" class="fadeIn second" name="login" placeholder="Kullanıcı Adı">
        <input type="password" name="sifre" id="password" class="fadeIn third" name="login" placeholder="Şifre">
        <input type="submit" name="login" class="fadeIn fourth" value="Giriş Yap">
      </form>

      <!-- Remind Passowrd -->
      <div id="formFooter">
        <a class="underlineHover" href="#">Hesabın yok mu? Brute force deneyebilirsin.</a>
      </div>

    </div>
  </div>
</body>
</html>