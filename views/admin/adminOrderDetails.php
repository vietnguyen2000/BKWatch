<?php
$order = $data['data'];
function mapStatus($status)
{
  switch ($status) {
    case 0:
      return 'Chưa thanh toán';
    case 1:
      return 'Đã thanh toán, chờ giao hàng';
    case 2:
      return 'Đang giao hàng';
    case 3:
      return 'Hoàn thành';
    default:
      return 'Đơn hàng lỗi';
  }
} ?>

<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li>Admin</li>
      <li>Order</li>
      <li><?= $order['id'] ?></li>
    </ul>
  </div>
</section>


<section class="section main-section">
  <section class="is-hero-bar mt-3">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
      <h1 class="title">
        Order Details
      </h1>
    </div>
  </section>
  <div class="card">
    <div class="card-content">

      <div>
        <label class="label" style="display: inline-block;">Order Id:</label>
        <span><?= $order['id'] ?></span>
      </div>

      <div>
        <label class="label" style="display: inline-block;">User Id:</label>
        <span><?= $order['userId'] ?></span>
      </div>

      <div>
        <label class="label" style="display: inline-block;">Address:</label>
        <span><?= $order['address'] ? $order['address'] : 'None' ?></span>
      </div>

      <div>
        <label class="label" style="display: inline-block;">Phone number:</label>
        <span><?= $order['phoneNumber'] ? $order['phoneNumber'] : 'None' ?></span>
      </div>

      <div>
        <label class="label" style="display: inline-block;">Payment method:</label>
        <span><?= $order['paymentMethod'] ? $order['paymentMethod'] : 'None' ?></span>
      </div>

      <div>
        <label class="label" style="display: inline-block;">Created at:</label>
        <span><?= $order['createdAt'] ? $order['createdAt'] : 'None' ?></span>
      </div>

      <div>
        <label class="label" style="display: inline-block;">Updated at:</label>
        <span><?= $order['updatedAt'] ? $order['updatedAt'] : 'None' ?></span>
      </div>
      <hr>
      <div>
        <label class="label" style="display: inline-block;">Status:</label>
        <div class="select" style="max-width: 500px; display: inline-block">
          <select id="status" name="status">
            <?php for ($i = 0; $i <= 3; $i++) { ?>
              <option value="<?= $i ?>" <?= $i == $order['status'] ? 'selected' : '' ?>><?= mapStatus($i) ?></option>
            <?php } ?>
          </select>
        </div>
        <button class="button big green --jb-modal" type="button" onclick="updateStatus()">
          Update
        </button>
      </div>
    </div>
  </div>

  <section class="is-hero-bar mt-3">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
      <h1 class="title">
        List Items
      </h1>
    </div>
  </section>

  <div class="card">
    <div class="card-content">
      <table class="data-table">
        <thead>
          <tr>
            <th>Preview</th>
            <th>Title</th>
            <th>Product Id</th>
            <th>Code</th>
            <th>Color</th>
            <th>Quantity</th>
            <th>Price</th>
          </tr>
        </thead>
        <tbody id="table-images-body">
          <?php
          foreach ($order['listItems'] as $row) { ?>
            <tr id="row-<?= $row['id'] ?>">
              <td>
                <image src="<?= $row['imagePreview'] ?>" alt="image-preview-<?= $row['productId'] ?>>" style="max-height: 80px" />
              </td>
              <td><?= $row['productTitle'] ?></td>
              <td><?= $row['productId'] ?></td>
              <td><?= $row['productCode'] ?></td>
              <td><?= $row['productColor'] ?></td>
              <td><?= $row['quantity'] ?></td>
              <td><?= $row['price'] * (100 - $row['discount']) / 100 ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

</section>



<div id="sample-modal-2" class="modal">
  <div class="modal-background --jb-modal-close" onclick="cancel()"></div>
  <div class="modal-card" style="margin-top: 40px;">
    <header class="modal-card-head">
      <p class="modal-card-title">DELETE IT?</p>
    </header>
    <section class="modal-card-body">
      <p>PLEASE CONFIRM AGAIN TO <b>UPDATE</b> IT.</p>
    </section>
    <footer class="modal-card-foot">
      <button class="button --jb-modal-close" onclick="cancel()">Cancel</button>
      <button class="button blue --jb-modal-close" onclick="updateOrder()">Confirm</button>
    </footer>
  </div>
</div>

<script>
  function updateStatus() {
    const status = $('#status').val()
    $.post(`/cms/order/update/<?= $order['id'] ?>`, {
      status
    }, () => {
      toastsHandler.createToast({
        type: "success",
        icon: "check-circle",
        message: "Bạn đã cập nhật thành công",
        duration: 3000,
      });
      fastGet('/cms/order')
    })
  }
</script>

<script>
  $(document).ready(function() {
    $('#table').DataTable();
  });
</script>