<link href="https://cdn.jsdelivr.net/npm/suneditor@latest/dist/css/suneditor.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/suneditor@latest/dist/suneditor.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/suneditor@latest/src/lang/ko.js"></script>

<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li>Admin</li>
      <li>Blogs</li>
    </ul>
  </div>
</section>

<section class="is-hero-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <h1 class="title">
      Add Blog
    </h1>
  </div>
</section>

<section class="section main-section">
  <div class="card mb-6">
    <div class="card-content">
      <form method="post">
        <div class="field">
          <label class="label">Blog Title</label>
          <div class="field-body">
            <div class="field">
              <div class="control icons-left icons-right">
                <input class="input" type="name" name="blogTitle" required value="<?= (isset($data['data'])) ? $data['data']['title'] : '' ?>">
                <span class="icon left"><i class="mdi mdi-mail"></i></span>
              </div>
            </div>
          </div>
          <p class="help">
            This field is required
          </p>
        </div>
        <hr>

        <div class="field">
          <label class="label">Content</label>
          <div class="control">
            <textarea id="content"><?= (isset($data['data'])) ? $data['data']['content'] : '' ?></textarea>
          </div>
          <p class="help">
            This field is required
          </p>
        </div>
        <hr>
        <div class="field">
          <div class="field">
            <label class="label">Is Hot</label>
            <div class="field-body">
              <div class="field">
                <label class="switch inRow">
                  <input type="checkbox" value="false" name="isHot" required>
                  <span class="check"></span>
                  <span class="control-label">Hot</span>
                </label>
                <p class="inRow"> Count Like: 0</p>
                <p class="inRow"> Count View: 0</p>
                <p class="inRow"> Create at: <?php echo date('Y-m-d'); ?></p>
                <p> Update at: <?php echo date('Y-m-d'); ?></p>
              </div>
            </div>
          </div>
        </div>
        <hr>
      </form>
    </div>
  </div>
</section>


<section class="section main-section">
  <div class="card has-table">
    <header class="card-header">
      <p class="card-header-title">
        <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
        Blog's Comment
      </p>
      <a href="#" class="card-header-icon">
        <span class="icon"><i class="mdi mdi-reload"></i></span>
      </a>
    </header>
    <div class="card-content">
      <table>
        <thead>
          <tr>
            <th>User's Name</th>
            <th>Content</th>
            <th>Rating</th>
            <th>Update at</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($data['comment'] as $row) { ?>
            <tr>
              <td data-label="userCmtFullname"><?php echo ($row["userCmtFullname"]); ?></td>
              <td data-label="userCmtContent"><?php echo ($row["userCmtContent"]); ?></td>
              <td data-label="userCmtRating" class="progress-cell">
                <progress max="5" value="<?php echo ($row["userCmtRating"]); ?>"><?php echo ($row["userCmtRating"]); ?></progress>
              </td>
              <td data-label="userCmtTime">
                <small class="text-gray-500"><?php echo ($row["userCmtTime"]); ?></small>
              </td>
              <td class="actions-cell">
                <form form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                  <div class="buttons right nowrap">
                    <button class="button small red --jb-modal" data-target="sample-modal" type="button" onclick="deleteID('<?php echo ($row['cmtId']); ?>')">
                      <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                    </button>
                  </div>
                </form>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
      <div class="table-pagination">
        <div class="flex items-center justify-between">
          <div class="buttons">
            <button type="button" class="button">
              << </button>
                <button type="button" class="button active">1</button>
                <button type="button" class="button">>></button>
          </div>
          <small>Page 1 of 1</small>
        </div>
      </div>
    </div>
</section>
<!-- ===================================================== -->
<section class="section main-section">
  <div class="card has-table">
    <header class="card-header">
      <p class="card-header-title">
        <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
        Blog's Image
      </p>
      <a class="card-header-icon">
      <div class="field">
        <button id="btn-upload-image" class="button blue">
          Upload
        </button>
        <input type="file" accept="image/png, image/gif, image/jpeg" id="input-upload-image" hidden>
      </div>
      </a>
    </header>
    <div class="card-content">
      <table>
        <thead>
          <tr>
            <th>Image</th>
            <th>Url</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!$data['add']) {
            foreach ($data['imageList'] as $row) { ?>
              <tr>
                <td data-label="Image">
                  <img src="<?php echo ($row['imageURL']); ?>" alt="Image" style="height:70px; wight:auto;">
                </td>
                <td data-label="imageURLs"><?php echo ($row['imageURL']); ?></td>
                <td class="actions-cell" data-label="Delete">
                  <form form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="buttons right nowrap">
                      <button class="button small red --jb-modal" data-target="sample-modal" type="button" onclick="deleteID('<?php echo ($row['id']); ?>')">
                        <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                      </button>
                    </div>
                  </form>
                </td>
              </tr>
          <?php }
          } ?>
        </tbody>
      </table>
      <div class="table-pagination">
        <div class="flex items-center justify-between">
          <div class="buttons">
            <button type="button" class="button">
              <<</button>
                <button type="button" class="button active">1</button>
                <button type="button" class="button">>></button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ===================================================== -->
<section class="section main-section">
  <div class="card mb-6">
    <div class="card-content">
      <div class="field grouped">
        <div class="control">
          <button type="save" class="button green" onclick="add()">
            Save
          </button>
        </div>
        <div class="control">
          <button type="cancel" class="button red">
            Cancel
          </button>
        </div>
      </div>
    </div>
  </div>
</section>


<div id="sample-modal-2" class="modal">
  <div class="modal-background --jb-modal-close" onclick="cancel()"></div>
  <div class="modal-card" style="margin-top: 40px;">
    <header class="modal-card-head">
      <p class="modal-card-title">DELETE IT?</p>
    </header>
    <section class="modal-card-body">
      <p>PLEASE CONFIRM AGAIN TO <b>DELETE</b> IT.</p>
    </section>
    <footer class="modal-card-foot">
      <button class="button --jb-modal-close" onclick="cancel()">Cancel</button>
      <button class="button blue --jb-modal-close">Confirm</button>
    </footer>
  </div>
</div>

<script>
  CKEDITOR.replace('blogContent');
</script>
<script>
  var ID = 0;
  var modal = document.getElementById("sample-modal-2");
  // When the user clicks the button, open the modal 
  function deleteID(id) {
    modal.style.display = "block";
    ID = id;
  }

  function cancel() {
    modal.style.display = "none";
  }

  const editor = SUNEDITOR.create((document.getElementById('content')), {
    lang: SUNEDITOR_LANG['en'],
    width: '100%',
    height: 500,
    buttonList: [
      ['undo', 'redo'],
      ['fontSize', 'formatBlock'],
      ['paragraphStyle', 'blockquote'],
      ['bold', 'underline', 'italic', 'strike', 'subscript', 'superscript'],
      ['fontColor', 'hiliteColor', 'textStyle'],
      ['removeFormat'],
      ['outdent', 'indent'],
      ['align', 'horizontalRule', 'list', 'lineHeight'],
      ['link', 'image'],
      ['fullScreen', 'showBlocks', 'codeView'],
      ['preview'],
    ],
  });
</script>


<script>
  let listNewImages = []
  let listRemovedImages = []
  $('#input-upload-image').on('change', e => {
    if (e.target.files && e.target.files.length > 0) {
      e.preventDefault();
      e.stopPropagation();
      uploadProfileImage(e.target.files[0])
      $('#input-upload-image').val('')
    }
  })

  $('#btn-upload-image').click(() => {
    $('#input-upload-image').click()
  })

  function deleteImageRow(id) {
    $(`tr[id="product-image-${id}"]`).remove()
    if (listNewImages.indexOf(id) > 0) {
      listNewImages = listNewImages.filter(x => x != id)
    } else [
      listRemovedImages.push(id)
    ]
  }

  async function uploadProfileImage(file) {
    try {
      const url = await uploadImageAsync(file)
      listNewImages.push(url)
      $('#table-images-body').append(`
      <tr id="product-image-${url}">
        <td data-label="Image">
          <img src="${url}" alt="Image" style="height:70px; wight:auto;">
        </td>
        <td data-label="imageURLs">${url}</td>
        <td class="actions-cell" data-label="Delete">
          <form form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <div class="buttons right nowrap">
                <button class="button small red --jb-modal" data-target="sample-modal" type="button" onclick="deleteImageRow('${url}')">
                <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                </button>
            </div>
          </form>
        </td>
      </tr>`)
    } catch (error) {
      console.error(error)
    }
  }
</script>

<?php require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/utils/uploadImage.php') ?>