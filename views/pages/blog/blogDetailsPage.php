<style>
  <?php
  include 'blogPage.css';
  ?>
</style>
<div class=".container">
  <?php
  $id = $data['id'];
  $blog_banner = $data['data'][$id]['img'];
  $blog_banner_title = $data['data'][$id]['title'];
  require(realpath($_SERVER["DOCUMENT_ROOT"]) . '/views/components/blog/banner.php');
  ?>
</div>

<!--Main layout-->
<main class="my-5">
  <div class="container">
    <p>
      <?php
      echo $data['data'][$id]['content'];
      ?>
    </p>
    <div>
      <?php
      $addCommentAction = "/blog" . "/" . $id;
      $cmts = $data['data'][$id]['cmt'];
      echo "<hr />";
      echo "<h5>Có " . count($cmts) . " bình luận cho bài viết của " . $data['data'][$id]['author'] . "</h5>";
      $i = 0;
      foreach ($cmts as $comment) {
        require realpath($_SERVER["DOCUMENT_ROOT"]) . '/views/components/comments/commentView.php';
      }
      require realpath($_SERVER["DOCUMENT_ROOT"]) . '/views/components/comments/addComment.php';

      ?>
    </div>
  </div>
</main>
<!--Main layout-->