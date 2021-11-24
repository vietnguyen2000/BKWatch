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
          
          
          <div class="field grouped">
            <div class="control">
              <button type="submit" class="button green" onclick="add()">
                Submit
              </button>
            </div>
            <div class="control">
              <button type="reset" class="button red">
                Reset
              </button>
            </div>  
          </div>
        </form>
      </div>
    </div>
  </section>