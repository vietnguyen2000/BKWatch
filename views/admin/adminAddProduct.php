<!-- =========================================================================== -->
<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li>Admin</li>
      <li>Products</li>
    </ul>
  </div>
</section>

<section class="is-hero-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <h1 class="title">
      Add Product
    </h1>
  </div>
</section>

  <section class="section main-section">

    <div class="card mb-6">
      <div class="card-content">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="flex-container">
          <!-- =========================================================================== Left -->
          <div class="flex-item-left">
            <div class="field">
              <label class="label">Product Title</label>
              <div class="field-body">
                <div class="field">
                  <div class="control icons-left icons-right">
                    <input class="input" type="name" name ="productTitle" required>
                    <span class="icon left"><i class="mdi mdi-mail"></i></span>
                  </div>
                </div>
              </div>
              <p class="help">
                This field is required
              </p>
            </div>
            
            <div class="field">
              <label class="label">Tag</label>
              <div class="control">
                <input class="input" type="text" placeholder="e.g. new, engine" name="productTag" required>
              </div>
            </div>

            <div class="field">
              <label class="label">Content</label>
              <div class="control">
                <textarea class="textarea" placeholder="Content of blog" name="productContent" required></textarea>
              </div>
              <p class="help">
                This field is required
              </p>
            </div>
            <div class="field">
              <label class="label">Product category</label>
              <div class="control">
                <div class="select">
                  <select>
                    <option>Apple Watch</option>
                    <option>Classical</option>
                    <option>Digital</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="field">
              <label class="label">Statistic</label>
              <div class="field-body">
                <p class="inRow"> Liked: 0</p>
                <p class="inRow"> Viewed: 0</p>
                <p class="inRow"> Created on: <?php echo date('Y-m-d'); ?></p>
                <p> Updated on: <?php echo date('Y-m-d'); ?></p>
              </div>
            </div>
            <div class="field">
              <div class="field">
                <label class="label">Other</label>
                <div class="field-body">
                    <div class="field" >
                    <label class="switch inRow">
                        <input type="checkbox" value="false" name="isHot" required>
                        <span class="check"></span>
                        <span class="control-label">Hot</span>
                    </label>
                    <label class="switch inRow">
                        <input type="checkbox" value="false" name="isNew" required>
                        <span class="check"></span>
                        <span class="control-label">New</span>
                    </label>
                    <label class="switch">
                        <input type="checkbox" value="false" name="isBestSale" required>
                        <span class="check"></span>
                        <span class="control-label">Best Sale</span>
                    </label>
                    </div>
                </div>
              </div>
              
              
            </div>
            <div class="field">
              <label class="label">Quantity</label>
              <div class="control">
                <input class="input" type="number" placeholder="9999999" name="productQuantity" required>
              </div>
            </div>
            <div class="field">
              <label class="label">Material</label>
              <div class="control">
                <input class="input" type="text" placeholder="Gold" name="productMaterial" required>
              </div>
            </div>
            <div class="field">
              <label class="label">Glass</label>
              <div class="control">
                <input class="input" type="text" placeholder="Sapphire" name="productGlass" required>
              </div>
            </div>
            <div class="field">
              <label class="label">Back</label>
              <div class="control">
                <input class="input" type="text" placeholder="Đóng" name="productBack" required>
              </div>
            </div>
          </div>
          <!-- =========================================================================== Right -->
          <div class="flex-item-right">
            <div class="field">
              <label class="label">File</label>
              <div class="field-body">
                <div class="field file">
                  <label class="upload control">
                    <a class="button blue">
                      Upload
                    </a>
                    <input type="file">
                  </label>
                </div>
              </div>
            </div>
            <div class="field">
              <label class="label">Product Code</label>
              <div class="field-body">
                <div class="field">
                  <div class="control icons-left icons-right">
                    <input class="input" type="name" name ="productCode" required>
                    <span class="icon left"><i class="mdi mdi-mail"></i></span>
                  </div>
                </div>
              </div>
              <p class="help">
                This field is required
              </p>
            </div>
            <div class="field">
              <label class="label">Product Brand</label>
              <div class="control">
                <div class="select">
                  <select>
                    <option>Apple</option>
                    <option>RoLex</option>
                    <option>Casio</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="field">
              <label class="label">Price</label>
              <div class="control">
                <input class="input" type="number" placeholder="9999999" name="productPrice" required>
              </div>
            </div>
            <div class="field">
              <label class="label">Currency</label>
              <div class="field-body">
                <div class="field grouped multiline">
                  <div class="control">
                    <label class="radio">
                      <input type="radio" name="sample-radio" value="VND" checked>
                      <span class="check"></span>
                      <span class="control-label">VND</span>
                    </label>
                  </div>
                  <div class="control">
                    <label class="radio">
                      <input type="radio" name="sample-radio" value="USD">
                      <span class="check"></span>
                      <span class="control-label">USD</span>
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="field">
              <label class="label">Shape</label>
              <div class="control">
                <input class="input" type="text" placeholder="Tròn" name="productShape" required>
              </div>
            </div>
            <div class="field">
              <label class="label">Diameter (.mm)</label>
              <div class="control">
                <input class="input" type="number" placeholder="40" name="productDiameter" required>
              </div>
            </div>
            <div class="field">
              <label class="label">Height (.mm)</label>
              <div class="control">
                <input class="input" type="number" placeholder="12" name="productHeight" required>
              </div>
            </div>
            <div class="field">
              <label class="label">LugWidth (.mm)</label>
              <div class="control">
                <input class="input" type="number" placeholder="20" name="productLugWidth" required>
              </div>
            </div>
            <div class="field">
              <label class="label">Color</label>
              <div class="control">
                <input class="input" type="text" placeholder="9999999" name="productColor" required>
              </div>
            </div>
          </div>
        </div>
        </form>
      </div>
    </div>
  </section>

<section class="section main-section">
  <div class="card has-table">
    <header class="card-header">
      <p class="card-header-title">
        <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
        Product's Comment
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
        <?php  foreach ($data['data']['comments'] as $row) {?>
          <tr>
              <td data-label="userCmtFullname"><?php echo($row["fullname"]); ?></td>
              <td data-label="userCmtContent"><?php echo($row["content"]); ?></td>
              <td data-label="userCmtRating" class="progress-cell">
                <progress max="5" value="<?php echo($row["rating"]); ?>"><?php echo($row["userCmtRating"]); ?></progress>
              </td>               
              <td data-label="userCmtTime">
              <small class="text-gray-500"><?php echo($row["updatedAt"]); ?></small>
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