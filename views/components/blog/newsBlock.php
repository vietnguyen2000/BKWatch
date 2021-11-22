<div class="col-12 col-sm-12 col-md-6 col-xl-4">
  <div>
    <!-- Featured image -->
    <div class="bg-image hover-overlay shadow-1-strong ripple rounded-5 mb-4" data-mdb-ripple-color="light">
      <img src=<?php echo $blog_block_img ?> class="img-fluid" style="width: 100%; height: 26.5vh; object-fit: cover;" />
      <a href=<?php echo  $blog_url . "/" . $blog_block_id ?>>
        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
      </a>
    </div>
    <!-- Article title and description -->
    <a href=<?php echo  $blog_url . "/" . $blog_block_id ?> class="text-dark">
      <h5><?php echo $blog_block_title ?></h5>
      <p>
        <small class="text-muted">Tác giả: <?php echo  $blog_block_author ?></small>
        <br />
        <small class="text-muted">Cập nhật: <?php echo  $blog_block_date ?></small>
      </p>
      <p>
        <?php
        echo mb_substr($blog_block_content, 0, 100, 'UTF-8') . "...";
        ?>
      </p>
    </a>
    <!-- Article data -->
    <div class="row md-3 d-flex justify-content-center">
      <?php
      if ($blog_block_isHot == 1) {
        echo '<div class="col-3 text-center">
                <a href=' . $blog_url . "/" . $blog_block_id . '>
                  <i class="fab fa-hotjar"></i>
                  <p>Hot</p>
                </a>
              </div>';
      }
      ?>
      <div class="col-3 text-center">
        <a href=<?php echo  $blog_url . "/" . $blog_block_id . "/like" ?>>
          <i class="fas fa-heart"></i><br />
          <p><?php echo $blog_block_countLike ?></p>
        </a>
      </div>
      <div class="col-3 text-center">
        <a href=<?php echo  $blog_url . "/" . $blog_block_id ?>>
          <i class="fas fa-eye"></i><br />
          <p><?php echo $blog_block_countView ?></p>
        </a>
      </div>
      <div class="col-3 text-center">
        <a href=<?php echo  $blog_url . "/" . $blog_block_id ?>>
          <i class="fas fa-comment-dots"></i><br />
          <p><?php echo $blog_block_commentCount ?></p>
        </a>
      </div>
      <hr />
    </div>
  </div>
</div>