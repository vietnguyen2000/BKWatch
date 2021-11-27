<div class="form-check">
  <?php
  $menu_item_checkbox_id_fix = $menu_id . $menu_item_checkbox_id;
  $menu_item_checkbox_page = "";
  $menu_item_checkbox_sort = "";
  $menu_item_checkbox_search = "";
  $menu_item_checkbox_category = [];
  $menu_item_checkbox_brand = [];
  $arr_item_checkbox_handle_checked = [];
  if ((int)$data['page'] != 1) {
    $menu_item_checkbox_page = "page=" . $data['page'];
  }
  if (!empty($data['sort'])) {
    $menu_item_checkbox_sort = "sort=" . $data['sort'];
  }
  if (!empty($data['search_normal'])) {
    $menu_item_checkbox_search = "search=" . $data['search_normal'];
  }
  if (!empty($data['search_category'])) {
    $menu_item_checkbox_category = $data['search_category'];
    foreach ($menu_item_checkbox_category as $key_menu_item_checkbox_category => $value_menu_item_checkbox_category) {
      array_push($arr_item_checkbox_handle_checked, [
        "id" => $menu_id,
        "title" => $value_menu_item_checkbox_category,
      ]);
    }
  }
  if (!empty($data['search_brand'])) {
    $menu_item_checkbox_brand = $data['search_brand'];
    foreach ($menu_item_checkbox_brand as $key_menu_item_checkbox_brand => $value_menu_item_checkbox_brand) {
      array_push($arr_item_checkbox_handle_checked, [
        "id" => $menu_id,
        "title" => $value_menu_item_checkbox_brand,
      ]);
    }
  }
  ?>
  <input <?php
          foreach ($arr_item_checkbox_handle_checked as $value_arr_item_checkbox_handle_checked) {
            if ($menu_id == $value_arr_item_checkbox_handle_checked['id']) {
              if ($menu_item_checkbox_title == $value_arr_item_checkbox_handle_checked['title']) {
                echo "checked";
                break;
              }
            }
          }
          ?> class="form-check-input" type="checkbox" value="<?php echo $menu_item_checkbox_title ?>" id="watchPageFlex<?php echo $menu_item_checkbox_id_fix ?>" name="watchPageFlex<?php echo $menu_item_checkbox_id_fix ?>" />
  <label class="form-check-label" for="watchPageFlex<?php echo $menu_item_checkbox_id_fix ?>" name="watchPageFlex<?php echo $menu_item_checkbox_id_fix ?>">
    <?php
    echo ucwords($menu_item_checkbox_title);
    ?>
  </label>
  <script>
    $('input[name="watchPageFlex<?php echo $menu_item_checkbox_id_fix ?>"]').change(function() {
      if (this.checked) {
        <?php
        if ($menu_id == "category") {
          array_push($menu_item_checkbox_category, $menu_item_checkbox_title);
        }
        if ($menu_id == "brand") {
          array_push($menu_item_checkbox_brand, $menu_item_checkbox_title);
        }
        $build_data = array(
          "category" => $menu_item_checkbox_category,
          "brand" => $menu_item_checkbox_brand,
        );
        $build_data = http_build_query($build_data);
        ?>
        var arr_search_url = {
          "page": "<?php print_r($menu_item_checkbox_page) ?>",
          "sort": "<?php print_r($menu_item_checkbox_sort) ?>",
          "search": "<?php print_r($menu_item_checkbox_search) ?>",
          "cond": "<?php print_r($build_data) ?>",
        }
        var search_url = "";
        if (arr_search_url["cond"] != "") {
          search_url += "&" + arr_search_url["cond"];
        }
        if (arr_search_url["search"] != "") {
          search_url += "&" + arr_search_url["search"];
        }
        if (arr_search_url["sort"] != "") {
          search_url += "&" + arr_search_url["sort"];
        }
        if (arr_search_url["page"] != "") {
          search_url += "&" + arr_search_url["page"];
        }
        var strtemp = "/watch?" + search_url.substring(1);
        fastGet(strtemp)
      } else {
        <?php
        if ($menu_id == "category") {
          foreach ($menu_item_checkbox_category as $key_menu_item_checkbox_category => $value_menu_item_checkbox_category) {
            if ($value_menu_item_checkbox_category == $menu_item_checkbox_title) {
              unset($menu_item_checkbox_category[$key_menu_item_checkbox_category]);
            }
          }
        }
        if ($menu_id == "brand") {
          array_push($menu_item_checkbox_brand, $menu_item_checkbox_title);
          foreach ($menu_item_checkbox_brand as $key_menu_item_checkbox_brand => $value_menu_item_checkbox_brand) {
            if ($value_menu_item_checkbox_brand == $menu_item_checkbox_title) {
              unset($menu_item_checkbox_brand[$key_menu_item_checkbox_brand]);
            }
          }
        }
        $build_data = array(
          "category" => $menu_item_checkbox_category,
          "brand" => $menu_item_checkbox_brand,
        );
        $build_data = http_build_query($build_data);
        ?>
        var arr_search_url = {
          "page": "<?php print_r($menu_item_checkbox_page) ?>",
          "sort": "<?php print_r($menu_item_checkbox_sort) ?>",
          "search": "<?php print_r($menu_item_checkbox_search) ?>",
          "cond": "<?php print_r($build_data) ?>",
        }
        var search_url = "";
        if (arr_search_url["cond"] != "") {
          search_url += "&" + arr_search_url["cond"];
        }
        if (arr_search_url["search"] != "") {
          search_url += "&" + arr_search_url["search"];
        }
        if (arr_search_url["sort"] != "") {
          search_url += "&" + arr_search_url["sort"];
        }
        if (arr_search_url["page"] != "") {
          search_url += "&" + arr_search_url["page"];
        }
        var strtemp = "/watch?" + search_url.substring(1);
        fastGet(strtemp)
      }
    });
  </script>
</div>