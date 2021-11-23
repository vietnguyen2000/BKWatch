<div class="form-check">
  <?php
  $menu_item_checkbox_id_fix = $menu_id . $menu_item_checkbox_id;
  $menu_item_checkbox_page = "";
  $menu_item_checkbox_sort = "";
  $arr_item_checkbox_handle_checked = [];
  if ((int)$data['page'] != 1) {
    $menu_item_checkbox_page = strval("page=" . $data['page']);
  }
  if (!empty($data['sort'])) {
    $menu_item_checkbox_sort = strval("sort=" . $data['sort']);
  }
  if (isset($searchCondition[$menu_id])) {
    $menu_item_checkbox_data = $searchCondition[$menu_id];
    $explode_item_checkbox_data = explode("@", $menu_item_checkbox_data);
    $removed = array_shift($explode_item_checkbox_data);
    for ($i = 0; $i < count($explode_item_checkbox_data); $i++) {
      array_push($arr_item_checkbox_handle_checked, [
        "id" => $menu_id,
        "title" => $explode_item_checkbox_data[$i],
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
    $("#watchPageFlex<?php echo $menu_item_checkbox_id_fix ?>").change(function() {
      if (this.checked) {
        <?php
        $search_url_category = "";
        $search_url_brand = "";
        $search_url_search = "";
        $search_to_string_add = "";
        if (isset($searchCondition['category'])) {
          $temp = "category=" . $searchCondition['category'];
          $search_url_category = $temp;
        }
        if (isset($searchCondition['brand'])) {
          $temp = "brand=" . $searchCondition['brand'];
          $search_url_brand = $temp;
        }
        if (isset($searchCondition['search'])) {
          $temp = "search=" . $searchCondition['search'];
          $search_url_search = $temp;
        }
        foreach ($arr_item_checkbox_handle_checked as $key_arr_item_checkbox_handle_checked => $value_arr_item_checkbox_handle_checked) {
          $search_to_string_add .= "@" . $value_arr_item_checkbox_handle_checked['title'];
        }
        $search_to_string_add .= "@" . $menu_item_checkbox_title;
        if ($menu_id == 'category') {
          $temp = "category=" . $search_to_string_add;
          $search_url_category = $temp;
        }
        if ($menu_id == 'brand') {
          $temp = "brand=" . $search_to_string_add;
          $search_url_brand = $temp;
        }
        ?>
        var arr_search_url = {
          "page": "<?php print_r($menu_item_checkbox_page) ?>",
          "sort": "<?php print_r($menu_item_checkbox_sort) ?>",
          "category": "<?php print_r($search_url_category) ?>",
          "brand": "<?php print_r($search_url_brand) ?>",
          "search": "<?php print_r($search_url_search) ?>",
        }
        var search_url = "";
        if (arr_search_url["category"] != "") {
          search_url += "&" + arr_search_url["category"];
        }
        if (arr_search_url["brand"] != "") {
          search_url += "&" + arr_search_url["brand"];
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
        window.location.href = "/watch?" + search_url.substring(1);
      } else {
        <?php
        $search_url_category = "";
        $search_url_brand = "";
        $search_url_search = "";
        $search_to_string_remove = "";
        if (isset($searchCondition['category'])) {
          $temp = "category=" . $searchCondition['category'];
          $search_url_category = $temp;
        }
        if (isset($searchCondition['brand'])) {
          $temp = "brand=" . $searchCondition['brand'];
          $search_url_brand = $temp;
        }
        if (isset($searchCondition['search'])) {
          $temp = "search=" . $searchCondition['search'];
          $search_url_search = $temp;
        }
        foreach ($arr_item_checkbox_handle_checked as $key_arr_item_checkbox_handle_checked => $value_arr_item_checkbox_handle_checked) {
          if ($value_arr_item_checkbox_handle_checked['title'] == $menu_item_checkbox_title) {
            continue;
          } else {
            $search_to_string_remove .= "@" . $value_arr_item_checkbox_handle_checked['title'];
          }
        }
        if ($menu_id == 'category') {
          if ($search_to_string_remove != "") {
            $temp = "category=" . $search_to_string_remove;
            $search_url_category = $temp;
          } else {
            $search_url_category = "";
          }
        }
        if ($menu_id == 'brand') {
          if ($search_to_string_remove != "") {
            $temp = "brand=" . $search_to_string_remove;
            $search_url_brand = $temp;
          } else {
            $search_url_brand = "";
          }
        }
        // echo "console.log('url=$search_url_category');";
        ?>
        var arr_search_url = {
          "page": "<?php print_r($menu_item_checkbox_page) ?>",
          "sort": "<?php print_r($menu_item_checkbox_sort) ?>",
          "category": "<?php print_r($search_url_category) ?>",
          "brand": "<?php print_r($search_url_brand) ?>",
          "search": "<?php print_r($search_url_search) ?>",
        }
        var search_url = "";
        if (arr_search_url["category"] != "") {
          search_url += "&" + arr_search_url["category"];
        }
        if (arr_search_url["brand"] != "") {
          search_url += "&" + arr_search_url["brand"];
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
        // console.log("/watch?" + search_url.substring(1));
        window.location.href = "/watch?" + search_url.substring(1);
      }
    });
  </script>
</div>