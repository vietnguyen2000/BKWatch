<div id="bannerIntro" class="carousel slide" data-mdb-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-mdb-target="#bannerIntro" data-mdb-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-mdb-target="#bannerIntro" data-mdb-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-mdb-target="#bannerIntro" data-mdb-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <?php
      $img_banner = "https://images6.alphacoders.com/394/thumb-1920-394174.jpg";
      require 'itemBannerIntro.php';
      ?>
    </div>
    <div class="carousel-item">
      <?php
      $img_banner = "https://images4.alphacoders.com/561/561686.jpg";
      require 'itemBannerIntro.php';
      ?>
    </div>
    <div class="carousel-item">
      <?php
      $img_banner = "https://images5.alphacoders.com/831/831859.jpg";
      require 'itemBannerIntro.php';
      ?>
    </div>
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