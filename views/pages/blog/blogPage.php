<style>
  <?php
  include 'blogPage.css';
  ?>
</style>
<div class=".container">
  <?php
  require(realpath($_SERVER["DOCUMENT_ROOT"]) . '/views/components/blog/banner.php');
  ?>
</div>

<!--Main layout-->
<main class="my-5">
  <div class="container">
    <!--Section: News of the day-->
    <?php
    $blog_block_id = $data['data'][0]['id'];
    $blog_block_img = $data['data'][0]['img'];;
    $blog_block_title = $data['data'][0]['title'];;
    $blog_block_content = $data['data'][0]['content'];;
    require(realpath($_SERVER["DOCUMENT_ROOT"]) . '/views/components/blog/newsOfTheDay.php');
    ?>
    <!--Section: News of the day-->

    <!--Section: Content-->
    <section>
      <div class="row gx-lg-5">
        <!-- News block -->
        <?php
        $i = 0;
        for ($i = 0; $i < count($data['data']); $i++) {
          $blog_block_id = $data['data'][$i]['id'];
          $blog_block_img = $data['data'][$i]['img'];
          $blog_block_title = $data['data'][$i]['title'];
          $blog_block_date = $data['data'][$i]['date'];
          $blog_block_content = $data['data'][$i]['content'];
          $blog_block_author = $data['data'][$i]['author'];
          $blog_block_commentCount = $data['data'][$i]['cmtCount'];
          require(realpath($_SERVER["DOCUMENT_ROOT"]) . '/views/components/blog/newsBlock.php');
        }
        ?>
      </div>
    </section>
    <!--Section: Content-->

    <!-- Pagination -->
    <nav class="my-4" aria-label="...">
      <ul class="pagination pagination-circle justify-content-center">
        <li class="page-item">
          <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
        </li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item" aria-current="page">
          <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
        </li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#">Next</a>
        </li>
      </ul>
    </nav>
  </div>
</main>
<!--Main layout-->