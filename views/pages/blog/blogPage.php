<style>
  <?php
  include 'blogPage.css';
  ?>
</style>
<div class=".container">
  <?php
  $blog_banner = "https://mdbootstrap.com/img/new/slides/017.jpg";
  $blog_banner_title = "BKWATCH BLOG";
  require(realpath($_SERVER["DOCUMENT_ROOT"]) . '/views/components/blog/banner.php');
  ?>
</div>

<!--Main layout-->
<main class="my-5">
  <div class="container">
    <!--Section: News of the day-->
    <?php
    $blog_url = '/blog';
    $id = 0;
    $blog_block_id = $id;
    $blog_block_img = $data['data'][$id]['img'];;
    $blog_block_title = $data['data'][$id]['title'];;
    $blog_block_content = $data['data'][$id]['content'];;
    require(realpath($_SERVER["DOCUMENT_ROOT"]) . '/views/components/blog/newsOfTheDay.php');
    ?>
    <!--Section: News of the day-->

    <!--Section: Content-->
    <section>
      <div class="row gx-lg-5">
        <!-- News block -->
        <?php
        $i = 0;
        $page = $data['page'];
        $len = $data['length'];
        $start = $len * $page - $len;
        $end = $len * $page;
        $keys = array_keys($data['data']);
        if ($end > count($data['data'])) {
          $end = count($data['data']);
        }
        for ($i = $start; $i < $end; $i++) {
          $id = $keys[$i];
          $blog_url = '/blog';
          $blog_block_id = $id;
          $blog_block_img = $data['data'][$id]['img'];
          $blog_block_title = $data['data'][$id]['title'];
          $blog_block_date = $data['data'][$id]['date'];
          $blog_block_content = $data['data'][$id]['content'];
          $blog_block_author = $data['data'][$id]['author'];
          $blog_block_commentCount = $data['data'][$id]['cmtCount'];
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
          <a class="page-link" href=<?php if ($data['page'] > 1) {
                                      echo "/blog?page=" . $data['page'] - 1;
                                    } else {
                                      echo "#!";
                                    } ?> tabindex="-1" aria-disabled="true">Previous</a>
        </li>
        <?php
        $len = $data['length'];
        $total = count($data['data']);
        $page = ceil(1.0 * $total / $len);
        $curPage = $data['page'];
        $i = 0;
        for ($i = 1; $i <= $page; $i++) {
          if ($i == $curPage) {
            echo '
            <li class="page-item active">
              <a class="page-link" href="/blog?page=' . $i . '">' . $i . '<span class="sr-only">(current)</span></a>
            </li>
            ';
          } else {
            echo '
            <li class="page-item">
              <a class="page-link" href="/blog?page=' . $i . '">' . $i . '</a>
            </li>
            ';
          }
        }
        ?>
        <li class="page-item">
          <a class="page-link" href=<?php if ($data['page'] < ceil(1.0 * count($data['data']) / $data['length'])) {
                                      echo "/blog?page=" . $data['page'] + 1;
                                    } else {
                                      echo "#!";
                                    } ?>>Next</a>
        </li>
      </ul>
    </nav>
  </div>
</main>
<!--Main layout-->