<div class="row">
  <div class="col-6" style="display: flex; align-items: center; justify-content: flex-start;">
    <i class="fas fa-poll" style="color: #33b5e5"></i>
    <div style="text-align: center; font-size:small;">
      <b><?php
          $page = $data['page'];
          $len = $data['length'];
          $start = $len * $page - $len;
          $end = $len * $page;
          if ($end > count($data['products'])) {
            $end = count($data['products']);
          }
          $count = 0;
          $reverseData = array_reverse($data['products']);
          echo "&nbsp" . $start + 1 . "</b>-<b>" . $end . "</b> của <b>" . count($data['products']);
          echo '</b> kết quả.';
          ?>
    </div>
  </div>
  <div class="col-6" style="display: flex; align-items: center; justify-content: flex-end;">
    <div style="display: flex; align-items: center;">
      <div style="padding: 0 10; height: auto;">
        <div>
          Sắp xếp
        </div>
      </div>
      <div class="dropdown" style="width: auto;">
        <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-mdb-toggle="dropdown" aria-expanded="false">
          <?php
          if (isset($_GET)) {
            if (isset($_GET['sort'])) {
              if ((int)$_GET['sort'] == 1) {
                echo 'Giá giảm dần';
              }
              if ((int)$_GET['sort'] == 2) {
                echo 'Giá tăng dần';
              }
              if ((int)$_GET['sort'] == 3) {
                echo 'Tên (A-Z)';
              }
              if ((int)$_GET['sort'] == 4) {
                echo 'Tên (Z-A)';
              }
            } else {
              echo 'Không sắp xếp';
            }
          } else {
            echo 'Không sắp xếp';
          }
          ?>
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <?php
          $watchPageURL = '/watch?';
          foreach ($data['searchCondition'] as $key => $value) {
            if ($key == "sort") continue;
            $watchPageURL .= $key . "=" . $value . "&";
          }
          $sortClear = substr($watchPageURL, 0, -1);
          $sortIncrease = $watchPageURL . "sort=1";
          $sortDecrease = $watchPageURL . "sort=2";
          $sortNameAZ = $watchPageURL . "sort=3";
          $sortNameZA = $watchPageURL . "sort=4";
          ?>
          <li><a class="dropdown-item" href="<?php echo $sortClear; ?>">Không sắp xếp</a></li>
          <li><a class="dropdown-item" href="<?php echo $sortIncrease; ?>">Giá giảm dần</a></li>
          <li><a class="dropdown-item" href="<?php echo $sortDecrease; ?>">Giá tăng dần</a></li>
          <li><a class="dropdown-item" href="<?php echo $sortNameAZ; ?>">Tên (A-Z)</a></li>
          <li><a class="dropdown-item" href="<?php echo $sortNameZA; ?>">Tên (Z-A)</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-12" style="padding-top: 20px;">
    <div style="display: flex; flex-wrap: wrap;">
      <?php
      if (!empty($searchCondition)) {
        echo 'Tìm kiếm: ';
        foreach ($searchCondition as $value) {
          $explode_chiptag = explode("@", $value);
          array_shift($explode_chiptag);
          foreach ($explode_chiptag as $data_chiptag) {
            require 'chiptag.php';
          }
        }
      }
      ?>
    </div>
  </div>
</div>