<div>
  <!-- Tabs navs -->
  <ul class="nav nav-tabs nav-fill mb-3" id="ldp-home-tab" role="tablist">
    <li class="nav-item" role="presentation">
      <a class="nav-link active" id="ldp-home-tab-1" data-mdb-toggle="tab" href="#ldp-home-tabs-1" role="tab" aria-controls="ldp-home-tabs-1" aria-selected="true">Mô tả</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="ldp-home-tab-2" data-mdb-toggle="tab" href="#ldp-home-tabs-2" role="tab" aria-controls="ldp-home-tabs-2" aria-selected="false">Bình luận</a>
    </li>
  </ul>
  <!-- Tabs navs -->

  <!-- Tabs content -->
  <div class="tab-content" id="ldp-home-content">
    <div class="tab-pane fade show active" id="ldp-home-tabs-1" role="tabpanel" aria-labelledby="ldp-home-tab-1">
      <div class="row">
        <div class="col-lg-6">
          <div class="row">
            <h5>
              <?php if ($product['isNew']) { ?>
                <span class="badge bg-primary">NEW</span>
              <?php } ?>

              <?php if ($product['isHot']) { ?>
                <span class="badge bg-primary">HOT</span>
              <?php } ?>

              <?php if ($product['isBestSale']) { ?>
                <span class="badge bg-primary">BEST SALE</span>
              <?php } ?>
            </h5>
          </div>
          <h3><?= $product['title'] ?></h3>
          <h6><?php require 'watchRating.php' ?></h6>
          <?php if ($product['discount']) { ?>
            <span style="text-decoration: line-through;"><?= currency_format($product['price']) ?></span>
          <?php } ?>
          <h4><?= currency_format($product['price'] * (100 - $product['discount']) / 100) ?></h4>
          <p>
            <?= $product['content'] ?>
          </p>
        </div>
        <div class="col-lg-6 mt-4">
          <div class="row">
            <div class="col-5">
              Bảo hành
            </div>
            <div class="col-7 text-end">
              <?= $product['warranty'] ?> năm
            </div>
          </div>
          <hr class="my-2">

          <div class="row">
            <div class="col-5">
              Số lượng còn lại
            </div>
            <div class="col-7 text-end">
              <?= $product['quantity'] ?> chiếc
            </div>
          </div>
          <hr class="my-2">

          <div class="row">
            <div class="col-5">
              Chất liệu
            </div>
            <div class="col-7 text-end">
              <?= $product['material'] ?>
            </div>
          </div>
          <hr class="my-2">

          <div class="row">
            <div class="col-5">
              Kính
            </div>
            <div class="col-7 text-end">
              <?= $product['glass'] ?>
            </div>
          </div>
          <hr class="my-2">

          <div class="row">
            <div class="col-5">
              Mặt lưng
            </div>
            <div class="col-7 text-end">
              <?= $product['back'] ?>
            </div>
          </div>
          <hr class="my-2">

          <div class="row">
            <div class="col-5">
              Đường kính
            </div>
            <div class="col-7 text-end">
              <?= $product['diameter'] ?>
            </div>
          </div>
          <hr class="my-2">

          <div class="row">
            <div class="col-5">
              Độ dày
            </div>
            <div class="col-7 text-end">
              <?= $product['height'] ?>
            </div>
          </div>
          <hr class="my-2">

          <div class="row">
            <div class="col-5">
              Dây đeo
            </div>
            <div class="col-7 text-end">
              <?= $product['lugWidth'] ?>
            </div>
          </div>
          <hr class="my-2">

          <div class="row">
            <div class="col-5">
              Màu sắc
            </div>
            <div class="col-7 text-end">
              <?= $product['color'] ?>
            </div>
          </div>
          <hr class="my-2">
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="ldp-home-tabs-2" role="tabpanel" aria-labelledby="ldp-home-tab-2">
      <h5><span><?= count($product['comments']) ?></span> bình luận cho <span><?= $product['title'] ?></span></h5>
      <?php
      foreach ($product['comments'] as $c) {
        $comment = [
          "userName" => $c['fullname'],
          "userAvatarURL" => $c['avatarURL'],
          "rate" => $c['rating'],
          "date" => $c['updatedAt'],
          "content" => $c['content'],
        ];
        require realpath($_SERVER["DOCUMENT_ROOT"]) . '/views/components/comments/commentView.php';
      }; ?>

      <?php
      $addCommentAction = "/watch/" . $product['id'] . "/comment";
      require realpath($_SERVER["DOCUMENT_ROOT"]) . '/views/components/comments/addComment.php'
      ?>
    </div>
  </div>
  <!-- Tabs content -->
</div>