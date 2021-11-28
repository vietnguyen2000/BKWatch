<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>


<script>
  function resetTimeOutSession() {
    <?php if (isset($_SESSION['user']) && !$_SESSION['isRemembered']) { ?>
      clearTimeout(window.sessionTimeout)
      window.sessionTimeout = setTimeout(() => {
        alert('Your session is out of time! Please login again!')
        $.get('session-destroy')
        location.reload()
      }, <?= $session_time * 1000 ?>)
    <?php } ?>
  }

  resetTimeOutSession()
</script>



<script>
  function addToCart(productId, productTitle) {
    <?php if (!isset($_SESSION['user'])) { ?>
      window.location.href = "<?= ROOT_URL . '/login' ?>"
      return
    <?php } else { ?>
      $.post('/cart/add', {
        productId
      }, () => {
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
      })
    <?php } ?>
  }

  function addToFavorite(productId) {
    <?php if (!isset($_SESSION['user'])) { ?>
      window.location.href = "<?= ROOT_URL . '/login' ?>"
      return
    <?php } else { ?>
      $.post('/favorite/add', {
        productId
      }, (data) => {
        if (data.success) {
          $('.wishlist-badge').each((index, e) => {
            e.innerHTML = parseInt(e.innerHTML) + 1
          })
          $('.wishlist-badge').show()

          $(`.heart-product-${productId}`).addClass('favorite-heart-active')
          $(`.heart-product-${productId} > i`).removeClass('far')
          $(`.heart-product-${productId} > i`).addClass('fas')
        } else {
          $('.wishlist-badge').each((index, e) => {
            e.innerHTML = parseInt(e.innerHTML) - 1
            if (e.innerHTML == '0') {
              $(e).hide()
            }
          })

          $(`.heart-product-${productId}`).removeClass('favorite-heart-active')
          $(`.heart-product-${productId} > i`).addClass('far')
          $(`.heart-product-${productId} > i`).removeClass('fas')
        }

      })

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

        fastGet(url)

      })
    })
  }

  function fastGet(url, isNewPage = true) {
    if (url == location.pathname + location.search) return
    resetTimeOutSession()
    addOverlayLoading()
    let correctUrl = url
    if (url.indexOf('?') >= 0) {
      correctUrl += "&onlyBody=yes";
    } else {
      correctUrl += "?onlyBody=yes";
    }
    $.get(correctUrl, (data) => {
      replaceNewData(data);
      if (isNewPage) {
        $('html,body').scrollTop(0);
        addState(data, url)
      } else {
        replaceState(data, url)
      }

    })
  }

  function addState(data, url) {
    window.history.pushState({
      data,
    }, document.title, url)
    updateNav()
  }

  function replaceState(data, url) {
    window.history.replaceState({
      data,
    }, document.title, url)
  }

  function replaceNewData(data) {
    $('#main-body').html(data)
    addFastLoad()
    removeOverlayLoading()
    initInput()
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
    $('body').prepend(`<div id="overlay-loading" style="
    position: fixed;
    z-index: 100;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    left: 0,
    top: 0,
"><div class="spinner-border text-primary" role="status">
  <span class="visually-hidden">Loading...</span>
</div></div>`)
  }

  function removeOverlayLoading() {
    $('#overlay-loading').remove()
  }

  function initInput() {
    document.querySelectorAll('.form-outline').forEach((formOutline) => {
      new mdb.Input(formOutline).init();
    });
  }

  function handleBack(data) {
    replaceNewData(data);
    updateNav()
  }

  window.onpopstate = function(event) {
    if (!event.state) return
    const {
      data = '',
    } = event.state || {}
    handleBack(data)
  };

  const data = $('#main-body').html()
  replaceState(data, location.pathname + location.search)
</script>
</body>

</html>