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
</div>