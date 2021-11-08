<div class="col-12 col-sm-12 col-md-6 col-xl-4">
  <div>
    <!-- Featured image -->
    <div class="bg-image hover-overlay shadow-1-strong ripple rounded-5 mb-4" data-mdb-ripple-color="light">
      <img src=<?php echo $blog_block_img ?> class="img-fluid" />
      <a href=<?php echo  "/blog/" .  $blog_block_id ?>>
        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
      </a>
    </div>
    <!-- Article title and description -->
    <a href="" class="text-dark">
      <h5><?php echo $blog_block_title ?></h5>
      <p>
        <small class="text-muted">Tác giả: <?php echo  $blog_block_author ?></small>
        <br />
        <small class="text-muted">Cập nhật: <?php echo  $blog_block_date ?></small>
      </p>
      <p>
        <?php
        echo substr($blog_block_content, 0, 100) . "..."
        ?>
      </p>
    </a>
    <!-- Article data -->
    <div class="row mb-3">
      <div class="col-12 text-end">
        <a href="#">
          <i class="far fa-comment-dots"></i>
          <?php echo $blog_block_commentCount ?> Bình luận
        </a>
      </div>
      <hr />
    </div>
  </div>
</div>