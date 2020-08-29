<!-- Footer -->
<footer id="Footer" class="footer font-small bg-dark text-white">
    <nav class="navbar navbar-expand-sm navbar-static-bottom navbar-dark bg-dark">
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item <?= ($title == 'О нас') ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= SITE_ROOT . 'about' ?>">О нас</a>
                </li>
                <li class="nav-item <?= ($title == 'Контакты') ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= SITE_ROOT . 'contact' ?>">Контакты</a>
            </ul>
        </div>
    </nav>
    <div class="copy text-center">Enso cosmetics&copy; <?php echo date("Y");?></div>
</footer>
<!-- Footer -->
<script src="<?= LIBS; ?>jquery/jquery.js"> </script>
<script src="<?= LIBS; ?>bootstrap/js/bootstrap.js"> </script>
<!--<script src="<?= JS; ?>footerFixer.js"></script>-->
<script src="<?= JS; ?>cookie.js"> </script>
<script src="<?= JS; ?>index.js"> </script>
</body>

</html>
