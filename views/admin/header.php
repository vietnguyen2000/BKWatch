<div id="app">

  <nav id="navbar-main" class="navbar is-fixed-top">
    <div class="navbar-brand">
      <a class="navbar-item mobile-aside-button">
        <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
      </a>
    </div>
    <div class="navbar-brand is-right">
      <a class="navbar-item --jb-navbar-menu-toggle" data-target="navbar-menu">
        <span class="icon"><i class="mdi mdi-dots-vertical mdi-24px"></i></span>
      </a>
    </div>
    <div class="navbar-menu" id="navbar-menu" style="padding-top: 0px;">
      <div class="navbar-end">
        <div class="navbar-item dropdown has-divider has-user-avatar">
          <a class="navbar-link">
            <div class="user-avatar">
              <img src="<?php echo $data['userImg']; ?>" alt="Bach Khoa" class="rounded-full">
            </div>
            <div class="is-user-name"><span><?php echo $data['username']; ?></span></div>
            <span class="icon"><i class="mdi mdi-chevron-down"></i></span>
          </a>
        </div>
        <a href="/me" class="navbar-item has-divider desktop-icon-only">
          <span class="icon"><i class="mdi mdi-help-circle-outline"></i></span>
          <span>About</span>
        </a>
        <a href="<?= ROOT_URL ?>/logout" title="Log out" class="navbar-item desktop-icon-only">
          <span class="icon"><i class="mdi mdi-logout"></i></span>
          <span>Log out</span>
        </a>
      </div>
    </div>
  </nav>

  <aside class="aside is-placed-left is-expanded">
    <div class="aside-tools">
      <div>
        BK<b class="font-black">watch</b>
      </div>
    </div>
    <div class="menu is-menu-main">
      <p class="menu-label">General</p>
      <ul class="menu-list">
        <li <?php if ($data['nav'] == 'cms') {
              echo "class='active'";
            } ?>>
          <a id='cms' href="/cms">
            <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
            <span class="menu-item-label">Dashboard</span>
          </a>
        </li>
      </ul>
      <p class="menu-label">Contents</p>
      <ul class="menu-list">
        <li id='cmsBlog' <?php if ($data['nav'] == 'cmsBlog') {
                            echo "class='active'";
                          } ?>>
          <a href="/cms/blog">
            <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
            <span class="menu-item-label">Blogs</span>
          </a>
        </li>
      </ul>
      <p class="menu-label">Product</p>
      <ul class="menu-list">
        <li id='cmsProduct' <?php if ($data['nav'] == 'cmsProduct') {
                              echo "class='active'";
                            } ?>>
          <a href="/cms/product" class="has-icon">
            <span class="icon"><i class="mdi mdi-credit-card-outline"></i></span>
            <span class="menu-item-label">Products</span>
          </a>
        </li>

        <li id='cmsCategory' <?php if ($data['nav'] == 'cmsCategory') {
                                echo "class='active'";
                              } ?>>
          <a href="/cms/category" class="has-icon">
            <span class="icon"><i class="mdi mdi-credit-card-outline"></i></span>
            <span class="menu-item-label">Category</span>
          </a>
        </li>

        <li id='cmsBrand' <?php if ($data['nav'] == 'cmsBrand') {
                            echo "class='active'";
                          } ?>>
          <a href="/cms/brand" class="has-icon">
            <span class="icon"><i class="mdi mdi-credit-card-outline"></i></span>
            <span class="menu-item-label">Brands</span>
          </a>
        </li>
      </ul>
      <p class="menu-label">Order</p>
      <ul class="menu-list">
        <li id='cmsOrder' <?php if ($data['nav'] == 'cmsOrder') {
                            echo "class='active'";
                          } ?>>
          <a href="/cms/order" class="has-icon">
            <span class="icon"><i class="mdi mdi-credit-card-outline"></i></span>
            <span class="menu-item-label">Orders</span>
          </a>
        </li>
      </ul>
      <p class="menu-label">User</p>
      <ul class="menu-list">
        <li>
          <a href="#" class="has-icon">
            <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
            <span class="menu-item-label">Admin</span>
          </a>
        </li>
        <li>
          <a href="#" class="has-icon">
            <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
            <span class="menu-item-label">Customer</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>


  <script>
    Array.from(document.getElementsByClassName('mobile-aside-button')).forEach(function(el) {
      el.addEventListener('click', function(e) {
        var dropdownIcon = e.currentTarget.getElementsByClassName('icon')[0].getElementsByClassName('mdi')[0];
        document.documentElement.classList.toggle('aside-mobile-expanded');
        dropdownIcon.classList.toggle('mdi-forwardburger');
        dropdownIcon.classList.toggle('mdi-backburger');
      });
    });
    /* NavBar menu mobile toggle */

    Array.from(document.getElementsByClassName('--jb-navbar-menu-toggle')).forEach(function(el) {
      el.addEventListener('click', function(e) {
        var dropdownIcon = e.currentTarget.getElementsByClassName('icon')[0].getElementsByClassName('mdi')[0];
        document.getElementById(e.currentTarget.getAttribute('data-target')).classList.toggle('active');
        dropdownIcon.classList.toggle('mdi-dots-vertical');
        dropdownIcon.classList.toggle('mdi-close');
      });
    });
  </script>

  <div id="main-body">