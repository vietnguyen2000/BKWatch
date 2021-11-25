<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>

<?php if (isset($_SESSION['user']) && !$_SESSION['isRemembered']) { ?>
  <script>
    setTimeout(() => {
      alert('Your session is out of time! Please login again!')
      $.get('session-destroy')
      location.reload()
    }, <?= $session_time * 1000 ?>)
  </script>
<?php } ?>

<script>
  function addToCart(productId, productTitle) {
    <?php if (!isset($_SESSION['user'])) { ?>
      window.location.href = "<?= ROOT_URL . '/login' ?>"
      return
    <?php } else { ?>
      $.post('/cart/add', {
        productId
      })
      $.showNotification({
        type: "primary",
        body: "Bạn đã thêm \"" + productTitle + "\" vào giỏ hàng thành công",
        duration: 3000,
        direction: 'append'
      })
      $('.cart-badge').each((index, e) => {
        e.innerHTML = parseInt(e.innerHTML) + 1
      })
      $('.cart-badge').show()
    <?php } ?>
  }
</script>

<script>
  $('.momentFromNow').each((index, e) => {
    e.innerHTML = moment(e.innerHTML, "YYYY-MM-DD hh:mm:ss").fromNow()
  })
</script>
</body>

</html>