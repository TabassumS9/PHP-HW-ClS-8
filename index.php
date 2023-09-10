<?php
session_start();

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
          <a class="nav-link" aria-disabled="true" href="./all_post.php">All Post</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-disabled="true">Add Post</a>
        </li>
      </ul>
      
    </div>
  </div>
</nav>
<!-- Nav Section Ends -->
<!-- FormSection Start -->
<div class="card col-lg-6 mx-auto mt-4 full_card " style="background-color: #151A32;">
    <div class="card-header "style="background-color: #151A32; color:white;border-bottom:3px solid white; text-align:center;font-size:20px;font-family: Roboto;">
        Create Post
    </div>
    <div class="card-body"> 
        <form action="./controller/create_post.php" method="POST">
            <input name="enter_name" 
            value="<?= isset($_SESSION['old']['enter_name']) ? $_SESSION['old']['enter_name']:''?>"
            class="form-control my-3" type="text" placeholder="Enter your Name" style="border:1px solid blue;">
            <?php
                if(isset($_SESSION['form_errors']['enter_name_error'])){
            ?>
            <span class="text-danger"><?php echo $_SESSION['form_errors']['enter_name_error']?></span>
            <?php
                }
            ?>
            
            <input 
            value="<?= isset($_SESSION['old']['titel']) ? $_SESSION['old']['titel']:''?>"
            name="titel" class="form-control my-3"  type="text" placeholder="Enter your Titel" style="border:1px solid blue;">
            <?php
                if(isset($_SESSION['form_errors']['titel_error'])){
            ?>
            <span class="text-danger"><?php echo $_SESSION['form_errors']['titel_error']?></span>
            <?php
                }
            ?>
            
            <textarea name="details" class="form-control my-3"  placeholder="Post Details" style="border:1px solid blue;"><?= isset($_SESSION['old']['enter_name']) ? $_SESSION['old']['enter_name']:''?></textarea>
            <?php
                if(isset($_SESSION['form_errors']['details_error'])){
            ?>
            <span class="text-danger"><?php echo $_SESSION['form_errors']['details_error']?> <br><br></span>
            <?php
                }
            ?>
            <button class="btn " style="background-color: white;">Submit</button>
        </form>
    </div>
</div>
<!-- FormSection Start -->
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
</body>

</html>
<?php
session_unset();

?>