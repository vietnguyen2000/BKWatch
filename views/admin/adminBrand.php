<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li>Admin</li>
      <li>Brand</li>
    </ul>
  </div>
</section>


<section class="section main-section">
  <div class="card has-table">
    <header class="card-header">
      <p class="card-header-title">
        <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
        Brand
      </p>
      <a href="#" class="card-header-icon">
        <span class="icon"><i class="mdi mdi-reload"></i></span>
      </a>
    </header>
    <div class="card-content">
      <table id="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($data['data'] as $row) { ?>
            <tr id="row-<?= $row["id"] ?>">
              <td data-label="ID"><?= $row["id"] ?></td>
              <td data-label="Title">
                <input id="title-<?= $row["id"] ?>" class="input" type="text" value="<?= $row['title'] ?>" minlength="5" maxlength="40" />
              </td>
              <td class="actions-cell">
                <div class="buttons right nowrap">
                  <button class="button small green --jb-modal" data-target="sample-modal" type="button" onclick="updateID('<?= $row['id']; ?>')">
                    <span class="icon"><i class="mdi mdi-content-save-outline"></i></span>
                  </button>

                  <button class="button small red --jb-modal" data-target="sample-modal" type="button" onclick="deleteID('<?= ($row['id']); ?>')">
                    <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                  </button>
                </div>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

  <section class="is-hero-bar mt-3">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
      <h1 class="title">
        Add New
      </h1>
    </div>
  </section>
  <div class="card mb-6">
    <div class="card-content">
      <div class="field">
        <label class="label">Product Title</label>
        <div class="field-body">
          <div class="field d-inline">
            <div class="control icons-left icons-right">
              <input id='title-new' class="input" type="name" name="productTitle" required>
              <span class="icon left"><i class="mdi mdi-mail"></i></span>
            </div>
          </div>
          <p class="help">
            This field is required
          </p>
        </div>
      </div>
      <button class="button big green --jb-modal" type="button" onclick="addNew()">
        Add
      </button>
    </div>
  </div>
</section>



<div id="sample-modal-2" class="modal">
  <div class="modal-background --jb-modal-close" onclick="cancel()"></div>
  <div class="modal-card" style="margin-top: 40px;">
    <header class="modal-card-head">
      <p class="modal-card-title">UPDATE IT?</p>
    </header>
    <section class="modal-card-body">
      <p>PLEASE CONFIRM AGAIN TO <b>UPDATE</b> IT.</p>
    </section>
    <footer class="modal-card-foot">
      <button class="button --jb-modal-close" onclick="cancel()">Cancel</button>
      <button class="button blue --jb-modal-close" onclick="updateBrand()">Confirm</button>
    </footer>
  </div>
</div>

<div id="sample-modal" class="modal">
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
      <button class="button blue --jb-modal-close" onclick="deleteBrand()">Confirm</button>
    </footer>
  </div>
</div>

<script>
  var ID = 0;
  var modal1 = document.getElementById("sample-modal");
  var modal2 = document.getElementById("sample-modal-2");

  // When the user clicks the button, open the modal 
  function updateID(id) {
    modal2.style.display = "block";
    ID = id;
    return true;
  }

  function deleteID(id) {
    modal1.style.display = "block";
    ID = id;
    return true;
  }


  function updateBrand() {
    var title = $(`input[id="title-${ID}"]`).val();
    $.post(`/cms/brand/update/${ID}`, {
      ID,
      title
    }, () => {
      toastsHandler.createToast({
        type: "success",
        icon: "check-circle",
        message: "Bạn đã cập nhật thành công",
        duration: 3000,
      });
    })

    cancel();
    return true;
  }

  function deleteBrand() {
    var title = $(`input[id="title-${ID}"]`).val();
    $.post(`/cms/brand/delete/${ID}`, {}, () => {
      toastsHandler.createToast({
        type: "success",
        icon: "check-circle",
        message: "Bạn đã xóa thành công",
        duration: 3000,
      });
    })

    $(`#row-${ID}`).remove()

    cancel();
    return true;
  }

  function addNew() {
    var title = $(`input[id="title-new"]`).val();
    $.post(`/cms/brand/add`, {
      title
    }, () => {
      toastsHandler.createToast({
        type: "success",
        icon: "check-circle",
        message: "Bạn đã thêm thành công",
        duration: 3000,
      });
      fastGet('/cms/brand', false, true)
    })
    return true;
  }

  function cancel() {
    modal1.style.display = "none";
    modal2.style.display = "none";
    return true;
  }
</script>

<script>
  $(document).ready(function() {
    $('#table').DataTable();
  });
</script>