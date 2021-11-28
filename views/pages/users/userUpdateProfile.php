<div class="container">
  <div style="margin: 50px 0;">
    <form action="/user/<?php echo $user['id'] ?>/update" id="user-update-form" method="POST">

      <h2>Thông tin cá nhân</h2>

      <div class="row">
        <div class="col-12 col-lg-3">
          <?php require(realpath($_SERVER["DOCUMENT_ROOT"]) . '/views/components/users/userGeneral.php'); ?>
        </div>


        <div class="card col-12 col-lg-9">
          <div class="card-body">
            <?php require(realpath($_SERVER["DOCUMENT_ROOT"]) . '/views/components/users/userUpdate.php'); ?>
          </div>
          <div class="card-footer">
            <div class="btn-group me-2 mb-2" role="group" aria-label="">
              <a href="#" class="btn btn-primary btn-submit" onClick="document.getElementById('user-update-form').submit()">Lưu</a>
            </div>
            <div class="btn-group me-2 mb-2" role="group" aria-label="">
              <a href="/me" class="btn btn-black">Huỷ</a>
            </div>
          </div>
        </div>
      </div>
  </div>
  </form>
</div>
<div id="uploadZone" hidden>
  <!-- Background image -->
  <div class="mask" style="background-color: rgba(0, 0, 0, 0.8);" onclick="hideUploadZone()">
    <div class="container d-flex align-items-center justify-content-center text-center h-100">
      <div class="card dropzone-container">
        <div class="card-body">
          <div class="dropzone" id="upload-profile-picture-dropzone" action="/image/upload">
            <input type="file" name="file" hidden />
          </div>
          <div id="uploadMsg"></div>
          <div class="card-footer">
            <input class="btn btn-success float-end" id="upload-image" type="submit" value="Tải lên">
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Background image -->
</div>

<script>
  Dropzone.options.uploadProfilePictureDropzone = { // camelized version of the `id`
    paramName: "file", // The name that will be used to transfer the file
    maxFiles: 1,
    parallelUploads: 1,
    addRemoveLinks: true,
    maxFilesize: 2, // MB
    thumbnailHeight: 250,
    thumbnailHeight: 250,
    resizeWidth: 250,
    resizeHeight: 250,
    thumbnailMethod: "contain",
    accept: function(file, done) {
      done();
    },
    maxfilesexceeded: function(file) {
      this.removeFile(file);
    }
  };

  function openUploadDropzone() {
    document.getElementById("uploadZone").removeAttribute("hidden");
  }

  function hideUploadZone() {
    document.getElementById('uploadZone').addEventListener('click', function(e) {
      this.style.removeProperty('hidden');
    });
    // document.getElementById("uploadZone").setAttribute("hidden", "");
  }

  $(document).ready(function() {
    document.getElementById("upload-image").addEventListener("click", function(event) {
      event.preventDefault();

      var dropzone = document.querySelector(".dropzone").dropzone;
      var files = dropzone.getAcceptedFiles();
      if (!(files && files.length > 0)) {
        document.querySelector("#uploadMsg").innerHTML = "Chọn ảnh";
        return;
      }
      var data;

      data = new FormData();
      data.append('image', files[0]);
      $.ajax({
        url: '/image/upload',
        data: data,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function(data) {
          document.getElementById('uploadMsg').innerHTML = "Cập nhật thành công";
          location.reload(); // reload
        },
        error: function(xhr, status, error) {
          document.getElementById('uploadMsg').innerHTML = xhr.responseText;
        }
      });
    });
  });
</script>