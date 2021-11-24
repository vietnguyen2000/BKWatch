<div class="row">
  <div class="col-12 col-sm-6" style="display: flex; align-items: center; justify-content: center; border-right: 1px solid rgba(128, 128, 128, 0.25);">
    <i class="fas fa-check" style="color: #00C851;"></i>
    <div style="padding-left: 10; text-align: center; font-size:small;">
      Hơn <b><?php echo count($dataRateTotal[0]) - count($dataRateTotal[0]) % 10; ?>+ sản phẩm.</b>
    </div>
  </div>
  <div class="col-12 col-sm-6" style="display: flex; align-items: center; justify-content: center;">
    <i class="fas fa-star" style="color: #ffbb33;"></i>
    <div style="padding-left: 10; text-align: center; font-size:small;">
      Được đánh giá bởi hơn <b><?php echo count($dataRateTotal[1]) - count($dataRateTotal[1]) % 10; ?>+ người dùng.</b>
    </div>
  </div>
</div>