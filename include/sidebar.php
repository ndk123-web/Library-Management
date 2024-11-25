<!-- OFFCANVAS STARTS -->

<link
  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
  rel="stylesheet"
  integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
  crossorigin="anonymous" />
<link rel="stylesheet" href="./assets/css/style.css" />
<link rel="stylesheet" href="./assets/css/bootstrap.min.css">

<div class="offcanvas offcanvas-start bg-black text-white sidebar-nav"
  tabindex="-1" id="offcanvasExample"
  aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-body">
    <ul class="navbar-nav">
      <li class="nav-item">
        <div class="text-secondary small text-uppercase fw-bold">Core</div>
      </li>
      <li class="nav-item">
        <a class="nav-link active" aria-current="page"
          href="<?php echo BASE_URL . "dashboard.php"  ?>"><i
            class="fa-solid fa-gauge me-3"></i>DashBoard</a>
      </li>
      <li class="my-0">
        <hr />
      </li>
      <li class="nav-item">
        <div class="text-secondary small text-uppercase fw-bold">
          Inventory
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link sidebar-link" data-bs-toggle="collapse"
          href="#bookmgmt" role="button"
          aria-expanded="false" aria-controls="bookmgmt">
          <i class="fa-solid fa-book me-3"></i>
          Book Management
          <span class="right-icon float-end">
            <i class="fa-solid fa-chevron-down"></i>
          </span>
        </a>
        <div class="collapse" id="bookmgmt">
          <div>
            <ul class="navbar-nav ps-3">
              <li>
                <a href="<?php echo BASE_URL ?>books/add.php" class="nav-link active">
                  <i class="fa-solid fa-plus me-2"></i>
                  Add Books
                </a>
              </li>
              <li>
                <a href="<?php echo BASE_URL ?>books/managebooks.php" class="nav-link active">
                  <i class="fa-solid fa-bars-progress me-2"></i>
                  Manage Books
                </a>
              </li>
            </ul>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link sidebar-link" data-bs-toggle="collapse"
          href="#studentmgmt" role="button"
          aria-expanded="false" aria-controls="studentmgmt">
          <i class="fas fa-users me-2"></i>
          Students
          <span class="right-icon1 float-end">
            <i class="fa-solid fa-chevron-down"></i>
          </span>
        </a>
        <div class="collapse" id="studentmgmt">
          <div>
            <ul class="navbar-nav ps-3">
              <li>
                <a href="<?php echo BASE_URL ?>students/add.php" class="nav-link active">
                  <i class="fa-solid fa-plus me-2"></i>
                  Add Students
                </a>
              </li>
              <li>
                <a href="<?php echo BASE_URL ?>students/managestudents.php" class="nav-link active">
                  <i class="fa-solid fa-bars-progress me-2"></i>
                  Manage Students
                </a>
              </li>
            </ul>
      <li class="my-0">
        <hr />
      </li>
      <li class="nav-item">
        <div class="text-secondary small text-uppercase fw-bold">
          Buissness
      <li class="nav-item">
        <a class="nav-link sidebar-link" data-bs-toggle="collapse"
          href="#bookloan" role="button"
          aria-expanded="false" aria-controls="bookloan">
          <i class="fas fa-book-open me-2"></i>
          Book Loan
          <span class="right-icon2 float-end">
            <i class="fa-solid fa-chevron-down"></i>
          </span>
        </a>
        <div class="collapse" id="bookloan">
          <div>
            <ul class="navbar-nav ps-3">
              <li>
                <a href="<?php echo BASE_URL ?>book_loan/add.php" class="nav-link active">
                  <i class="fa-solid fa-plus me-2"></i>
                  Add new
                </a>
              </li>
              <li>
                <a href="<?php echo BASE_URL ?>/book_loan/manageloans.php"
                  class="nav-link active">
                  <i class="fa-solid fa-bars-progress me-2"></i>
                  Manage All
                </a>
              </li>
          </div>

      <li class="nav-item">
        <a class="nav-link sidebar-link"
          data-bs-toggle="collapse" href="#subsription"
          role="button"
          aria-expanded="false" aria-controls="subsription">
          <i class="fa-solid fa-indian-rupee-sign me-3"></i>
          Subsription
          <span class="right-icon3 float-end">
            <i class="fa-solid fa-chevron-down"></i>
          </span>
        </a>
        <div class="collapse" id="subsription">
          <div>
            <ul class="navbar-nav ps-3">
              <li>
                <a href="./add-subs.html"
                  class="nav-link active">
                  <i class="fa-solid fa-plus me-2"></i>
                  Plans
                </a>
              </li>
              <li>
                <a href="./purchase-history.html"
                  class="nav-link active">
                  <i
                    class="fa-solid fa-money-check me-2"></i>
                  Purchase History
                </a>
              </li>
      </li>
  </div>
  <li>
    <hr>
  </li>
  <li class="nav-item">
    <a class="nav-link active" aria-current="page"
      href="<?php BASE_URL ?>index.php">
      <i
        class="fa-solid fa-right-from-bracket me-3"></i>
      Log Out
    </a>
  </li>
</div>
</li>
</ul>

</div>
</div>

<!-- OFFCANVAS ENDS -->