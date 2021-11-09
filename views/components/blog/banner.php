<!-- Carousel wrapper -->
<div id="bannerBlog" class="carousel slide carousel-fade" data-mdb-ride="carousel">
  <!-- Indicators -->
  <div class="carousel-indicators">
    <button type="button" data-mdb-target="#bannerBlog" data-mdb-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <?php
    for ($i = 1; $i < count($blog_img_banner); $i++) {
      echo '<button type="button" data-mdb-target="#bannerBlog" data-mdb-slide-to="' . $i . '" aria-label="Slide ' . ($i + 1) . '"></button>';
    }
    ?>
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
    <?php
    for ($i = 1; $i < count($blog_img_banner); $i++) {
      echo '<div class="carousel-item">';
      $blog_img_banner_item = $blog_img_banner[1];
      $blog_title_item = $blog_title;
      require 'bannerItem.php';
      echo '</div>';
    }
    ?>
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