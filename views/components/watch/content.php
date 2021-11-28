<main class="my-2">
  <div class="tab-pane fade show active" id="ldp-home-tabs-1" role="tabpanel" aria-labelledby="ldp-home-tab-1">
    <div class="row justify-content-around">
      <?php
      $page = $data['page'];
      $len = $data['length'];
      $start = $len * $page - $len;
      $end = $len * $page;
      $count = 0;
      $watchPageURL = '/watch?';
      if (!empty($data['search_normal'])) {
        $watchPageURL .= "search=" . $data['search_normal'] . "&";
      }
      if (!empty($data['search_category'])) {
        $watchPageURL .=  http_build_query(["category" => $data['search_category']]) . "&";
      }
      if (!empty($data['search_brand'])) {
        $watchPageURL .=  http_build_query(["brand" => $data['search_brand']]) . "&";
      }
      if (!empty($data['sort'])) {
        $watchPageURL .= "sort=" . $data['sort'] . "&";
      }
      $watchPageURL .= "page=";
      foreach ($data['products'] as $product) {
        if ($count < $start) {
          $count += +1;
          continue;
        }
        if ($count >= $end) {
          break;
        }
        echo '<div class="col-10 col-sm-6 col-md-4 col-lg-4 col-xl-3">';
        require(realpath($_SERVER["DOCUMENT_ROOT"]) . '/views/components/home/productDisplay/cardviewProduct.php');
        echo '</div>';
        $count += +1;
      }
      ?>
      <div class="col-0 col-sm my-2"> </div>
    </div>
  </div>
  <div style="justify-content: center; display: flex; padding: 30px 0 0 0">
    <nav aria-label="...">
      <ul class="pagination pagination-circle">
        <li class="page-item">
          <a class="page-link" href=<?php if ($data['page'] > 1) {
                                      echo $watchPageURL . $data['page'] - 1;
                                    } else {
                                      echo "#";
                                    } ?> tabindex="-1" aria-disabled="true">Trước</a>
        </li>
        <?php
        $len = $data['length'];
        $total = count($data['products']);
        $page = ceil(1.0 * $total / $len);
        $curPage = $data['page'];
        $i = 0;
        for ($i = 1; $i <= $page; $i++) {
          if ($i == $curPage) {
            echo '
            <li class="page-item active">
              <a class="page-link" href="' . $watchPageURL . $i . '">' . $i . '<span class="sr-only">(current)</span></a>
            </li>
            ';
          } else {
            echo '
            <li class="page-item">
              <a class="page-link" href="' . $watchPageURL . $i . '">' . $i . '</a>
            </li>
            ';
          }
        }
        ?>
        <li class="page-item">
          <a class="page-link" href=<?php if ($data['page'] < ceil(1.0 * count($data['products']) / $data['length'])) {
                                      echo  $watchPageURL . $data['page'] + 1;
                                    } else {
                                      echo "#";
                                    } ?>>Sau</a>
        </li>
      </ul>
    </nav>
  </div>
</main>