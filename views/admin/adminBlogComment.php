<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li>Admin</li>
      <li>Comment</li>
    </ul>
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
            <th>Blog Title</th>
            <th>User's Name</th>
            <th>Content</th>
            <th>Rating</th>
            <th>Update at</th>
            <th></th>
          </tr>
          </thead>
          <tbody>
          <?php  foreach ($data['data'] as $row) {?>
            <tr>
                
                <td data-label="blogTitle"><?php echo($row["blogTitle"]); ?></td>
                <td data-label="userCmtFullname"><?php echo($row["userCmtFullname"]); ?></td>
                <td data-label="userCmtContent"><?php echo($row["userCmtContent"]); ?></td>
                <td data-label="userCmtRating" class="progress-cell">
                  <progress max="5" value="<?php echo($row["userCmtRating"]); ?>"><?php echo($row["userCmtRating"]); ?></progress>
                </td>               
                <td data-label="userCmtTime">
                <small class="text-gray-500"><?php echo($row["userCmtTime"]); ?></small>
                </td>
                <td class="actions-cell">
                  <form form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <div class="buttons right nowrap">
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
        <div class="table-pagination">
          <div class="flex items-center justify-between">
            <div class="buttons">
              <button type="button" class="button"><<</button>
              <button type="button" class="button active">1</button>
              <button type="button" class="button">2</button>
              <button type="button" class="button">3</button>
              <button type="button" class="button">>></button>
            </div>
            <small>Page 1 of 3</small>
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
  
</script>


