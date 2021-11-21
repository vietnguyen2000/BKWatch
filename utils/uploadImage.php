<script>
  function upload(imageFiles, callBack) {
    var fd = new FormData();
    var files = imageFiles;
    // Check file selected or not
    if (files.length > 0) {
      fd.append('image', files[0]);
      $.ajax({
        url: <?= $upload_image_url ?>,
        type: 'post',
        data: fd,
        contentType: false,
        processData: false,
        success: function(response) {
          if (response.success != 0) {
            callBack(response.message)
          } else {
            // alert('file not uploaded');
            throw Error('Image not uploaded!')
          }
        },
      });
    } else {
      throw Error('Image not found!')
    }
  }
</script>