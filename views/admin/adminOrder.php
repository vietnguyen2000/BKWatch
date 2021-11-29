<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li>Admin</li>
      <li>Order</li>
    </ul>
  </div>
</section>


  <section class="section main-section">
    <div class="card has-table">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
          Order
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
            <th>User Full Name</th>
            <th>Total</th>
            <!-- <th>Order Status</th> -->
            <th>Updated At</th>
            <th>Order Status</th>
            <th>Transaction No</th>
            <th></th>
          </tr>
          </thead>
          <tbody>
          <?php  foreach ($data['data'] as $row) {?>
            <tr>
                
                <td data-label="ID"><?php echo($row["id"]); ?></td>
                <td data-label="User Full name"><?php echo($row["userFullname"]); ?></td>
                <td data-label="Total"><?php echo($row["total"]); ?></td>
                <td data-label="Updated At">
                <small class="text-gray-500"><?php echo($row["updatedAt"]); ?></small>
                </td>
                <td data-label="Status">
                  <div class="field-body">
                    <div class="field grouped multiline">
                      <div class="control">
                        <label class="radio">
                          <input type="radio" name="orderStatus<?php echo($row["id"]); ?>" value="0" <?php if ($row["orderStatus"] == 0) {echo 'checked';}?>>
                          <span class="check"></span>
                          <span class="control-label">0</span>
                        </label>
                      </div>
                      <div class="control">
                        <label class="radio">
                          <input type="radio" name="orderStatus<?php echo($row["id"]); ?>" value="1" <?php if ($row["orderStatus"] == 1) {echo 'checked';}?>>
                          <span class="check"></span>
                          <span class="control-label">1</span>
                        </label>
                      </div>
                      <div class="control">
                        <label class="radio">
                          <input type="radio" name="orderStatus<?php echo($row["id"]); ?>" value="2" <?php if ($row["orderStatus"] == 2) {echo 'checked';}?>>
                          <span class="check"></span>
                          <span class="control-label">2</span>
                        </label>
                      </div>
                      <div class="control">
                        <label class="radio">
                          <input type="radio" name="orderStatus<?php echo($row["id"]); ?>" value="3" <?php if ($row["orderStatus"] == 3) {echo 'checked';}?>>
                          <span class="check"></span>
                          <span class="control-label">3</span>
                        </label>
                      </div>
                    </div>
                  </div>
                </td>
                <td data-label="Transaction No"><?php echo($row["transactionNo"]); ?></td>
                <td class="actions-cell">
                  <form form action="" method="post">
                    <div class="buttons right nowrap">
                        <button class="button small green --jb-modal" data-target="sample-modal" type="button" onclick="updateID('<?php echo($row["id"]); ?>')">
                        <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
                        </button>
                    </div>
                  </form>
                </td>
            </tr>
          <?php }?>
          </tbody>
        </table>
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
      <p>PLEASE CONFIRM AGAIN TO <b>UPDATE</b> IT.</p>
    </section>
    <footer class="modal-card-foot">
      <button class="button --jb-modal-close" onclick="cancel()">Cancel</button>
      <button class="button blue --jb-modal-close" onclick="updateOrder()">Confirm</button>
    </footer>
  </div>
</div>

<script>
  
  var ID = 0;
  var modal = document.getElementById("sample-modal-2");
  
  // When the user clicks the button, open the modal 
  function updateID(id){
    modal.style.display = "block";
    ID = id;
    return true;
  }
  function updateOrder(){
    var nameID = "orderStatus" + ID;
    var statusOrder = $('input[name='+ nameID+']:checked').val();
    // var statusOrder = document.getElementById("orderStatus" + ID);
    console.log(statusOrder);
    $.post('/cmsOrder/update', {
          ID, statusOrder
        })
    $.showNotification({
      type: "primary",
      body: "Bạn đã cập nhật thành công",
      duration: 1000,
      direction: 'append'
    })
    cancel();
    return true;
  }
  function cancel(){
    modal.style.display = "none";
    return true;
  }
  
</script>

<script>
  $(document).ready(function () {
      $('#table').DataTable();
  });
</script>