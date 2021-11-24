<!-- <script src="ckeditor/ckeditor.js"></script> -->

<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li>Admin</li>
      <li>Blogs</li>
    </ul>
  </div>
</section>

<section class="is-hero-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <h1 class="title">
      Add Blog
    </h1>
  </div>
</section>

  <section class="section main-section">
    <div class="card mb-6">
      <div class="card-content">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
          <div class="field">
            <label class="label">Blog Title</label>
            <div class="field-body">
              <div class="field">
                <div class="control icons-left icons-right">
                  <input class="input" type="name" name ="blogTitle" required>
                  <span class="icon left"><i class="mdi mdi-mail"></i></span>
                </div>
              </div>
            </div>
            <p class="help">
              This field is required
            </p>
          </div>
          <div class="field">
          </div>
          <hr>
          <div class="field">
            <label class="label">Tag</label>
            <div class="control">
              <input class="input" type="text" placeholder="e.g. new, engine" name="blogTag" required>
            </div>
          </div>

          <div class="field">
            <label class="label">Content</label>
            <div class="control">
              <textarea class="textarea" placeholder="Content of blog" name="blogContent" id="blogContent" required></textarea>
            </div>
            <p class="help">
              This field is required
            </p>
          </div>
          <hr>
          <div class="field">
            <div class="field">
              <label class="label">Is Hot</label>
              <div class="field-body">
                  <div class="field" >
                  <label class="switch inRow">
                      <input type="checkbox" value="false" name="isHot" required>
                      <span class="check"></span>
                      <span class="control-label">Hot</span>
                  </label>
                  <p class="inRow"> Count Like: 0</p>
                  <p class="inRow"> Count View: 0</p>
                  <p class="inRow"> Create at: <?php echo date('Y-m-d'); ?></p>
                  <p> Update at: <?php echo date('Y-m-d'); ?></p>
                  </div>
              </div>
            </div>
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
          </div>
        <hr>   
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

<script src="ckeditor/ckeditor.js"> 

CKEDITOR.replace('blogContent');

</script>