<?php
session_start();
include "./database/env.php";
$query = "SELECT * FROM posts";
$res = mysqli_query($conn,$query);
$posts = mysqli_fetch_all($res,1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post System</title>
    <!-- My Css link -->
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>
<body>
<!-- Header Section Start -->
<header>
      <div class="container">
        <div class="row">
          <div class="text">
            <p>Create a Post System using PHP</p>
          </div>
        </div>
      </div>

</header>
<!-- Header Section Ends  -->
<!-- Nav Section Start -->
<nav class="navbar navbar-expand-lg bg-body navbar bg-dark border-bottom border-body">
    <div class="container">
     <a class="navbar-brand" href="./index.php">POST LOGO.</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collap e navbar-collapse my_nav" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" aria-disabled="true" href="./index.php">All Post</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-disabled="true">Add Post</a>
        </li>
      </ul>
      
    </div>
  </div>
</nav>
<!-- Nav Section Ends -->
<!-- Create tabale start -->
<div class="col-lg-6 mx-auto mt-5">
    <table class="table">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Titel</th>
        <th>Details</th>
    </tr>
    <?php
    foreach($posts as $key=>$post){
    ?>
    <tr>
        <td><?= ++$key ?></td>
        <td><?= $post['Name']?></td>
        <td><?= $post['Titel']?></td>
        <td><?= strlen($post['Details']) > 40 ? substr( $post['Details'],0,40) .'.....' : $post['Details']?></td>
    </tr>
    <?php
    }
    ?>
    
    </table>
</div>
<!-- Create tabale Ends -->
<!-- Alart start -->
<div class="toast <?=isset($_SESSION['alart'])  ? "show" : " "?>" style="position: absolute;bottom:50px;right:50px;" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    <strong class="me-auto">Post System</strong>
    <small class="text-body-secondary">1 sec ago</small>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">
  <?=isset($_SESSION['alart'])  ? "Successfully Connected" : " "?>
  </div>

</div>
<!-- Alart Ends -->
</body>

</html>
<?php
session_unset();

?>