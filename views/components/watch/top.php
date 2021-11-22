<div class="row">
  <div class="col-6 text-success" style="display: flex; align-items: center; justify-content: flex-start;">
    <i class="fas fa-thumbs-up"></i>
    <div style="padding-left: 10; text-align: center; font-size:small;">
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
          echo $start + 1 . "-" . $end . " của " . count($data['products']);
          ?> kết quả.</b>
    </div>
  </div>
  <div class="col-6 text-success" style="display: flex; align-items: center; justify-content: flex-end;">
    <i class="fas fa-check"></i>
    <div style="padding-left: 10; text-align: center; font-size:small;">
      Được đánh giá bởi hơn <b>600,000 người dùng.</b>
    </div>
  </div>
</div>