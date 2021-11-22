<nav class="navbar px-2 px-md-3 px-lg-4 justify-content-between header-bg header-border-bottom-2 py-2 py-sm-3">
  <?php

  use Models\CartItemModel;

  require 'logo.php';
  require 'searchBar.php';
  require 'minorsIcons.php';
  ?>
  <button class="navbar-toggler d-block d-sm-none" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01" aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
    <i class="fas fa-bars text-white fa"></i>
  </button>
  <div class="container-fluid d-block d-sm-none">
    <div class="collapse navbar-collapse" id="navbarExample01">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 mt-3">
        <li class="nav-item active">
          <form action="/watch" method="get">
            <div class="input-group">
              <div class="form-outline col-10 col-xl-11">
                <input type="text" id="search" name="search" class="form-control search-bar" placeholder="Tìm kiếm..." />
                <!-- <label class="form-label" for="searchBar">Tìm kiếm ... </label> -->
              </div>
              <button class="btn btn-primary px-0 col-2 col-xl-1" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </form>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/">Trang chủ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/intro">Giới thiệu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/watch">Đồng hồ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/blog">Blogs</a>
        </li>
        <?php if (isset($_SESSION['user'])) { ?>
          <li class="nav-item">
            <a class="nav-link" href="/me">Trang cá nhân</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/favorite">Danh sách yêu thích</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/cart">
              Giỏ hàng
              <?php if (isset($_SESSION['user'])) { ?>
                <span class="badge bg-danger ms-2 cart-badge"><?= $cartQuantity ?></span>
              <?php } ?>
            </a>
          </li>

        <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link" href="/login">Đăng nhập</a>
          </li>
        <?php } ?>
        <li class="nav-item">
          <a class="nav-link" href="/contact">Liên hệ</a>
        </li>
      </ul>
    </div>
  </div>
</nav>