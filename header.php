<header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="index.php" class="nav-link px-2 text-secondary">Home</a></li>
          <li><a href="index.php?ctg=PHP" class="nav-link px-2 text-white">PHP</a></li>
          <li><a href="index.php?ctg=Information Security" class="nav-link px-2 text-white">Information Security</a></li>
          <li><a href="index.php?ctg=English" class="nav-link px-2 text-white">English</a></li>
        </ul>

       <!--  <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
        </form> -->

        <div class="text-end">
          <!-- <button type="button" class="btn btn-success me-2"><a href="entrance.php?do=login" class="text-decoration-none text-white">Login</a></button> -->
          <?php 
            if (!isset($_SESSION['nickname'])) 
            {
                ?>
                    <button type="button" class="btn btn-success"><a href="entrance.php?do=sign-up" class="text-decoration-none text-white">Sign-up or login</a></button>
                <?
            }


            if (isset($_SESSION['nickname'])) 
            {
                ?>
                    <button type="button" class="btn btn-danger"><a href="exit.php" class="text-decoration-none text-white">Exit</a></button>
                <?
            }
          ?>
        </div>
      </div>
    </div>
  </header>
