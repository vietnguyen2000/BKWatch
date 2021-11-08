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
    $id = 1;
    $blog_block_id = $id;
    $list_banner = [];
    foreach ($data['data']['banner'] as $key => $value) {
      if ($value['blogId'] == $id) {
        array_push($list_banner, $value['imageURL']);
      }
    }
    $data_blog = [];
    foreach ($data['data']['blog'] as $key => $value) {
      if ($value['id'] == $id) {
        $data_blog = $value;
      }
    }
    $blog_block_img = $list_banner[0];
    $blog_block_title = $data_blog['title'];;
    $blog_block_content = $data_blog['content'];;
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
        if ($end > count($data['data']['blog'])) {
          $end = count($data['data']['blog']);
        }
        $dataBlog = $data['data']['blog'];
        $keys = [];
        foreach ($dataBlog as $key => $value) {
          array_push($keys, $value['id']);
        }
        for ($i = $start; $i < $end; $i++) {
          $id = $keys[$i];
          $blog_url = '/blog';
          $blog_block_id = $id;
          $list_banner = [];
          foreach ($data['data']['banner'] as $key => $value) {
            if ($value['blogId'] == $id) {
              array_push($list_banner, $value['imageURL']);
            }
          }
          $list_comment = [];
          foreach ($data['data']['cmt'] as $key => $value) {
            if ($value['blogId'] == $id) {
              array_push($list_comment, $value);
            }
          }
          print_r($list_comment);
          if ($id == $dataBlog[$i]['id']) {
            $blog_block_img = $list_banner[0];
            $blog_block_title = $dataBlog[$i]['title'];
            $blog_block_date = $dataBlog[$i]['updatedAt'];
            $blog_block_content = $dataBlog[$i]['content'];
            $blog_block_author = $dataBlog[$i]['fullname'];
            $blog_block_commentCount = count($list_comment);
          }
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
        $total = count($dataBlog);
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
          <a class="page-link" href=<?php if ($data['page'] < ceil(1.0 * count($dataBlog) / $data['length'])) {
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