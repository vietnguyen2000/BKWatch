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
      $comment = [
        "userAvatarURL" => "https://static.wikia.nocookie.net/fairytail/images/c/ce/Natsu%27s_image.png",
        "userName" => "Natsu Dragneel",
        "rate" => 5,
        "date" => "2021-11-08 20:30:00",
        "content" => "blog này hay vcl!",
      ];
      $addCommentAction = "/blog" . "/" . $id;
      require realpath($_SERVER["DOCUMENT_ROOT"]) . '/views/components/comments/commentView.php';
      require realpath($_SERVER["DOCUMENT_ROOT"]) . '/views/components/comments/addComment.php';
      ?>
    </div>
  </div>
</main>
<!--Main layout-->