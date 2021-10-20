<div class="px-5 header-bg py-2 row justify-content-center">
  <div class="navbar col-8">
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
          <a href="<?= $item[1] ?>" class="nav-item <?= $data['nav'] == $item[1] ? 'nav-item-active' : '' ?>">
            <?= $item[0] ?>
          </a>
        </p>
      </div>
    <?php } ?>
  </div>

</div>