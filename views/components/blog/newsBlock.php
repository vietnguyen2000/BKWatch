<div class="col-12 col-sm-12 col-md-6 col-xl-4 mb-2">
  <div>
    <!-- Featured image -->
    <div class="bg-image hover-overlay shadow-1-strong ripple rounded-5 mb-4" data-mdb-ripple-color="light" style="width:100%">
      <img src="<?php echo $blog_block_img ?>" class="img-fluid" style="width: 100%; aspect-ratio:16/9; object-fit: cover;" />
      <a href="<?php echo  $blog_url . "/" . $blog_block_id ?>">
        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
      </a>
    </div>
    <a href="<?php echo  $blog_url . "/" . $blog_block_id ?>" class="text-dark">
      <h5 style="min-height: 3rem;"><?php echo $blog_block_title ?></h5>
      <p>
        <small class="text-muted">Tác giả: <?php echo  $blog_block_author ?></small>
        <br />
        <small class="text-muted">Cập nhật: <?php echo  $blog_block_date ?></small>
      </p>
      <p style="min-height: 4.5rem;">
        <?php
        $__content = html_entity_decode(strip_tags($blog_block_content));
        if (strlen($__content) > 103) {
          echo mb_substr($__content, 0, 100, 'UTF-8') . "...";
        } else {
          echo $__content;
        }

        ?>
      </p>
    </a>
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
        <a style="cursor:pointer" class="like" blogId="<?= $blog_block_id ?>" onclick="like(this)">
          <i class="fas fa-heart" style="pointer-events:none"></i><br />
          <p style="pointer-events:none"><?php echo $blog_block_countLike ?></p>
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

<?php
require_once 'likeBlog.php';
?>