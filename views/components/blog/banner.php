<!-- Carousel wrapper -->
<div id="bannerBlog" class="carousel slide carousel-fade" data-mdb-ride="carousel">
  <!-- Indicators -->
  <div class="carousel-indicators">
    <button type="button" data-mdb-target="#bannerBlog" data-mdb-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-mdb-target="#bannerBlog" data-mdb-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-mdb-target="#bannerBlog" data-mdb-slide-to="2" aria-label="Slide 3"></button>
  </div>

  <!-- Inner -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <?php
      $blog_img_banner_item = $blog_img_banner[0];
      $blog_title_item = $blog_title;
      require 'bannerItem.php';
      ?>
    </div>
    <div class="carousel-item">
      <?php
      $blog_img_banner_item = $blog_img_banner[1];
      $blog_title_item = $blog_title;
      require 'bannerItem.php';
      ?>
    </div>
    <div class="carousel-item">
      <?php
      $blog_img_banner_item = $blog_img_banner[2];
      $blog_title_item = $blog_title;
      require 'bannerItem.php';
      ?>
    </div>
  </div>

  <!-- Controls -->
  <button class="carousel-control-prev" type="button" data-mdb-target="#bannerBlog" data-mdb-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-mdb-target="#bannerBlog" data-mdb-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!-- Carousel wrapper -->