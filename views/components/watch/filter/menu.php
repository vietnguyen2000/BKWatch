<div>
  <div style="padding: 0 0 20 0;">
    <div class="row">
      <div class="col-9" style="display: flex; align-items: center; justify-content: flex-start;">
        <h6>Thể loại</h6>
      </div>
      <div class="col-3" style="display: flex; align-items: center; justify-content: flex-end;">
        <button class="btn btn-dark" style="padding: 5;" data-mdb-toggle="collapse" data-mdb-target="#collapseCategory" aria-expanded="false" aria-controls="collapseCategory">
          <i class="fas fa-align-justify"></i>
        </button>
      </div>
    </div>
    <!-- Collapsed content -->
    <div class="collapse mt-2" id="collapseCategory">
      <?php
      $dataTest = [
        0 => 'Analog',
        1 => 'Digital',
        2 => 'Automatic'
      ];
      foreach ($dataTest as $key => $value) {
        echo '<div class="form-check">';
        echo '<input class="form-check-input" type="checkbox" value="" id="watchPageFlex' . $value . '" name="watchPageFlex' . $value . '" />';
        echo '<label class="form-check-label" for="watchPageFlex' . $value . '" name="watchPageFlex' . $value . '">';
        echo $value;
        echo '</label>';
        echo '</div>';
      }
      ?>
      <!-- Default checkbox -->
      <!-- <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
        <label class="form-check-label" for="flexCheckDefault">
          Default checkbox
        </label>
      </div> -->

      <!-- Checked checkbox -->
      <!-- <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked />
        <label class="form-check-label" for="flexCheckChecked">
          Checked checkbox
        </label>
      </div> -->
    </div>
  </div>
  </hr>
  <div class="row">
    <div class="col-9" style="display: flex; align-items: center; justify-content: flex-start;">
      <h6>Giá</h6>
    </div>
    <div class="col-3" style="display: flex; align-items: center; justify-content: flex-end;">
      <button class="btn btn-dark" style="padding: 5;" data-mdb-toggle="collapse" data-mdb-target="#collapseCategory" aria-expanded="false" aria-controls="collapseCategory">
        <i class="fas fa-align-justify"></i>
      </button>
    </div>
  </div>

</div>