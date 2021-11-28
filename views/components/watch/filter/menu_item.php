<div style="padding: 0 0 10px 0; margin: 0 0 20px 0; border-bottom: 1px solid rgba(128, 128, 128, 0.25);">
  <div class=" row">
    <div class="col-9" id="<?php echo "collapse_title" . $menu_id ?>" style="display: flex; align-items: center; justify-content: flex-start;" data-mdb-toggle="collapse" data-mdb-target="#collapse<?php echo $menu_id ?>" aria-expanded="false" aria-controls="collapse<?php echo $menu_id ?>">
      <h6><?php echo $menu_title ?></h6>
    </div>
    <div class="col-3" style="display: flex; align-items: center; justify-content: flex-end;">
      <div id="<?php echo "collapse_" . $menu_id ?>" data-mdb-toggle="collapse" data-mdb-target="#collapse<?php echo $menu_id ?>" aria-expanded="false" aria-controls="collapse<?php echo $menu_id ?>">
        <div id="iconShow_collapse<?php echo $menu_id ?>" style="display: none;">
          <i class="fas fa-angle-down fa-lg"></i>
        </div>
        <div id="iconHide_collapse<?php echo $menu_id ?>">
          <i class="fas fa-angle-up fa-lg"></i>
        </div>
      </div>
    </div>
  </div>
  <!-- Collapsed content -->
  <div class="collapse mt-2 show" id="collapse<?php echo $menu_id ?>">
    <?php
    // $menu_id;
    // $menu_title;
    // $menu_item;
    foreach ($menu_item as $value_menu_item) {
      $menu_item_checkbox_id = $value_menu_item['id'];
      $menu_item_checkbox_title = $value_menu_item['title'];
      require 'menu_item_checkbox.php';
    }
    ?>
  </div>
  <script>
    $('#<?php echo "collapse_" . $menu_id ?>').click(function() {
      if ($('#iconShow_collapse<?php echo $menu_id ?>').css('display') == 'none') {
        $('#iconShow_collapse<?php echo $menu_id ?>').show();
        $('#iconHide_collapse<?php echo $menu_id ?>').hide();
        flag = true;
      } else {
        $('#iconHide_collapse<?php echo $menu_id ?>').show();
        $('#iconShow_collapse<?php echo $menu_id ?>').hide();
        flag = false;
      }
    });
    $('#<?php echo "collapse_title" . $menu_id ?>').click(function() {
      if ($('#iconShow_collapse<?php echo $menu_id ?>').css('display') == 'none') {
        $('#iconShow_collapse<?php echo $menu_id ?>').show();
        $('#iconHide_collapse<?php echo $menu_id ?>').hide();
        flag = true;
      } else {
        $('#iconHide_collapse<?php echo $menu_id ?>').show();
        $('#iconShow_collapse<?php echo $menu_id ?>').hide();
        flag = false;
      }
    });
  </script>
</div>