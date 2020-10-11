<? include_once('./views/templates/header.php'); ?>

        <div id="carouselMainControls" class="carousel slide container" data-ride="carousel">
  <div class="carousel-inner bdr">
    <div class="carousel-item active">
      <img class="d-block w-100 item-image carousel_img" src="./assets/img/banner1.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
    <h5>Lorem</h5>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores maxime aut fugit, deserunt porro eius natus quaerat recusandae reprehenderit eaque accusantium dicta voluptas similique adipisci quos eligendi blanditiis dignissimos quo.</p>
  </div>
    </div>
    <div class="carousel-item">
     <img class="d-block w-100 item-image carousel_img" src="./assets/img/banner2.jpg" alt="Second slide">
      <div class="carousel-caption d-none d-md-block">
    <h5>Lorem</h5>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores maxime aut fugit, deserunt porro eius natus quaerat recusandae reprehenderit eaque accusantium dicta voluptas similique adipisci quos eligendi blanditiis dignissimos quo.</p>
  </div>

    </div>
    <div class="carousel-item">
      <img class="d-block w-100 item-image carousel_img" src="./assets/img/banner3.jpg" alt="Third slide">
      <div class="carousel-caption d-none d-md-block">
    <h5>Lorem</h5>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores maxime aut fugit, deserunt porro eius natus quaerat recusandae reprehenderit eaque accusantium dicta voluptas similique adipisci quos eligendi blanditiis dignissimos quo.</p>
  </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselMainControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselMainControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!--replace by OWL carousel-->
<!--
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
   <? foreach($rowArr as $cos): ?>
   <? if ($cos == $rowArr[0]): ?>
    <div class="carousel-item  active col-md-12">
    <? else: ?>
    <div class="carousel-item col-md-12">
    <? endif; ?>
    <div class="card-deck">
       <? foreach($cos as $cosmetic): ?>
        <div class="card main_card">
                    <img src="<?= $cosmetic['image_url'] ?>" class="card-img-top main_card_img" alt="card-img">
                    <div class="card-body">
                        <span class="card-text">
                            <a href="<?= SITE_ROOT . 'cosmetics/view/' . $cosmetic['cosmetic_id'] ?>">
                                <?= $cosmetic['cosmetic_name']; ?>
                            </a>
                        </span>
                    </div>
                </div>
                  <? endforeach; ?>
    </div>
    </div>
    <? endforeach; ?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
-->


<div class="container mt-4 main-cosmetic-container">

    <div id="Pag" class="row">
       <? foreach($cosmetics as $cosmetic): ?>
        <div class="col-md-4 mb-3 d-flex">
              <div class="card main_card flex-fill">
                    <img src="<?= $cosmetic['image_url'] ?>" class="card-img-top main_card_img" alt="card-img">
                    <div class="card-body">
                           <h6>
                              <a href="<?= SITE_ROOT . 'cosmetics/view/' . $cosmetic['cosmetic_id'] ?>">
                                <?= $cosmetic['cosmetic_name']; ?>
                            </a>
                           </h6>
                            <p class="card-price">Цена: <?= $cosmetic['cosmetic_price']; ?> &#8381;</p>
                    </div>
                </div>
        </div>
        <? endforeach; ?>
    </div>
    <nav aria-label="Page navigation">
  <ul class="pagination justify-content-center">
    <? for($page = 1; $page<= $number_of_page; $page++): ?>
    <li class="page-item">
    <a class="page-link" href="#" onclick="mainCosmeticGet(event, <?= $page ?>)">
    <?= $page ?>
    </a>
    </li>
    <? endfor; ?>
  </ul>
</nav>
</div>

<div class="cookie-banner col-md-3" style="display: none">
<p>
    Пользуясь нашим сайтом, вы принимаете
    <a href="cookie">политику использования cookie</a>
  </p>
<button class="close">&times;</button>
</div>

<? include_once('./views/templates/footer.php'); ?>
