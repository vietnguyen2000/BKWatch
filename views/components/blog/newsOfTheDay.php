<section class="border-bottom pb-4 mb-5">
  <div class="row gx-5">
    <div class="col-md-6 mb-4">
      <div class="bg-image hover-overlay ripple shadow-2-strong rounded-5" data-mdb-ripple-color="light" style="width: 100%">
        <img src=<?php echo $blog_block_img ?> class="img-fluid" style="width: 100%; aspect-ratio:16/9; object-fit: cover;" />
        <a href=<?php echo $blog_url . "/" . $blog_block_id ?>>
          <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
        </a>
      </div>
    </div>

    <div class="col-md-6 mb-4">
      <span class="badge bg-danger px-2 py-1 shadow-1-strong mb-3">Blog of the day</span>
      <h4><strong><?php echo $blog_block_title ?></strong></h4>
      <p class="text-muted">
        <?php
        echo mb_substr($blog_block_content, 0, 320) . "..."
        ?>
      </p>
      <a href="/blog/<?= $blog_block_id ?>" type="button" class="btn btn-primary">Đọc thêm</a>
    </div>
  </div>
</section>