<!-- =========================================================================== -->
<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li>Admin</li>
      <li>Products</li>
      <li><?= (!$data['add']) ? $data['data']['id'] : 'new' ?></li>
    </ul>
  </div>
</section>

<section class="is-hero-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <h1 class="title">
      <?= !$data['add'] ? 'Update' : 'Add' ?> Product
    </h1>
  </div>
</section>

<section class="section main-section">

  <div class="card mb-6">
    <div class="card-content">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="flex-container">
          <!-- =========================================================================== Left -->
          <div class="flex-item-left">
            <div class="field">
              <label class="label">Product Title</label>
              <div class="field-body">
                <div class="field">
                  <div class="control icons-left icons-right">
                    <input class="input" type="name" name="productTitle" required value="<?php if (!$data['add']) {
                                                                                            echo $data['data']['title'];
                                                                                          } ?>">
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
                <input class="input" type="text" placeholder="e.g. new, engine" name="productTag" required value="<?php if (!$data['add']) {
                                                                                                                    echo $data['data']['tag'];
                                                                                                                  } ?>">
              </div>
            </div>

            <div class="field">
              <label class="label">Content</label>
              <div class="control">
                <textarea class="textarea" placeholder="Content of product" name="productContent" required> <?php if (!$data['add']) {
                                                                                                              echo $data['data']['content'];
                                                                                                            } ?></textarea>
              </div>
              <p class="help">
                This field is required
              </p>
            </div>
            <div class="field">
              <label class="label">Statistic</label>
              <div class="field-body">
                <p class="inRow"> Created on: <?php if (!$data['add']) {
                                                echo $data['data']['createdAt'];
                                              } else {
                                                echo date('Y-m-d');
                                              } ?></p>
                <p> Updated on: <?php if (!$data['add']) {
                                  echo $data['data']['updatedAt'];
                                } else {
                                  echo date('Y-m-d');
                                } ?></p>
              </div>
            </div>
            <div class="field">
              <div class="field">
                <label class="label">Other</label>
                <div class="field-body">
                  <div class="field">
                    <label class="switch inRow">
                      <input type="checkbox" <?php if (!$data['add'] && $data['data']['isHot']) {
                                                echo 'checked';
                                              } ?> name="isHot" required>
                      <span class="check"></span>
                      <span class="control-label">Hot</span>
                    </label>
                    <label class="switch inRow">
                      <input type="checkbox" <?php if (!$data['add'] && $data['data']['isNew']) {
                                                echo 'checked';
                                              } ?> name="isNew" required>
                      <span class="check"></span>
                      <span class="control-label">New</span>
                    </label>
                    <label class="switch">
                      <input type="checkbox" <?php if (!$data['add'] && $data['data']['isBestSale']) {
                                                echo 'checked';
                                              } ?> name="isBestSale" required>
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
                <input class="input" type="number" placeholder="9999999" name="productQuantity" required value="<?php if (!$data['add']) {
                                                                                                                  echo $data['data']['quantity'];
                                                                                                                } ?>">
              </div>
            </div>
            <div class="field">
              <label class="label">Material</label>
              <div class="control">
                <input class="input" type="text" placeholder="Gold" name="productMaterial" required value="<?php if (!$data['add']) {
                                                                                                              echo $data['data']['material'];
                                                                                                            } ?>">
              </div>
            </div>
            <div class="field">
              <label class="label">Glass</label>
              <div class="control">
                <input class="input" type="text" placeholder="Sapphire" name="productGlass" required value="<?php if (!$data['add']) {
                                                                                                              echo $data['data']['glass'];
                                                                                                            } ?>">
              </div>
            </div>
            <div class="field">
              <label class="label">Back</label>
              <div class="control">
                <input class="input" type="text" placeholder="Đóng" name="productBack" required value="<?php if (!$data['add']) {
                                                                                                          echo $data['data']['back'];
                                                                                                        } ?>">
              </div>
            </div>
          </div>
          <!-- =========================================================================== Right -->
          <div class="flex-item-right">
            <div class="field">
              <label class="label">Product Code</label>
              <div class="field-body">
                <div class="field">
                  <div class="control icons-left icons-right">
                    <input class="input" type="name" name="productCode" required value="<?php if (!$data['add']) {
                                                                                          echo $data['data']['productCode'];
                                                                                        } ?>">
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
                <div class="select" style="margin-top: 20px;">
                  <select id="productBrand" name="productBrand">
                    <?php foreach ($data['brandList'] as $category) { ?>
                      <option value="<?php echo $category['id']; ?>" <?= (!$data['add']) && $data['data']['productBrandId'] == $category['id'] ? 'selected' : '' ?>><?php echo $category['title']; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="field">
              <label class="label">Product category</label>
              <div class="control">
                <div class="select" style="margin-top: 20px;">
                  <select id="productCategory" name="productCategory">
                    <?php foreach ($data['categoryList'] as $category) { ?>
                      <option value="<?php echo $category['id']; ?>" <?= (!$data['add']) && $data['data']['productCategoryId'] == $category['id'] ? 'selected' : '' ?>><?php echo $category['title']; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="field">
              <label class="label">Price</label>
              <div class="control">
                <input class="input" type="number" placeholder="9999999" name="productPrice" required value="<?php if (!$data['add']) {
                                                                                                                echo $data['data']['price'];
                                                                                                              } ?>">
              </div>
            </div>
            <div class="field">
              <label class="label">Discount</label>
              <div class="control">
                <input class="input" type="number" placeholder="5" name="productDiscount" required value="<?php if (!$data['add']) {
                                                                                                            echo $data['data']['discount'];
                                                                                                          } ?>">
              </div>
            </div>
            <div class="field">
              <label class="label">Warranty</label>
              <div class="control">
                <input class="input" type="number" placeholder="3" name="productWarranty" required value="<?php if (!$data['add']) {
                                                                                                            echo $data['data']['warranty'];
                                                                                                          } ?>">
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
                <input class="input" type="text" placeholder="Tròn" name="productShape" required value="<?php if (!$data['add']) {
                                                                                                          echo $data['data']['shape'];
                                                                                                        } ?>">
              </div>
            </div>
            <div class="field">
              <label class="label">Diameter (.mm)</label>
              <div class="control">
                <input class="input" type="text" placeholder="40" name="productDiameter" required value="<?php if (!$data['add']) {
                                                                                                            echo $data['data']['diameter'];
                                                                                                          } ?>">
              </div>
            </div>
            <div class="field">
              <label class="label">Height (.mm)</label>
              <div class="control">
                <input class="input" type="text" placeholder="12" name="productHeight" required value="<?php if (!$data['add']) {
                                                                                                          echo $data['data']['height'];
                                                                                                        } ?>">
              </div>
            </div>
            <div class="field">
              <label class="label">LugWidth (.mm)</label>
              <div class="control">
                <input class="input" type="text" placeholder="20" name="productLugWidth" required value="<?php if (!$data['add']) {
                                                                                                            echo $data['data']['lugWidth'];
                                                                                                          } ?>">
              </div>
            </div>
            <div class="field">
              <label class="label">Color</label>
              <div class="control">
                <input class="input" type="text" placeholder="White" name="productColor" required value="<?php if (!$data['add']) {
                                                                                                            echo $data['data']['color'];
                                                                                                          } ?>">
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
      <table class="data-table">
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
          <?php if (!$data['add']) {
            foreach ($data['data']['comments'] as $row) { ?>
              <tr id="comment-<?php echo ($row["id"]); ?>">
                <td data-label="userCmtFullname"><?php echo ($row["fullname"]); ?></td>
                <td data-label="userCmtContent"><?php echo ($row["content"]); ?></td>
                <td data-label="userCmtRating" class="progress-cell">
                  <progress max="5" value="<?php echo ($row["rating"]); ?>"><?php echo ($row["rating"]); ?></progress>
                </td>
                <td data-label="userCmtTime">
                  <small class="text-gray-500"><?php echo ($row["updatedAt"]); ?></small>
                </td>
                <td class="actions-cell">
                  <form form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="buttons right nowrap">
                      <button class="button small red --jb-modal" data-target="sample-modal" type="button" onclick="deleteID('<?php echo ($row["id"]); ?>')">
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
      <table class="data-table">
        <thead>
          <tr>
            <th>Image</th>
            <th>Url</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody id="table-images-body">
          <?php if (!$data['add']) {
            foreach ($data['imageList'] as $row) { ?>
              <tr id="product-image-<?= $row['id'] ?>">
                <td data-label="Image">
                  <img src="<?php echo ($row['imageURL']); ?>" alt="Image" style="height:70px; wight:auto;">
                </td>
                <td data-label="imageURLs"><?php echo ($row['imageURL']); ?></td>
                <td class="actions-cell" data-label="Delete">
                  <form form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="buttons right nowrap">
                      <button class="button small red --jb-modal" data-target="sample-modal" type="button" onclick="deleteImageRow('<?php echo ($row['id']); ?>')">
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
          <a href="\cmsProduct">
            <button type="cancel" class="button red">
              Cancel
            </button>
          </a>
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
      <button class="button blue --jb-modal-close" onclick="DeleteCmt()">Confirm</button>
    </footer>
  </div>
</div>

<script>
  var ID = 0;
  var modal = document.getElementById("sample-modal-2");
  var modal3 = document.getElementById("sample-modal-3");
  // When the user clicks the button, open the modal 
  function deleteID(id) {
    modal.style.display = "block";
    ID = id;
  }

  function cancel() {
    modal.style.display = "none";
  }

  function cancel3() {
    modal3.style.display = "none";
  }

  function add() {
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
    console.log({
      productTitle,
      productTag,
      productContent,
      productCategory,
      isHot,
      isNew,
      isBestSale,
      quantity,
      material,
      glass,
      back,
      productBrand,
      Currency,
      productShape,
      productDiameter,
      productHeight,
      productLugWidth,
      productColor,
      code,
      productPrice,
      listNewImages,
      listRemovedImages
    });
    const action = "<?= (!$data['add']) ? '/cms/product/update/' . $data['data']['id'] : '/cms/product/add' ?>"
    $.post(action, {
      productTitle,
      productTag,
      productContent,
      productCategory,
      isHot,
      isNew,
      isBestSale,
      quantity,
      material,
      glass,
      back,
      productBrand,
      Currency,
      productShape,
      productDiameter,
      productHeight,
      productLugWidth,
      productColor,
      productPrice,
      code,
      productDiscount,
      productWarranty,
      listNewImages,
      listRemovedImages
    }, () => {
      toastsHandler.createToast({
        type: "success",
        icon: "check-circle",
        message: "Bạn đã <?= (!$data['add']) ? 'cập nhật' : 'thêm' ?> thành công",
        duration: 3000,
      });

      fastGet('/cms/product')
    })
  }
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

  function DeleteCmt() {
    $(`tr[id="comment-${ID}"]`).remove();
    $.post('/cms/product/deleteCmt', {
      ID
    }, () => {
      toastsHandler.createToast({
        type: "success",
        icon: "check-circle",
        message: "Bạn đã xóa comment thành công",
        duration: 3000,
      });
    })
    cancel();
    return true;
  }

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
          <form form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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

<script>
  $(document).ready(function() {
    $('.data-table').DataTable();
  });
</script>

<script>
  function addproductCategory() {
    var NewproductCategory = document.getElementsByName("NewproductCategory")[0].value;
    $.get('/cmsAddProduct/addCategory', {
      NewproductCategory
    }, (d) => {
      newCategoryID = parseInt(d);
      $('#productCategory').append(`<option value="${newCategoryID}">${NewproductCategory}</option>`)
    })
    return
  }

  function addproductBrand() {
    var NewproductBrand = document.getElementsByName("NewproductBrand")[0].value;
    $.get('/cmsAddProduct/addBrand', {
      NewproductBrand
    }, (d) => {
      newBrandID = parseInt(d);
      $('#productBrand').append(`<option value="${newBrandID}">${NewproductBrand}</option>`)
    })
    return
  }
</script>