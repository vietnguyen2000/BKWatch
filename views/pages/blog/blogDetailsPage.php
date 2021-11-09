<style>
  <?php
  include 'blogPage.css';
  ?>
</style>
<div class=".container">
  <?php
  $record = $data['data'];
  $blog_title_item = $record['title'];
  $blog_img_banner = [];
  foreach ($record['img'] as $key => $value) {
    // print_r($value);
    array_push($blog_img_banner, $value['blogImgURL']);
  }
  // print_r($record);
  require(realpath($_SERVER["DOCUMENT_ROOT"]) . '/views/components/blog/banner.php');
  ?>
</div>

<!--Main layout-->
<main class="my-5">
  <div class="container">
    <p>
      <?php
      $id = $data['id'];
      $blog_detail_content = $record['content'];
      $blog_detail_date = $record['updatedAt'];
      $blog_detail_author = $record['userFullname'];
      $blog_detail_commentCount = count($record['cmt']);
      echo $blog_detail_content;
      ?>
    </p>
    <div>
      <?php
      $blog_url = '/blog';
      $addCommentAction = $blog_url . "/" . $id . "/comment";
      $cmts = array_reverse($record['cmt']);
      echo "<hr />";
      echo "<h5>Có " . count($cmts) . " bình luận cho bài viết của " . $record['userFullname'] . "</h5>";
      $i = 0;
      foreach ($cmts as $itemCmt) {
        $comment['userAvatarURL'] = $itemCmt['userCmtAvt'];
        $comment['userName'] = $itemCmt['userCmtFullname'];
        $comment['rate'] = $itemCmt['userCmtRating'];
        $comment['date'] = $itemCmt['userCmtTime'];
        $comment['content'] = $itemCmt['userCmtContent'];
        require realpath($_SERVER["DOCUMENT_ROOT"]) . '/views/components/comments/commentView.php';
      }
      require realpath($_SERVER["DOCUMENT_ROOT"]) . '/views/components/comments/addComment.php';

      ?>
    </div>
  </div>
</main>
<!--Main layout-->