<?php
session_start();
unset($_SESSION['pmadmin_kullaniciadi']);
unset($_SESSION['pmadmin_foto']);
Header("Location:../login.php");
?>