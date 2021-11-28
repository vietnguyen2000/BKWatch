<?php
// $chiptag_checkbox_id_fix = $menu_id . $chiptag_checkbox_id;
$chiptag_checkbox_page = "";
$chiptag_checkbox_sort = "";
$chiptag_checkbox_search = "";
$chiptag_checkbox_category = [];
$chiptag_checkbox_brand = [];
if ((int)$data['page'] != 1) {
  $chiptag_checkbox_page = "page=" . $data['page'];
}
if (!empty($data['sort'])) {
  $chiptag_checkbox_sort = "sort=" . $data['sort'];
}
if (!empty($data['search_normal'])) {
  $chiptag_checkbox_search = "search=" . $data['search_normal'];
}
if (!empty($data['search_category'])) {
  $chiptag_checkbox_category = $data['search_category'];
}
if (!empty($data['search_brand'])) {
  $chiptag_checkbox_brand = $data['search_brand'];
}
if ($id_chiptag == "search") {
  $chiptag_checkbox_search = "";
}
if ($id_chiptag == "category") {
  foreach ($chiptag_checkbox_category as $key_chiptag_checkbox_category => $value_chiptag_checkbox_category) {
    if ($value_chiptag_checkbox_category == $data_chiptag) {
      unset($chiptag_checkbox_category[$key_chiptag_checkbox_category]);
    }
  }
}
if ($id_chiptag == "brand") {
  foreach ($chiptag_checkbox_brand as $key_chiptag_checkbox_brand => $value_chiptag_checkbox_brand) {
    if ($value_chiptag_checkbox_brand == $data_chiptag) {
      unset($chiptag_checkbox_brand[$key_chiptag_checkbox_brand]);
    }
  }
}
$href_value = "";
if ($chiptag_checkbox_search != "") {
  $href_value .= "&" . $chiptag_checkbox_search;
}
if ($chiptag_checkbox_category != []) {
  $temp = http_build_query(array("category" => $chiptag_checkbox_category));
  $href_value .= "&" . $temp;
}
if ($chiptag_checkbox_brand != []) {
  $temp = http_build_query(array("brand" => $chiptag_checkbox_brand));
  $href_value .= "&" . $temp;
}
if ($chiptag_checkbox_page != "") {
  $href_value .= "&" . $chiptag_checkbox_page;
}
if ($chiptag_checkbox_sort != "") {
  $href_value .= "&" . $chiptag_checkbox_sort;
}
$href_value = substr($href_value, 1);
// print_r($href_value);
if ($href_value == "") {
  $href_value = "/watch";
} else {
  $href_value = "/watch?" . $href_value;
}
?>
<div style="padding: 0 5px 10px 5px">
  <a style="padding: 3px 10px;" type="button" class="btn btn-outline-primary chips-watchPage" data-mdb-ripple-color="dark" href="<?php echo $href_value; ?>">
    <?php echo $data_chiptag; ?>
    <i class="fas fa-times" style="padding-left: 2px;"></i>
  </a>
</div>