<?php
include 'admin/veritabani/baglan.php';
$footersor=$db->prepare("select * from footer where footer_id=?");
$footersor->execute(array(0));

$footercek=$footersor->fetch(PDO::FETCH_ASSOC);

?>
<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="footer-top">

        <div class="container">

            <div class="row  justify-content-center">
                <div class="col-lg-6">
                    <img style="margin: 3%;width: 30%;" src="<?php echo $footercek['footer_resim']?>">
                    <h3><?php echo $footercek['footer_baslik']?></h3>
                    <p><?php echo $footercek['footer_aciklama']?></p>
                </div>

            </div>
        </div>
    </div>

    <div class="container footer-bottom clearfix">
        <div class="copyright">
            &copy; Copyright <strong><span>2021</span></strong>. Bütün hakları saklıdır.
        </div>
        <div class="credits">
            Designed by <b>pluginmerkezi.com</b>
        </div>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="assets/vendor/counterup/counterup.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/venobox/venobox.min.js"></script>
<script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="assets/js/main.js"></script>
</body>

</html>