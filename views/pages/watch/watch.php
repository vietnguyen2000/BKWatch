<head>
  <style>
    <?php
    include 'watch.css';
    ?>
  </style>
</head>

<body>
  <div class="container">
    <div class="body-watchPage">
      <?php
      $dataRateTotal = [$data['productAll'], $data['userAll']];
      require(realpath($_SERVER["DOCUMENT_ROOT"]) . '/views/components/watch/rateTotal.php');
      ?>
      <div class="row" style="padding: 20 0 0 0;">
        <div class="col-12 col-lg-3 left-watchPage">
          <div class="filter-nav-watchPage">
            <?php
            require(realpath($_SERVER["DOCUMENT_ROOT"]) . '/views/components/watch/filter/nav.php');
            ?>
          </div>
          <div class="filter-normal-watchPage">
            <?php
            $searchCondition = $data['searchCondition'];
            require(realpath($_SERVER["DOCUMENT_ROOT"]) . '/views/components/watch/filter/menu.php');
            ?>
          </div>
        </div>
        <div class="col-12 col-lg-9 right-watchPage">
          <?php
          $dataTop = $data;
          require(realpath($_SERVER["DOCUMENT_ROOT"]) . '/views/components/watch/top.php');
          ?>
          <?php
          require(realpath($_SERVER["DOCUMENT_ROOT"]) . '/views/components/watch/content.php');
          ?>
        </div>
      </div>
    </div>
  </div>
</body>