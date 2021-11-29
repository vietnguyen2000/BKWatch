<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li>Admin</li>
      <li>Product</li>
    </ul>
    <a href="/cmsAddProduct" class="button blue">
      <span class="icon"><i class="mdi mdi-credit-card-outline"></i></span>
      <span>Add Product</span>
    </a>
  </div>
</section>


  <section class="section main-section">
    <div class="card has-table">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
          Products
        </p>
        <a href="#" class="card-header-icon">
          <span class="icon"><i class="mdi mdi-reload"></i></span>
        </a>
      </header>
      <div class="card-content">
        <table id="table">
          <thead>
          <tr>
            <th>Title</th>
            <th>Product code</th>
            <th>Content</th>
            <th>Tag</th>
            <th>Price</th>
            <th>Material</th>
            <th>Glass</th>
            <th>Color</th>
            <th>Create at</th>
            <th></th>
          </tr>
          </thead>
          <tbody>
          <?php  foreach ($data['data'] as $row) {?>
            <tr id ='row-<?php echo($row["id"]); ?>'>
                
                <td data-label="Title"><?php echo($row["title"]); ?></td>
                <td data-label="Code"><?php echo($row["productCode"]); ?></td>
                <td data-label="Content"><?= strlen($row['content']) > 17 ? mb_substr($row['content'], 0, 17) . "..." : $row['content'] ?></td>
                <td data-label="Tag"><?php echo($row["tag"]); ?></td>
                <td data-label="Price"><?php echo($row["price"]); ?></td>
                <td data-label="Material"><?php echo($row["material"]); ?></td>
                <td data-label="Glass"><?php echo($row["glass"]); ?></td>
                <td data-label="Color"><?php echo($row["color"]); ?></td>
                <td data-label="Created">
                <small class="text-gray-500"><?php echo($row["createdAt"]); ?></small>
                </td>
                <td class="actions-cell">
                  <form form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <div class="buttons right nowrap">
                      <a href="/cmsUpdateProduct/<?php echo($row["id"]); ?>">
                        <button class="button small green --jb-modal"  data-target="sample-modal-2" type="button">
                        <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
                        </button>
                      </a>
                        <button class="button small red --jb-modal" data-target="sample-modal" type="button" onclick="deleteID('<?php echo($row["id"]); ?>')">
                        <span class="icon"><i class="mdi mdi-trash-can"></i></span>
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
      <p>PLEASE CONFIRM AGAIN TO <b>DELETE</b> IT.</p>
    </section>
    <footer class="modal-card-foot">
      <button class="button --jb-modal-close" onclick="cancel()">Cancel</button>
      <button class="button blue --jb-modal-close" onclick="deleteProduct()">Confirm</button>
    </footer>
  </div>
</div>




<script>
  
  var ID = 0;
  var modal = document.getElementById("sample-modal-2");
  // When the user clicks the button, open the modal 
  function deleteID(id){
    modal.style.display = "block";
    ID = id;
  }
  function cancel(){
    modal.style.display = "none";
  }
  function deleteProduct(){
    // var statusOrder = document.getElementById("orderStatus" + ID);
    $(`tr[id="row-${ID}"]`).remove();
    console.log(ID);
    $.post('/cmsProduct/delete', {
          ID
        })
    $.showNotification({
      type: "primary",
      body: "Bạn đã xóa thành công",
      duration: 10,
      direction: 'append'
    })
    cancel();
    return true;
  }
</script>

<script>
  $(document).ready(function () {
      $('#table').DataTable();
  });
</script>