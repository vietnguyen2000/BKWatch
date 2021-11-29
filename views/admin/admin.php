<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li>Admin</li>
      <li>Dashboard</li>
    </ul>
  </div>
</section>

<section class="section main-section">
  <div class="grid gap-6 grid-cols-1 md:grid-cols-3 mb-6">
    <div class="card">
      <div class="card-content">
        <div class="flex items-center justify-between">
          <div class="widget-label">
            <h3>
              Total users
            </h3>
            <h1>
              <?= $data['totalUsers'] ?>
            </h1>
          </div>
          <span class="icon widget-icon text-green-500"><i class="mdi mdi-account-multiple mdi-48px"></i></span>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-content">
        <div class="flex items-center justify-between">
          <div class="widget-label">
            <h3>
              Total orders
            </h3>
            <h1>
              <?= $data['totalOrders'] ?>
            </h1>
          </div>
          <span class="icon widget-icon text-blue-500"><i class="mdi mdi-cart-outline mdi-48px"></i></span>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-content">
        <div class="flex items-center justify-between">
          <div class="widget-label">
            <h3>
              Total product sales
            </h3>
            <h1>
              <?= $data['totalProductSales'] ?>
            </h1>
          </div>
          <span class="icon widget-icon text-red-500"><i class="mdi mdi-finance mdi-48px"></i></span>
        </div>
      </div>
    </div>
  </div>
</section>