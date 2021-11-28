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
      <?php if (!$data['add']) {echo 'Add';} else echo 'Update'?> Product
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
                    <input class="input" type="name" name ="productTitle" required value="<?php if (!$data['add']) {echo $data['data']['title'];}?>">
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
                <input class="input" type="text" placeholder="e.g. new, engine" name="productTag" required value="<?php if (!$data['add']) {echo $data['data']['tag'];}?>">
              </div>
            </div>

            <div class="field">
              <label class="label">Content</label>
              <div class="control">
                <textarea class="textarea" placeholder="Content of product" name="productContent" required value="<?php if (!$data['add']) {echo $data['data']['content'];}?>"></textarea>
              </div>
              <p class="help">
                This field is required
              </p>
            </div>
            <div class="field">
              <label class="label">Product category</label>
              <div class="control">
                <div class="select">
                  <select id="productCategory" name="productCategory">
                    <?php foreach ( $data['categoryList'] as $category) {?>
                    <option value="<?php echo $category['id']; ?>"><?php echo $category['title']; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="field">
              <label class="label">Statistic</label>
              <div class="field-body">
                <p class="inRow"> Created on: <?php  if (!$data['add']) {echo $data['data']['createdAt'];} else {echo date('Y-m-d');} ?></p>
                <p> Updated on: <?php  if (!$data['add']) {echo $data['data']['updatedAt'];} else {echo date('Y-m-d');} ?></p>
              </div>
            </div>
            <div class="field">
              <div class="field">
                <label class="label">Other</label>
                <div class="field-body">
                    <div class="field" >
                    <label class="switch inRow">
                        <input type="checkbox" value="<?php  if (!$data['add'] && $data['data']['isHot']) {echo 'true';} else {echo 'false';} ?>" name="isHot" required>
                        <span class="check"></span>
                        <span class="control-label">Hot</span>
                    </label>
                    <label class="switch inRow">
                        <input type="checkbox" value="<?php  if (!$data['add'] && $data['data']['isNew']) {echo 'true';} else {echo 'false';} ?>" name="isNew" required>
                        <span class="check"></span>
                        <span class="control-label">New</span>
                    </label>
                    <label class="switch">
                        <input type="checkbox" value="<?php  if (!$data['add'] && $data['data']['isBestSale']) {echo 'true';} else {echo 'false';} ?>" name="isBestSale" required>
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
                <input class="input" type="number" placeholder="9999999" name="productQuantity" required value="<?php if (!$data['add']) {echo $data['data']['quantity'];}?>">
              </div>
            </div>
            <div class="field">
              <label class="label">Material</label>
              <div class="control">
                <input class="input" type="text" placeholder="Gold" name="productMaterial" required value="<?php if (!$data['add']) {echo $data['data']['material'];}?>">
              </div>
            </div>
            <div class="field">
              <label class="label">Glass</label>
              <div class="control">
                <input class="input" type="text" placeholder="Sapphire" name="productGlass" required value="<?php if (!$data['add']) {echo $data['data']['glass'];}?>">
              </div>
            </div>
            <div class="field">
              <label class="label">Back</label>
              <div class="control">
                <input class="input" type="text" placeholder="Đóng" name="productBack" required value="<?php if (!$data['add']) {echo $data['data']['back'];}?>">
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
                    <input class="input" type="name" name ="productCode" required value="<?php if (!$data['add']) {echo $data['data']['productCode'];}?>">
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
                  <select id="productBrand" name="productBrand">
                    <?php foreach ( $data['brandList'] as $category) {?>
                    <option value="<?php echo $category['id']; ?>"><?php echo $category['title']; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="field">
              <label class="label">Price</label>
              <div class="control">
                <input class="input" type="number" placeholder="9999999" name="productPrice" required value="<?php if (!$data['add']) {echo $data['data']['price'];}?>">
              </div>
            </div>
            <div class="field">
              <label class="label">Discount</label>
              <div class="control">
                <input class="input" type="number" placeholder="5" name="productDiscount" required value="<?php if (!$data['add']) {echo $data['data']['discount'];}?>">
              </div>
            </div>
            <div class="field">
              <label class="label">Warranty</label>
              <div class="control">
                <input class="input" type="number" placeholder="3" name="productWarranty" required value="<?php if (!$data['add']) {echo $data['data']['warranty'];}?>">
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
                <input class="input" type="text" placeholder="Tròn" name="productShape" required value="<?php if (!$data['add']) {echo $data['data']['shape'];}?>">
              </div>
            </div>
            <div class="field">
              <label class="label">Diameter (.mm)</label>
              <div class="control">
                <input class="input" type="text" placeholder="40" name="productDiameter" required value="<?php if (!$data['add']) {echo $data['data']['diameter'];}?>">
              </div>
            </div>
            <div class="field">
              <label class="label">Height (.mm)</label>
              <div class="control">
                <input class="input" type="text" placeholder="12" name="productHeight" required value="<?php if (!$data['add']) {echo $data['data']['height'];}?>">
              </div>
            </div>
            <div class="field">
              <label class="label">LugWidth (.mm)</label>
              <div class="control">
                <input class="input" type="text" placeholder="20" name="productLugWidth" required value="<?php if (!$data['add']) {echo $data['data']['lugWidth'];}?>">
              </div>
            </div>
            <div class="field">
              <label class="label">Color</label>
              <div class="control">
                <input class="input" type="text" placeholder="White" name="productColor" required value="<?php if (!$data['add']) {echo $data['data']['color'];}?>">
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
        <?php  if (!$data['add']) {foreach ($data['data']['comments'] as $row) {?>
          <tr>
              <td data-label="userCmtFullname"><?php echo($row["fullname"]); ?></td>
              <td data-label="userCmtContent"><?php echo($row["content"]); ?></td>
              <td data-label="userCmtRating" class="progress-cell">
                <progress max="5" value="<?php echo($row["rating"]); ?>"><?php echo($row["rating"]); ?></progress>
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
        <?php }}?>
        </tbody>
      </table>
      <div class="table-pagination">
        <div class="flex items-center justify-between">
          <div class="buttons">
            <button type="button" class="button"><<</button>
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
  <div class="card has-table">
    <header class="card-header">
      <p class="card-header-title">
        <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
        Product's Image
      </p>
      <a href="#" class="card-header-icon">
        <span class="icon"><i class="mdi mdi-reload"></i></span>
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
        <?php  if (!$data['add']) {foreach ($data['imageList'] as $row) {?>
          <tr>
              <td data-label="Image">
                <img src="<?php echo($row['imageURL']); ?>" alt="Image" style="height:70px; wight:auto;">
              </td>
              <td data-label="imageURLs"><?php echo($row['imageURL']); ?></td>
              <td class="actions-cell" data-label="Delete">
                <form form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                  <div class="buttons right nowrap">
                      <button class="button small red --jb-modal" data-target="sample-modal" type="button" onclick="deleteID('<?php echo($row['id']); ?>')">
                      <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                      </button>
                  </div>
                </form>
              </td>
          </tr>
        <?php }}?>
        </tbody>
      </table>
      <div class="table-pagination">
        <div class="flex items-center justify-between">
          <div class="buttons">
            <button type="button" class="button"><<</button>
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

<div id="sample-modal-3" class="modal">
  <div class="modal-background --jb-modal-close" onclick="cancel3()"></div>
  <div class="modal-card" style="margin-top: 40px;">
    <header class="modal-card-head">
      <p class="modal-card-title">DELETE IT?</p>
    </header>
    <section class="modal-card-body">
      <p>PLEASE CONFIRM AGAIN TO <b>DELETE</b> IT.</p>
    </section>
    <footer class="modal-card-foot">
      <button class="button --jb-modal-close" onclick="cancel3()">Cancel</button>
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
  var modal3 = document.getElementById("sample-modal-3");
  // When the user clicks the button, open the modal 
  function deleteID(id){
    modal.style.display = "block";
    ID = id;
  }
  function cancel(){
    modal.style.display = "none";
  }
  function cancel3(){
    modal3.style.display = "none";
  }
  function add(){
    var productTitle = document.getElementsByName("productTitle")[0].value;
    var productTag = document.getElementsByName("productTag")[0].value;
    var productContent = document.getElementsByName("productContent")[0].value;
    var productCategory = document.getElementsByName("productCategory")[0];
    productCategory = productCategory.options[productCategory.selectedIndex].value;
    var isHot = document.getElementsByName("isHot")[0].checked;
    var isNew = document.getElementsByName("isNew")[0].checked;
    var isBestSale = document.getElementsByName("isBestSale")[0].checked;
    var quantity = document.getElementsByName("productQuantity")[0].value;
    var material = document.getElementsByName("productMaterial")[0].value;
    var glass = document.getElementsByName("productGlass")[0].value;
    var back = document.getElementsByName("productBack")[0].value;
    var code = document.getElementsByName("productCode")[0].value;
    var productBrand = document.getElementsByName("productBrand")[0];
    productBrand = productBrand.options[productBrand.selectedIndex].value;
    var Currency = 'VND';
    var productShape = document.getElementsByName("productShape")[0].value;
    var productDiameter = document.getElementsByName("productDiameter")[0].value;
    var productHeight = document.getElementsByName("productHeight")[0].value;
    var productLugWidth = document.getElementsByName("productLugWidth")[0].value;
    var productColor = document.getElementsByName("productColor")[0].value;
    var productPrice = document.getElementsByName("productPrice")[0].value;
    var productDiscount = document.getElementsByName("productDiscount")[0].value;
    var productWarranty = document.getElementsByName("productWarranty")[0].value;
    console.log(productTitle, productTag, productContent, productCategory, isHot,isNew, isBestSale, quantity, material, glass, back, productBrand, Currency,productShape, productDiameter, productHeight, productLugWidth, productColor, code, productPrice);
    $.post('/cmsAddProduct/add', {
        productTitle, productTag, productContent, productCategory, isHot,
        isNew, isBestSale, quantity, material, glass, back, productBrand, Currency,
        productShape, productDiameter, productHeight, productLugWidth, productColor,productPrice, code, productDiscount, productWarranty
        })
    $.showNotification({
      type: "primary",
      body: "Bạn đã Thêm vào thành công",
      duration: 10,
      direction: 'append'
    })
  }
</script>