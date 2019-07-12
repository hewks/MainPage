        <?php if (!isset($deactivate)) : ?>
            <!-- Main footer -->
            <div class="main-footer-wrap" id="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-3">
                            <span class="footer-title">Servicios</span>
                            <ul>
                                <li><a href="<?= base_url() ?>DesarrolloWeb">Desarrollo Web</a></li>
                                <li><a href="<?= base_url() ?>ProduccionAudiovisual">Producci&oacute;n Audiovisual</a></li>
                                <li><a href="<?= base_url() ?>MarketingDigital">Marketing Digital</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <span class="footer-title">Contacto</span>
                            <ul>
                                <li>
                                    <a target="_blank" href="tel:+573124148698">(+57) 3124148698</a>
                                </li>
                                <li>
                                    Bogot&aacute;, Colombia
                                </li>
                                <li>
                                    <a target="_blank" href="mailto:support@hewks.net">admin@hewks.net</a><br>
                                    <a target="_blank" href="mailto:hewksorgnetad@gmail.com">hewksorgnetad@gmail.com</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-3"></div>

                    </div>
                </div>
            </div>
            <!-- Main footer -->
        <?php endif; ?>

        </div>
        <!-- /Full page wrapper -->

        <!-- Scripts -->
        <script>
            var base_url = "<?= base_url() ?>"
        </script>
        <script src="<?= base_url() ?>assets/vendor/jquery/jquery-3.4.0.min.js"></script>
        <script src="<?= base_url() ?>assets/vendor/popper.min.js"></script>
        <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?= base_url() ?>assets/vendor/fontawesome/js/all.min.js"></script>
        <script src="<?= base_url() ?>assets/vendor/pnotify/js/PNotify.js"></script>
        <script src="<?= base_url() ?>assets/vendor/pnotify/js/PNotifyMobile.js"></script>
        <script src="<?= base_url() ?>assets/vendor/lazyload/dist/lazyload.min.js"></script>
        <script src="<?= base_url() ?>assets/js/main.js"></script>

        <?= $scripts ?>

        <script>
            var lazyLoadInstance = new LazyLoad({
                elements_selector: ".lazy"
            });
        </script>


        </body>

        </html>