<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li>Admin</li>
      <li>Users</li>
    </ul>
  </div>
</section>


<section class="section main-section">
  <div class="card has-table">
    <header class="card-header">
      <p class="card-header-title">
        <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
        User
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
            <th>User Name</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Role</th>
            <th>Create at</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($data['data'] as $row) { ?>
            <tr id="user-<?php echo ($row["id"]); ?>">
              <td data-label="ID"><?php echo ($row["id"]); ?></td>
              <td data-label="User Name"><?php echo ($row["username"]); ?></td>
              <td data-label="FName"><?php echo ($row["fullname"]); ?></td>
              <td data-label="Email"><?php echo ($row["email"]); ?></td>
              <td data-label="Phone"><?php echo ($row["phoneNumber"]); ?></td>
              <td data-label="Role">
                <form action="">
                  <div class="select">
                    <select class="input" type="number" name="userRole<?php echo ($row["id"]); ?>" required>
                      <option value="0" <?= ($row["role"] == 0) ? 'selected' : '' ?>> Member</option>
                      <option value="1" <?= ($row["role"] == 1) ? 'selected' : '' ?>> Admin</option>
                    </select>
                  </div>
                </form>
              </td>
              <td data-label="Created">
                <small class="text-gray-500"><?php echo ($row["createdAt"]); ?></small>
              </td>
              <td class="actions-cell">
                <form form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                  <div class="buttons right nowrap">
                    <button class="button small green --jb-modal" data-target="sample-modal-2" type="button" onclick="updateID('<?php echo ($row["id"]); ?>')">
                      <span class="icon"><i class="mdi mdi-content-save-outline"></i></span>
                    </button>
                    <button class="button small red --jb-modal" data-target="sample-modal" type="button" onclick="deleteID('<?php echo ($row["id"]); ?>')">
                      <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                    </button>
                  </div>
                </form>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</section>



<div id="sample-modal-1" class="modal">
  <div class="modal-background --jb-modal-close" onclick="cancel1()"></div>
  <div class="modal-card" style="margin-top: 40px;">
    <header class="modal-card-head">
      <p class="modal-card-title">UPDATE IT?</p>
    </header>
    <section class="modal-card-body">
      <p>PLEASE CONFIRM AGAIN TO <b>UPDATE</b> IT.</p>
    </section>
    <footer class="modal-card-foot">
      <button class="button --jb-modal-close" onclick="cancel1()">Cancel</button>
      <button class="button blue --jb-modal-close" onclick="Update()">Confirm</button>
    </footer>
  </div>
</div>

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
      <button class="button blue --jb-modal-close" onclick="Delete()">Confirm</button>
    </footer>
  </div>
</div>



<script>
  var ID = 0;
  var modal1 = document.getElementById("sample-modal-1");
  var modal = document.getElementById("sample-modal-2");
  // When the user clicks the button, open the modal 
  function deleteID(id) {
    modal.style.display = "block";
    ID = id;
  }

  function updateID(id) {
    modal1.style.display = "block";
    ID = id;
  }

  function cancel() {
    modal.style.display = "none";
  }

  function cancel1() {
    modal1.style.display = "none";
  }

  function Update() {
    var role = document.getElementsByName("userRole" + ID)[0].value;
    console.log(ID, role);
    $.post('/cmsUser/update', {
      ID,
      role
    }, () => {
      toastsHandler.createToast({
        type: "success",
        icon: "check-circle",
        message: "Bạn đã cập nhật thành công",
        duration: 3000,
      })
    })
    cancel1();
    return true;
  }

  function Delete() {
    $(`tr[id="user-${ID}"]`).remove();
    $.post('/cmsUser/delete', {
      ID
    }, () => {
      toastsHandler.createToast({
        type: "success",
        icon: "check-circle",
        message: "Bạn đã xóa thành công",
        duration: 3000,
      })
    })
    cancel();
    return true;
  }
  $(document).ready(function() {
    $('#table').DataTable();
  });
</script>