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

<script>
  addFastLoad()

  function addFastLoad() {
    $('a[href]').each((index, elem) => {
      let url = $(elem).attr('href')
      if (url[0] != '/') return
      $(elem).off('click')
      $(elem).on('click', (e) => {
        e.stopPropagation()
        e.preventDefault()

        addOverlayLoading()
        fastGet(url)

      })
    })
  }

  function fastGet(url) {
    let correctUrl = url
    if (url.indexOf('?') >= 0) {
      correctUrl += "&onlyBody=yes";
    } else {
      correctUrl += "?onlyBody=yes";
    }
    $.get(correctUrl, (data) => {
      $('#main-body *').remove()
      $('#main-body').append(data)
      window.history.pushState(document.title, document.title, url)
      updateNav()
      addFastLoad()
    })
  }


  function updateNav() {
    const classActive = 'header-nav-item-active'
    $('a.header-nav-item').removeClass(classActive)

    if (location.pathname == '/') {
      $('#nav-').addClass(classActive)
    } else if (location.pathname.indexOf('/intro') >= 0) {
      $('#nav-intro').addClass(classActive)
    } else if (location.pathname.indexOf('/watch') >= 0) {
      $('#nav-watch').addClass(classActive)
    } else if (location.pathname.indexOf('/blog') >= 0) {
      $('#nav-blog').addClass(classActive)
    } else if (location.pathname.indexOf('/contact') >= 0) {
      $('#nav-contact').addClass(classActive)
    }

  }

  function addOverlayLoading() {
    $('#main-body').prepend(`<div style="
    position: absolute;
    z-index: 100;
    width: 100%;
    height: ${$('#main-body').height()}px;
    background: rgba(0, 0, 0, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
"><div class="spinner-border" role="status" style="
    /* transform: translate(10px, 10px); */
    /* x: 50%; */
">
  <span class="visually-hidden">Loading...</span>
</div></div>`)
  }
</script>
</body>

</html>