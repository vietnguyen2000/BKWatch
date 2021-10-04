<footer>
  <style>
    <?php
    ob_start();
    include 'footer.css';
    $file_content = ob_get_contents();
    ob_end_clean();
    echo $file_content
    ?>
  </style>
  <div class=".container-xl">
    <div class="row align-items-start">
      <div class="col-xl-3">
        <?php require 'footerInfo.php' ?>
      </div>
      <div class="col-xl-3">
        <?php require 'footerLink.php' ?>
      </div>
      <div class="col-xl-3">
        <?php require 'footerSupport.php' ?>
      </div>
      <div class="col-xl-3">
        <?php require 'footerDownload.php' ?>
      </div>
    </div>
  </div>
</footer>