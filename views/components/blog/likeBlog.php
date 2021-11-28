<script>
  function like(elem) {
    const id = $(elem).attr('blogId')
    $.get(`/blog/${id}/like`, (data) => {
      if (data.success) {
        const p = $(elem).children('p')
        p.html(parseInt(p.html()) + 1)
      }
    })
  }
</script>