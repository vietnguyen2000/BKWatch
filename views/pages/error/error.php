<section class="page_404">
  <style>
    <?php include 'error.css' ?>
  </style>
  <div class="container">
    <div class="row">
      <div class="col-sm-12 ">
        <div class="col-sm-10 col-sm-offset-1  text-center block-center">
          <div class="four_zero_four_bg">
            <h1 class="text-center "><?php echo $data['errorCode'] ?></h1>


          </div>

          <div class="contant_box_404">
            <h3 class="h2">
              <?php echo $data['title'] ?>
            </h3>

            <p><?php echo $data['text'] ?></p>

            <a href="/" class="btn btn-primary">Trang chủ</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>