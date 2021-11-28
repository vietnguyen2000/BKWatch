<div>
  <?php
  $menu_data = [
    0 => [
      "id" => "category",
      "title" => "Thể loại",
      "item" => $dataCategory,
    ],
    1 => [
      "id" => "brand",
      "title" => "Nhãn hiệu",
      "item" => $dataBrand,
    ]
  ];
  foreach ($menu_data as $item_menu_data) {
    $menu_id = $item_menu_data['id'];
    $menu_title = $item_menu_data['title'];
    $menu_item = $item_menu_data['item'];
    require 'menu_item.php';
  }
  ?>
</div>