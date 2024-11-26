    <!-- TOP NAV BAR START -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-black sticky-top">
      <div class="container-fluid" style="width: 100%;">
        <!-- Offcanvas Trigger Starts -->

        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
          data-bs-target="#offcanvasExample"
          aria-controls="offcanvasExample">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand text-uppercase fw-bold me-auto ms-3"
          href="<?php echo BASE_URL."dashboard.php" ?>">NK
          Library</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Offcanvas Trigger ends -->

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <form class="d-flex ms-auto" role="search">
            <div class="input-group my-3 my-lg-0">
              <input type="text" class="form-control" placeholder="Search"
                aria-label="Recipient's username"
                aria-describedby="button-addon2" />
              <button class="btn btn-outline-secondary btn-primary text-white"
                type="button" id="button-addon2">
                <i class="fa-solid fa-magnifying-glass"></i>
              </button>
            </div>
          </form>
          <ul class="navbar-nav mb-2 mb-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                <img class="profile" src="./assets/images/star-wars.jpg" />
                Admin
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#">My Profile</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL . "forgot-pass.php" ?>">Change
                    Password</a></li>
                <li>
                  <hr class="dropdown-divider" />
                </li>
                <li>
                  <a class="dropdown-item" href="<?php echo BASE_URL . "index.php" ?>">Log Out</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- TOP NAV BAR ENDS -->