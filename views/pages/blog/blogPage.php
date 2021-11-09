<style>
  <?php
  include 'blogPage.css';
  ?>
</style>
<div class=".container">
  <?php
  $dataHeader = $data['header'];
  $blog_title = "";
  $blog_img_banner = [];
  foreach ($dataHeader as $key => $value) {
    $blog_title = $value['title'];
    array_push($blog_img_banner, $value['img']);
  }
  require(realpath($_SERVER["DOCUMENT_ROOT"]) . '/views/components/blog/banner.php');
  ?>
</div>

<!--Main layout-->
<main class="my-5">
  <div class="container">
    <!--Section: News of the day-->
    <?php
    $blog_url = '/blog';
    $record = $data['hotBlog'];
    $blog_block_id = $record[0]['blogId'];
    $blog_block_img = $record[0]['img'][0]['blogImgURL'];
    $blog_block_title = $record[0]['title'];
    $blog_block_content = $record[0]['content'];
    require(realpath($_SERVER["DOCUMENT_ROOT"]) . '/views/components/blog/newsOfTheDay.php');
    ?>
    <!--Section: News of the day-->

    <!--Section: Content-->
    <section>
      <div class="row gx-lg-5">
        <!-- News block -->
        <?php
        // $blog_url = '/blog';
        $page = $data['page'];
        $len = $data['length'];
        $start = $len * $page - $len;
        $end = $len * $page;
        $count = 0;
        $reverseData = array_reverse($data['data']);
        foreach ($reverseData as $key => $record) {
          if ($count < $start) {
            $count += +1;
            continue;
          }
          if ($count >= $end) {
            break;
          }
          $blog_block_id = $record['blogId'];
          $blog_block_img = $record['img'][0]['blogImgURL'];
          $blog_block_title = $record['title'];
          $blog_block_content = $record['content'];
          $blog_block_date = $record['updatedAt'];
          $blog_block_author = $record['userFullname'];
          $blog_block_commentCount = count($record['cmt']);
          require(realpath($_SERVER["DOCUMENT_ROOT"]) . '/views/components/blog/newsBlock.php');
          $count += 1;
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
                                      echo $blog_url . "?page=" . $data['page'] - 1;
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
              <a class="page-link" href="' . $blog_url . '?page=' . $i . '">' . $i . '<span class="sr-only">(current)</span></a>
            </li>
            ';
          } else {
            echo '
            <li class="page-item">
              <a class="page-link" href="' . $blog_url . '?page=' . $i . '">' . $i . '</a>
            </li>
            ';
          }
        }
        ?>
        <li class="page-item">
          <a class="page-link" href=<?php if ($data['page'] < ceil(1.0 * count($data['data']) / $data['length'])) {
                                      echo  $blog_url . "?page=" . $data['page'] + 1;
                                    } else {
                                      echo "#!";
                                    } ?>>Next</a>
        </li>
      </ul>
    </nav>
  </div>
</main>
<!--Main layout-->