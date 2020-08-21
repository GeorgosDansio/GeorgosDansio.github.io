<!DOCTYPE html>
<html>
<head>
  <title>MultiProgrammer</title>
  <style>
    body {
    background: url(/assets/img/background_2.jpg) no-repeat;
    /*background-size: contain;*/
    -moz-background-size: 100%; /* Firefox 3.6+ */
    -webkit-background-size: 100%; /* Safari 3.1+ и Chrome 4.0+ */
    -o-background-size: 100%; /* Opera 9.6+ */
    background-size: 100%; /* Современные браузеры */
   }
  </style>
  
  <!-- <img src="/assets/img/background_2.jpg" class="img-fluid" alt="Responsive image"> -->
  <link rel="stylesheet" type="text/css" href="assets/css/multiprogrammer.css">
<!--   <link rel="stylesheet" type="text/css" href="assets/css/style.css"> -->
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/bootstrap-grid.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
</head>

<body>
<header>
  <div class="container-fluid">
      <nav class="navbar navbar-light bg-light border-bottom" style="    background-color: #071925 !important">
        <a class="navbar-brand" href="/"  style="color:#10b8f3 !important">MultiProgrammer</a>
        <a class="navbar-brand" href="/"  style="color:#1f83f0 !important"><?php if(isset($_COOKIE['reiting'])){echo ('Несгораемый результат:  '. $_COOKIE['reiting']);} else {echo '';} ?></a>

 <!-- выпадающий влево список для входа и выхода User -->      
     <div class="btn-group dropleft">
            <a id="user_name" class="nav-link font-weight-bold dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="<?php if(isset($_COOKIE['polzovatel_id'])){echo '#';} else {echo "/login.php";} ?>"><?php if(isset($_COOKIE['polzovatel_id'])){echo $_COOKIE['polzovatel_name'];} else {echo 'User';} ?></a>

      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" href="login.php">Login</a>
        <a id="exit" class="dropdown-item" href="/">Exit</a>    
      </div>

    </div> 

     </nav>
  </div>
</header>