<nav class="navbar navbar-expand-lg bg-body-secondary" data-bs-theme="dark">
    <div class="container">
      <a class="navbar-brand" href="<?php echo URLROOT;?>"><?php echo SITENAME;?></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarColor01">
        
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="<?php echo URLROOT;?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT;?>/pages/about">About</a>
          </li>
        </ul>

        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <?php if(isset($_SESSION['user_id'])){ ?>
            <li class="nav-item">
            <a class="nav-link" aria-current="page" href="<?php echo URLROOT;?>/users/logout">Logout</a>
          </li>
          <?php } else { ?>

          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="<?php echo URLROOT;?>/users/register">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT;?>/users/login">Login</a>
          </li>
          <?php }?>
        </ul>

      </div>
    </div>
  </nav>