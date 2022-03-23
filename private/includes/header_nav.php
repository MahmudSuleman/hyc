<div id="navigation" class="container">
<nav class="navbar navbar-dark bg-dark navbar-expand-md sticky-top" id="navigation">
  <a class="navbar-brand" href="<?php echo url_for('index.php')?>" style="font-size: 2rem;">HYC</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Men
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo url_for('/findProduct.php?product=suit&category=men')?>">Suits</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo url_for('/findProduct.php?product=shoe&category=men')?>">Shoes</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo url_for('/findProduct.php?product=watch&category=men')?>">Wrist Watches</a>
          <div class="dropdown-divider"></div>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Women
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo url_for('/findProduct.php?product=bag&category=women')?>">Hand Bags</a>
          <div class="dropdown-divider"></div><a class="dropdown-item" href="<?php echo url_for('/findProduct.php?product=hijab&category=women')?>">Hijabs</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo url_for('/findProduct.php?product=shoe&category=women')?>">Shoes</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo url_for('/findProduct.php?product=veil&category=women')?>">Veils</a>
          <div class="dropdown-divider"></div>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Babies
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo url_for('findProduct.php?product=toy&category=baby')?>">Toys</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo url_for('findProduct.php?product=short&category=baby')?>">shorts</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo url_for('findProduct.php?product=t-shirt&category=baby')?>">T-Shirts</a>
        </div>
      </li>
        <li class="nav-item active">
            <a class="nav-link" href="<?php echo url_for('/search.php')?>">search <i class="fa fa-search"></i></a>
        </li>
    </ul>
      <?php
      if(isset($_SESSION['username'])){?>

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-user"></i>

                <?php echo $_SESSION['username'];?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?php echo url_for('cart.php') ?>"><i class="fa fa-shopping-cart"></i>Cart</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?php echo url_for('profile.php')?>"><i class="fa fa-user"></i>Profile</a>
            <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?php echo url_for('myProduct.php')?>"><i class="fa fa-user"></i>My Products</a>
            <div class="dropdown-divider"></div>

            <?php if($_SESSION['usertype'] == 1): ?>
<!--                user should not see the admin link if they are not an admin...-->
            <a class="dropdown-item" href="<?php echo  url_for('admin/index.php') ?>"><i class="fa fa-plus"></i>Admin Dashboard</a>
            <?php endif ?>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo url_for('logout.php')?>"><i class="fa fa-lock"></i>Logout</a>

        </div>
    </li>
      <?php }else{?>
      <p><a href="login.php">Login</a> | <a href="signup.php">Signup</a></p>
      <?php }?>
  </div>
</nav>
</div>
