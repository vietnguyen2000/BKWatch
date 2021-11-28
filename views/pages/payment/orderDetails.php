<?php
if (!function_exists('currency_format')) {
  function currency_format($number, $suffix = 'đ')
  {
    if (!empty($number)) {
      return number_format($number, 0, ',', '.') . "{$suffix}";
    }
  }
}

function mapStatus($status)
{
  switch ($status) {
    case 0:
      return '<button class="btn btn-primary">Thanh toán ngay</button>';
    case 1:
      return 'Đã thanh toán';
    case 2:
      return 'Đang giao hàng';
    case 3:
      return 'Hoàn thành';
    default:
      return 'Đơn hàng lỗi';
  }
}
?>
<div class="container-fluid my-3" style="max-width: 960px;">
  <div class="row d-flex justify-content-center align-items-center">
    <div>
      <div class="card" style="border-radius: 10px;">
        <div class="card-header px-4 py-5">
          <h5 class="text-muted mb-0">Cám ơn bạn vì đơn hàng, <span class="text-primary"><?= $_SESSION['user']['fullname'] ?></span>!</h5>
        </div>
        <div class="card-body p-4">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <p class="lead fw-normal mb-0 text-primary">Mã đơn <?= $order['id'] ?></p>
            <p class="lead fw-normal mb-0 text-primary"><?= mapStatus($order['status']) ?></p>
          </div>
          <div class="card shadow-0 border mb-4">
            <?php foreach ($order['listItems'] as $item) { ?>
              <div class="row g-0 my-2" id='cart-item-<?= $item['productId'] ?>'>
                <div class="col-4 hover-overlay ripple ripple-surface ripple-surface-light" style="aspect-ratio: 8/6">
                  <a href="watch/<?= $item['productId'] ?>">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                  </a>
                  <img src="<?= $item['imagePreview'] ?>" alt="<?= $item['productTitle'] ?>" class="img-fluid" style="width: 100%; height: 100%; object-fit:contain" />
                </div>
                <div class="col-8 d-flex justify-content-between flex-column px-2" style="aspect-ratio: 8/3">
                  <div>
                    <div class="row justify-content-between">
                      <div class="col-12 col-sm">
                        <h5 class="card-title"><?= $item['productTitle'] ?></h5>
                      </div>
                      <div class="col-auto right-body">
                        <span>Số lượng: <?= $item['quantity'] ?></span>
                      </div>
                    </div>
                    <small class="card-text m-0">
                      SKU: <?= $item['productCode'] ?>
                    </small>
                    <br>
                    <small class="card-text">
                      Màu sắc: <?= $item['productColor'] ?>
                    </small>
                  </div>

                  <div class="d-flex justify-content-between align-items-end">
                    <div>
                    </div>
                    <div class="col-auto">
                      <input hidden type="number" id='cart-item-default-price-<?= $item['id'] ?>' value="<?= $item['price'] ?>">
                      <input hidden type="number" id='cart-item-default-discount-<?= $item['id'] ?>' value="<?= $item['price'] * $item['discount'] / 100 ?>">
                      <?php if ($item['discount'] > 0) { ?>
                        <p class="mb-0 text-decoration-line-through fw-light fs-6 text-end"><span id='cart-item-before-discount-<?= $item['id'] ?>'><?= currency_format($item['price'] * $item['quantity']) ?></span></p>
                      <?php } ?>

                      <p class="mb-0 text-primary"><span><strong id='cart-item-price-<?= $item['id'] ?>'><?= currency_format($item['price'] * $item['quantity'] * (100 - $item['discount']) / 100) ?></strong></span></p>
                    </div>

                  </div>
                </div>
              </div>
              <?php if ($item != end($order['listItems'])) { ?>
                <hr>
            <?php }
            } ?>
          </div>

          <div class="row justify-content-between pt-2">
            <div class="col-12 col-sm mb-3">
              <p class="fw-bold mb-0">Chi tiết đơn hàng</p>
              <p class="text-muted mb-0">Ngày khởi tạo: <?= $order['createdAt'] ?></p>
              <p class="text-muted mb-0">Ngày thanh toán: <?= $order['payDate'] != null ? $order['payDate'] : 'chưa thanh toán' ?></p>
            </div>

            <div class="col-12 col-sm-auto">
              <div class="row justify-content-between">
                <span class="fw-bold col-auto">Tổng tiền</span>
                <span class="col-auto"><?= currency_format(array_reduce($order['listItems'], fn ($c, $i) => intval($c) + intval($i['price']) * $i['quantity'], 0)) ?></span>
              </div>
              <div class="row justify-content-between">
                <span class="fw-bold col-auto">Giảm giá</span>
                <span class="col-auto"><?= currency_format(array_reduce($order['listItems'], fn ($c, $i) => intval($c) + intval($i['price']) * $i['quantity'] * $i['discount'] / 100, 0)) ?></span>
              </div>
              <div class="row justify-content-between">
                <span class="fw-bold col-auto">Phí ship</span>
                <span class="col-auto">Miễn phí</span>
              </div>
            </div>

          </div>

          <div class="my-3">
            <div class="progress" style="height: 6px; border-radius: 16px;">
              <div class="progress-bar" role="progressbar" style="width: <?= ($order['status']) * 100 / 3 ?>%; border-radius: 16px; background-color: #c89979;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="d-flex justify-content-between mb-1">
              <p class="text-muted mt-1 mb-0 small">Khởi tạo</p>
              <p class="text-muted mt-1 mb-0 small">Đã thanh toán</p>
              <p class="text-muted mt-1 mb-0 small">Đang giao hàng</p>
              <p class="text-muted mt-1 mb-0 small">Hoàn thành</p>
            </div>
          </div>

        </div>
        <div class="card-footer border-0 px-4 py-5" style="background-color: #c89979; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
          <h5 class="d-flex align-items-center justify-content-end text-white text-uppercase mb-0">
            Tổng thanh toán:
            <?= currency_format($order['total']) ?>
          </h5>
        </div>
      </div>
    </div>
  </div>
</div>