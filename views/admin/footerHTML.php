<script src="/assets/js/simple-toast.js"></script>
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

  function fastGet(url, isNewPage = true, force = false) {
    if (!force && url == location.pathname + location.search) return
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
  }


  function updateNav() {
    const classActive = 'active'
    $('.menu-list > li').removeClass(classActive)

    if (location.pathname == '/cms') {
      $('#cms').addClass(classActive)
    } else if (location.pathname.indexOf('/cms/blog') >= 0) {
      $('#cmsBlog').addClass(classActive)
    } else if (location.pathname.indexOf('/cms/product') >= 0) {
      $('#cmsProduct').addClass(classActive)
    } else if (location.pathname.indexOf('/cms/order') >= 0) {
      $('#cmsOrder').addClass(classActive)
    } else if (location.pathname.indexOf('/cms/brand') >= 0) {
      $('#cmsBrand').addClass(classActive)
    } else if (location.pathname.indexOf('/cms/category') >= 0) {
      $('#cmsCategory').addClass(classActive)
    } else if (location.pathname.indexOf('/cms/user') >= 0) {
      $('#cmsUser').addClass(classActive)
    }
  }

  function addOverlayLoading() {
    $('body').prepend(`<div id="overlay-loading" style="
    position: fixed;
    z-index: 100000;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    left: 0,
    top: 0,
"><div class="loader"></div></div>`)
  }

  function removeOverlayLoading() {
    $('#overlay-loading').remove()
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