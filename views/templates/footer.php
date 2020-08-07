<nav class="navbar fixed-bottom navbar-expand-sm navbar-dark bg-dark">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
                <li class="nav-item <?= ($title == 'О нас') ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= SITE_ROOT . '' ?>">О нас</a>
                </li>
                <li class="nav-item <?= ($title == 'Контакты') ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= SITE_ROOT . '' ?>">Контакты</a>
                </li>
                 <li class="nav-item <?= ($title == 'Каталог') ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= SITE_ROOT . 'categories/list' ?>">Каталог</a>
                </li>
		        <li class="nav-item <?= ($title == 'FAQs') ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= SITE_ROOT . '' ?>">FAQs</a>
                </li>
			  
		  </div>
		</nav>
        <script src="<?= LIBS; ?>jquery/jquery.js"> </script>
		<script src="<?= LIBS; ?>bootstrap/js/bootstrap.js"> </script>
		<script src="<?= JS; ?>cookie.js"> </script>
		<script src="<?= JS; ?>index.js"> </script>
	</body>
</html>