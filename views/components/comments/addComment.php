<style>
  .rate-popover {
    color: #c4c4c4;
  }

  .oneStar {
    color: #3d381c;
  }

  .twoStars {
    color: #6d6126;
  }

  .threeStars {

    color: #c2aa36;
  }

  .fourStars {
    color: #e2c327;
  }

  .fiveStars {
    color: #f3cb06;
  }
</style>

<div class="mb-3">
  <span id="rateMe">
    <a href="#!"><i class="fas fa-star py-2 px-1 rate-popover" data-rate-index="0" data-html="true" data-toggle="popover" data-placement="top" title="Very bad"></i> </a>
    <a href="#!"><i class="fas fa-star py-2 px-1 rate-popover" data-rate-index="1" data-html="true" data-toggle="popover" data-placement="top" title="Poor"></i> </a>
    <a href="#!"><i class="fas fa-star py-2 px-1 rate-popover" data-rate-index="2" data-html="true" data-toggle="popover" data-placement="top" title="OK"></i> </a>
    <a href="#!"><i class="fas fa-star py-2 px-1 rate-popover" data-rate-index="3" data-html="true" data-toggle="popover" data-placement="top" title="Good"></i> </a>
    <a href="#!"><i class="fas fa-star py-2 px-1 rate-popover" data-rate-index="4" data-html="true" data-toggle="popover" data-placement="top" title="Excellent"></i> </a>
  </span>
</div>
<div>
  <!-- Your review -->
  <div class="form-outline">
    <textarea class="form-control" id="textAreaExample" rows="4" name="content" form="addComment"></textarea>
    <label class="form-label" for="textAreaExample">Bình luận</label>
  </div>
  <div class="my-2 align-self-end">
    <form action="<?= $addCommentAction ?>" method="post" id="addComment">
      <input type="number" id="addCommentRate" name="rate" hidden />
      <button type="submit" class="btn btn-primary">Thêm bình luận</button>
    </form>
  </div>
</div>


<script>
  var $stars;
  var currentStar = 5;

  jQuery(document).ready(function($) {
    $stars = $('.rate-popover');

    $stars.on('mouseover', function() {
      var index = $(this).attr('data-rate-index');
      markStarsAsActive(index);
    });

    $stars.on('mouseout', function() {
      markStarsAsActive(currentStar - 1);
    })

    $stars.on('click', function() {
      var index = $(this).attr('data-rate-index');
      markStarsAsActive(index);
      currentStar = parseInt(index) + 1;
    })

    function markStarsAsActive(index) {
      index = parseInt(index)
      unmarkActive();
      $('#addCommentRate').val(index + 1)
      for (var i = 0; i <= index; i++) {
        switch (index) {
          case 0:
            $($stars.get(i)).addClass('oneStar');
            break;
          case 1:
            $($stars.get(i)).addClass('twoStars');
            break;
          case 2:
            $($stars.get(i)).addClass('threeStars');
            break;
          case 3:
            $($stars.get(i)).addClass('fourStars');
            break;
          case 4:
            $($stars.get(i)).addClass('fiveStars');
            break;
        }
      }
    }

    function unmarkActive() {
      $stars.removeClass('oneStar twoStars threeStars fourStars fiveStars');
    }
    markStarsAsActive(currentStar - 1);
  });
</script>