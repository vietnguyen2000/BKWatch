<?php
$servername="localhost:3306";
$password="";
$username="root";
$dbname="bkwatch";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn){
     die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM blog";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta viewport="width=device-width, initial-scale=1.0">
    <title>Add</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        .container{
            margin: 10px auto 10px auto;
        }
        .container1{
            margin: 0;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-light bg-dark border border-primary" >
    <form class="form-inline" style="margin: 10px auto 10px 15px;">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    </nav>
    <div class="container1">
        <div class="row">
            <div class="col-lg-2">
                <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 100% ; height: 100%;">
                    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                    <span class="fs-4">Dashboard</span>
                    </a>
                    <hr>
                    <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link active" aria-current="page">
                        <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                        Home
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-white">
                        <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                        Blogs
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-white">
                        <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
                        Products
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-white">
                        <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
                        Comments
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-white">
                        <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
                        Customers
                        </a>
                    </li>
                    </ul>
                    <hr>
                    <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://mybk.hcmut.edu.vn/my/images/upload/bk_60y.png" alt="" width="32" height="32" class="rounded-circle me-2">
                        <strong>mdo</strong>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1" style="">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>
                </div>
            </div>
            <div class="col-lg-8 container">

            
                <h3 style="text-align: center; padding: 15px">Blog</h3>
                <table class="table border">
                    <thread>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">ShortContent</th>
                            <th scope="col">Content</th>
                            <th scope="col">Hot</th>
                        </tr>
                    </thread>
                    
                    <tbody>
                    <?php  foreach ($result as $row) {?>
                        <tr>
                            <th scope="row"> <?php echo($row["title"]); ?></th>
                            <td> <?php echo($row["shortContent"]); ?></td>
                            <td> <?php echo($row["content"]); ?></td>
                            <td> <?php echo($row["isHot"]); ?></td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
                <form>
                    <h3 style="text-align: center; padding: 15px">Add Blog</h3>
                    <div class="row" style="padding:15px;">
                    <label for="name" style="width: 140px; padding:10px;"><b > Title </b></label>
                    <input class="input-group-text" type="text" placeholder="Enter Name" name="name" id="name" required>
                    </div>
                    <div class="row" style="padding:15px;">
                    <label for="ShortContent" style="width: 140px; padding: 10px;"><b> Short Content: </b></label>
                    <textarea class="input-group-text" type="text-area" cols="40" rows="5"></textarea>
                    </div>
                    <div class="row" style="padding:15px;">
                    <label for="Content" style="width: 140px; padding: 10px;"><b> Content: </b></label>
                    <textarea class="input-group-text" type="text-area" cols="40" rows="5"></textarea>
                    </div>
                    <div class="row" style="padding:15px;">
                    <!-- <label class="form-check-label" for="defaultCheck1" style="width: 140px; padding: 10px;">
                        Is Hot
                    </label> -->
                    <label for="Content" style="width: 140px; padding: 10px;"><b> Is Hot: </b></label>
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" style="margin-left:140px; width: 30px; height: 30px;">
                    
                    </div>
                    <div class="row">
                    <button type="button" class="btn btn-primary" onclick="add()" style="width: 150px; margin-right: 10px; margin-left: auto; ">Add</button>
                    </div>
                    <!-- <button type="button" class="cancel" onclick="loadIndex()">Cancel</button> -->
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>