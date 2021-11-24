<div class="dropdown" style="margin: 5 0 20 0;">
  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false" style="width: 100%;">
    Tìm kiếm theo
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="width: 100%;">
    <div style="padding: 15 0 15 0; width:100%; display: flex; justify-content:center;">
      <div style="width:90%; height:100%;">
        <?php
        $dataCategory = $data['categoryAll'];
        $dataBrand = $data['brandAll'];
        require 'menu.php';
        ?>
      </div>
    </div>
  </ul>
</div>