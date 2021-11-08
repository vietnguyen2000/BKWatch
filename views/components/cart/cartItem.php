<div class="row g-0">
  <div class="col-4 hover-overlay ripple ripple-surface ripple-surface-light" style="aspect-ratio: 8/6">
    <a href="watch/<?= $product['id'] ?>">
      <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
    </a>
    <img src="https://mdbootstrap.com/wp-content/uploads/2020/06/vertical.jpg" alt="..." class="img-fluid" style="width: 100%; height: 100%; object-fit:contain" />
  </div>
  <div class="col-8 d-flex justify-content-between flex-column px-2" style="aspect-ratio: 8/3">
    <div class="d-flex justify-content-between">
      <div>
        <h5 class="card-title">Card title</h5>
        <p class="card-text m-0">
          SKU: <?= $product['productCode'] ?>
        </p>
        <p class="card-text m-0">
          Brand: <?= $product['brandTitle'] ?>
        </p>
        <p class="card-text">
          Color: <?= $product['color'] ?>
        </p>
      </div>
      <div>
        <div class="def-number-input number-input safari_only mb-0 w-100" style="height:2rem">
          <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="btn btn-danger h-100 py-0 px-3">-</button>
          <input min="0" name="quantity" value="1" type="number">
          <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="btn btn-primary h-100 py-0 px-3">+</button>
        </div>
      </div>
    </div>
    <div class="d-flex justify-content-between align-items-center">
      <div>
        <a href="#!" type="button" class="card-link-secondary small text-uppercase me-3"><i class="fas fa-trash-alt mr-1"></i> Remove item </a>
        <a href="#!" type="button" class="card-link-secondary small text-uppercase"><i class="fas fa-heart mr-1"></i> Move to wish list </a>
      </div>
      <p class="mb-0"><span><strong>$17.99</strong></span></p>
    </div>
  </div>
</div>