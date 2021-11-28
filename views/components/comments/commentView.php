<div>
  <div class="row">
    <div class="col-auto pe-0">
      <img src="<?= $comment['userAvatarURL'] ?>" alt="User photo" style="object-fit:cover; width: 62px; height: 62px; border-radius: 50%;">
    </div>

    <div class="col">
      <div class="d-sm-flex justify-content-between">
        <p class="m-0">
          <strong><?= $comment['userName'] ?></strong>
        </p>
        <ul class="rating m-0" data-mdb-toggle="rating">
          <?php
          $__rate = min(max(round((int)$comment['rate']), 0), 5);
          for ($i = 0; $i < $__rate; $i++) {
          ?>
            <li>
              <i class="fas fa-star fa-sm text-primary"></i>
            </li>
          <?php }
          for ($i = 5; $i > $__rate; $i--) {
          ?>
            <li>
              <i class="far fa-star fa-sm text-primary"></i>
            </li>
          <?php } ?>
        </ul>
      </div>
      <span class="small text-muted mb-2 momentFromNow"><?= $comment['date'] ?></span>
      <p class="mb-0"><?= $comment['content'] ?></p>
    </div>
  </div>
  <hr>
</div>