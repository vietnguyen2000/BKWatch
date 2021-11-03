<div>
  <div class="row">
    <img class="col-auto" src="https://mdbootstrap.com/img/Photos/Others/placeholder1.jpg" width="62" height="62" alt="User photo">
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
      <span class="small text-muted mb-2"><?php echo $comment['date']->format('d-m-Y \tạ\i H:i:s') ?></span>
      <p class="mb-0"><?= $comment['content'] ?></p>
    </div>
  </div>
  <hr>
</div>