<div id="bannerIntro" class="carousel slide" data-mdb-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-mdb-target="#bannerIntro" data-mdb-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-mdb-target="#bannerIntro" data-mdb-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-mdb-target="#bannerIntro" data-mdb-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <?php
    foreach ($product['imageURLs'] as $imageURL) { ?>
      <div class="carousel-item active">
        <div class="item-banner-intro">
          <img src=<?= $imageURL ?> class="d-block w-100" alt="watch-image" />
        </div>
      </div>
    <?php } ?>
  </div>
  <button class="carousel-control-prev" type="button" data-mdb-target="#bannerIntro" data-mdb-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-mdb-target="#bannerIntro" data-mdb-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>