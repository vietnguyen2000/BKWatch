<div class="header-bg py-2 row justify-content-center d-none d-sm-flex">
  <div class="navbar col-sm-11 col-md-10 col-lg-8 header-navbar">
    <?php
    $navItems = [
      [
        'Trang Chủ',
        '/'
      ],
      [
        'Giới thiệu',
        '/intro'
      ],
      [
        'Đồng hồ',
        '/watch'
      ],
      [
        'Blogs',
        '/blog'
      ],
      [
        'Liên hệ',
        '/contact'
      ],
    ];
    ?>
    <?php foreach ($navItems as $key => $item) { ?>
      <div class="col-2">
        <p class="text-center mb-0">
          <a href="<?= $item[1] ?>" class="header-nav-item <?= array_key_exists("nav", $data) && $data['nav'] == $item[1] ? 'header-nav-item-active' : '' ?>">
            <?= $item[0] ?>
          </a>
        </p>
      </div>
    <?php } ?>
  </div>

</div>