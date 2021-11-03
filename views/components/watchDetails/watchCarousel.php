<div id="watchIntro" class="carousel slide carousel-dark" data-mdb-ride="carousel">
  <div class="carousel-indicators">
    <?php for ($i = 0; $i < count($product['imageURLs']); $i++) { ?>
      <button type="button" data-mdb-target="#watchIntro" data-mdb-slide-to="<?= $i ?>" aria-label="Slide <?= $i + 1  ?>" <?= $i == 0 ? 'class="active" aria-current="true" ' : '' ?>></button>
    <?php } ?>
  </div>
  <div class="carousel-inner">
    <?php for ($i = 0; $i < count($product['imageURLs']); $i++) {
      $imageURL = $product['imageURLs'][$i]; ?>
      <div class="carousel-item <?= $i == 0 ? 'active' : '' ?>">
        <div class="item-banner-intro" style="width: 100%; aspect-ratio: 8/6">
          <img src=<?= $imageURL ?> class="d-block w-100" alt="watch-image" style="width: 100%; height: 100%; object-fit:contain" />
        </div>
      </div>
    <?php } ?>
  </div>
  <button class="carousel-control-prev" type="button" data-mdb-target="#watchIntro" data-mdb-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-mdb-target="#watchIntro" data-mdb-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>