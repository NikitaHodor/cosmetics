<? include_once('./views/templates/header.php'); ?>

        <div class="container jumbo-container">
            <div class="jumbotron jumbo-banner fluid">
                <div class="container jumbo-text">
                    <h1>Баннер - заглушка</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta repellat officiis, ea esse sunt odit cupiditate ipsum ad, nostrum animi aperiam reprehenderit! Esse quis saepe cum eum quam dicta. Error.</p>
                </div>
            </div>
        </div>


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

<? include_once('./views/templates/footer.php'); ?>
