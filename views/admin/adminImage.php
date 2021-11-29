<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li>Admin</li>
      <li>Image</li>
    </ul>
    <a href="/cms/blog/add/" class="button blue">
      <span class="icon"><i class="mdi mdi-credit-card-outline"></i></span>
      <span>Add Image</span>
    </a>
  </div>
</section>
<section class="section main-section">
  <div class="row justify-content-around">
    <div class="col-md-4 col-lg-3">
      <!-- ====================================== -->
      <?php foreach ($data['data'] as $row) { ?>
        <div class="card">
          <img src="<?php echo ($row['imageURL']); ?>" class="w-100 shadow-1-strong rounded mb-4" alt="" />
          <div class="card-body">
            <a href="#!" class="button red">Delete</a>
          </div>
        </div>
      <?php } ?>
      <!-- ======================================== -->
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
  function deleteID(id) {
    modal.style.display = "block";
    ID = id;
  }

  function cancel() {
    modal.style.display = "none";
  }
</script>