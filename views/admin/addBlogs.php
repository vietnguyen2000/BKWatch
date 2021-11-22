<?php
$servername="vietnguyen2000.ddns.net:3306";
$password="web";
$username="web";
$dbname="bkwatch";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["blogTitle"])) {
        $blogTitle = $_POST["blogTitle"];
    }
    if (isset($_POST["isHot"])) {
      $isHot = $_POST["isHot"];
    }
    if (isset($_POST["blogTag"])) {
        $blogTag = $_POST["blogTag"];
        if (strlen($blogTag) > 40){
            echo "<script language='javascript'>";
            echo "alert('Tag length from 0 to 40 character')";
            echo "</script>";
            die();
        }
    }
    if (isset($_POST["blogContent"])) {
        $blogContent = $_POST["blogContent"];
    }
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }
    $sqlAdd = "INSERT INTO blog(title, content, tag, isHot) VALUES ('$blogTitle', '$blogContent', '$blogTag', $isHot)";
    if($conn->query($sqlAdd) == TRUE){
        echo "<script language='javascript'>";
        echo "alert('Successfully Updated!')";
        echo "</script>";
    } else {
        echo "<script language='javascript'>";
        echo "alert('Failed Updated!')";
        echo "</script>";
    }
  }
?>

<!DOCTYPE html>
<html lang="en" class="">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Blog</title>

  <link rel="stylesheet" href="main.css">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
  <style>
    .inRow{
      float: left;
      padding-right: 50px;
    }
  </style>
</head>
<body>

<div id="app">

<?php
  require './header.php';
?>

<aside class="aside is-placed-left is-expanded">
  <div class="aside-tools">
    <div>
      BK<b class="font-black">watch</b>
    </div>
  </div>
  <div class="menu is-menu-main">
    <p class="menu-label">General</p>
    <ul class="menu-list">
      <li class="--set-active-index-html">
        <a href="index.html">
          <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
          <span class="menu-item-label">Dashboard</span>
        </a>
      </li>
    </ul>
    <p class="menu-label">Contents</p>
    <ul class="menu-list">
      <li class="--set-active-profile-html">
        <a href="profile.html">
          <span class="icon"><i class="mdi mdi-account-circle"></i></span>
          <span class="menu-item-label">Introduction</span>
        </a>
      </li>
      <li class="active">
        <a href="#">
          <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
          <span class="menu-item-label">Blog</span>
        </a>
      </li>
    </ul>
    <p class="menu-label">Product</p>
    <ul class="menu-list">
      <li>
        <a href="#" class="has-icon">
          <span class="icon"><i class="mdi mdi-credit-card-outline"></i></span>
          <span class="menu-item-label">Product</span>
        </a>
      </li>
      <li>
        <a href="#" class="has-icon">
          <span class="icon"><i class="mdi mdi-help-circle"></i></span>
          <span class="menu-item-label">Add Product</span>
        </a>
      </li>
    </ul>
    <p class="menu-label">User</p>
    <ul class="menu-list">
      <li>
        <a href="#" class="has-icon">
          <span class="icon"><i class="mdi mdi-credit-card-outline"></i></span>
          <span class="menu-item-label">Admin</span>
        </a>
      </li>
      <li>
        <a href="#" class="has-icon">
          <span class="icon"><i class="mdi mdi-help-circle"></i></span>
          <span class="menu-item-label">Customer</span>
        </a>
      </li>
    </ul>
    <p class="menu-label">Media</p>
    <ul class="menu-list">
      <li>
        <a href="#" class="has-icon">
          <span class="icon"><i class="mdi mdi-credit-card-outline"></i></span>
          <span class="menu-item-label">Blog's Image</span>
        </a>
      </li>
      <li>
        <a href="#" class="has-icon">
          <span class="icon"><i class="mdi mdi-credit-card-outline"></i></span>
          <span class="menu-item-label">Product's Image</span>
        </a>
      </li>
    </ul>
  </div>
</aside>

<!-- =========================================================================== -->
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
              <textarea class="textarea" placeholder="Content of blog" name="blogContent" required></textarea>
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
<!-- =========================================================================== -->





<?php
  require './footer.php';
?>

</div>



<script>
Array.from(document.getElementsByClassName('mobile-aside-button')).forEach(function (el) {
  el.addEventListener('click', function (e) {
    var dropdownIcon = e.currentTarget.getElementsByClassName('icon')[0].getElementsByClassName('mdi')[0];
    document.documentElement.classList.toggle('aside-mobile-expanded');
    dropdownIcon.classList.toggle('mdi-forwardburger');
    dropdownIcon.classList.toggle('mdi-backburger');
  });
});
/* NavBar menu mobile toggle */

Array.from(document.getElementsByClassName('--jb-navbar-menu-toggle')).forEach(function (el) {
  el.addEventListener('click', function (e) {
    var dropdownIcon = e.currentTarget.getElementsByClassName('icon')[0].getElementsByClassName('mdi')[0];
    document.getElementById(e.currentTarget.getAttribute('data-target')).classList.toggle('active');
    dropdownIcon.classList.toggle('mdi-dots-vertical');
    dropdownIcon.classList.toggle('mdi-close');
  });
});
</script>

</body>
</html>
