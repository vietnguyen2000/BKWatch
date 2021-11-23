<div class="card mb-3">
  <div class="card-body">

    <h5 class="mb-3">Tổng số tiền giỏ hàng</h5>

    <ul class="list-group list-group-flush mb-0">
      <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
        Tổng giá tiền món hàng
        <span id="temporary-amount">0đ</span>
      </li>
      <li class="list-group-item d-flex justify-content-between align-items-center px-0">
        Shipping
        <span>Miễn phí</span>
      </li>
      <li class="list-group-item d-flex justify-content-between align-items-center px-0">
        Giảm giá
        <span id="total-discount">0đ</span>
      </li>
      <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0">
        <div>
          <strong>Tổng giá tiền</strong>
          <strong>
            <p class="mb-0">(đã bao gồm VAT)</p>
          </strong>
        </div>
        <span><strong id="total-price">0đ</strong></span>
      </li>
    </ul>

    <hr>

    <h5 class="mb-3">Thông tin đặt hàng</h5>

    <form method="post" action="/payment/VNPay/payment">
      <div class="form-outline mb-4">
        <input type="text" id="address" class="form-control" name="address" value="<?= $_SESSION['user']['address'] ?>" />
        <label class="form-label" for="address">Địa chỉ nhận hàng</label>
      </div>

      <div class="form-outline mb-4">
        <input type="text" id="phoneNumber" class="form-control" name="phone" value="<?= $_SESSION['user']['phoneNumber'] ?>" />
        <label class="form-label" for="phoneNumber">Số điện thoại nhận hàng</label>
      </div>

      <input type="number" id="shipFeeForm" class="form-control" name="shipFee" value="0" hidden />

      <!-- Submit button -->
      <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">thanh toán</button>

    </form>

  </div>
</div>