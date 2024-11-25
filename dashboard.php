<?php
    include_once("config/config.php");
    include_once("config/database.php");
    include_once('include/header.php');
    include_once('include/topbar.php');
    include_once('include/sidebar.php');
?>

<!--  -->
<!--  -->

<!-- MAIN STARTS -->

<main class="mt-1 pt-3">
  <div class="container-fluid">

    <!-- CARDS -->

    <div class="row dashboard-counts">
      <div class="col-md-12">
        <h4 class="fw-bold text-uppercase ">DashBoard</h4>
        <p class="text-uppercase">Statistics of system!</p>
      </div>
      <div class="col-md-3">

        <!-- Card Ends  -->

        <div class="card">
          <div
            class="card-body text-muted  text-center mt-4">
            <h6 class="card-title text-uppercase  ">Total
              books</h6>
            <p
              class="card-text fw-bold fs-1 text-dark">130</p>
            <p><a href="#" class="rem">View More</a></p>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card">
          <div
            class="card-body text-muted text-center mt-4">
            <h6 class="card-title text-uppercase ">Total
              Students</h6>
            <p
              class="card-text fw-bold fs-1 text-dark">84</p>
            <p><a href="#" class="rem">View More</a></p>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card">
          <div
            class="card-body text-muted text-center mt-4">
            <h6 class="card-title text-uppercase ">Total
              revenue</h6>
            <p class="card-text fw-bold fs-1 text-dark">
              &#8377;
              1,20,000</p>
            <p><a href="#" class="rem">View More</a></p>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card">
          <div
            class="card-body text-muted text-center mt-4">
            <h6 class="card-title text-uppercase ">Total
              books Loan</h6>
            <p
              class="card-text fw-bold fs-1 text-dark">35</p>
            <p><a href="#" class="rem">View More</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Card Ends  -->
  <!--  -->

  <!-- TAB STARTS -->

  <div class="row g-2 mt-5 ms-2 dashboard-tabs">
    <div class="col-md-12">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link text-uppercase active"
            id="recent-students" data-bs-toggle="tab"
            data-bs-target="#recent-students-pane"
            type="button" role="tab"
            aria-controls="recent-students-pane"
            aria-selected="true">New Students</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link text-uppercase"
            id="recent-loan" data-bs-toggle="tab"
            data-bs-target="#recent-loan-pane" type="button"
            role="tab" aria-controls="recent-loan-pane"
            aria-selected="false">Recent Loans</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link text-uppercase"
            id="recent-subscription-tab"
            data-bs-toggle="tab"
            data-bs-target="#recent-subscription-tab-pane"
            type="button" role="tab"
            aria-controls="recent-subscription-tab-pane"
            aria-selected="false">Recent
            Subscription</button>
        </li>
      </ul>

      <!-- New Student TAB STARTS  -->
      <div class="tab-content" id="myTabContent">

        <!-- Recent Students Tab -->
        <div class="tab-pane fade show active"
          id="recent-students-pane" role="tabpanel"
          aria-labelledby="recent-students" tabindex="0">
          <table class="table">
            <thead class="table-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Preparing For</th>
                <th scope="col">Registered On</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Navnath</td>
                <td>Web Dev</td>
                <td>10/may 2024</td>
                <td><span
                    class="badge rounded-pill text-bg-success">Active</span></td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Yash</td>
                <td>All Subj</td>
                <td>10/may 2024</td>
                <td><span
                    class="badge rounded-pill text-bg-success">Active</span></td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Shubham</td>
                <td>TimePass</td>
                <td>10/may 2024</td>
                <td><span
                    class="badge rounded-pill text-bg-danger">InActive</span></td>
              </tr>
            </tbody>
          </table>
        </div>

        <!-- Recent Loans Tab -->
        <div class="tab-pane fade" id="recent-loan-pane"
          role="tabpanel" aria-labelledby="recent-loan"
          tabindex="0">
          <table class="table">
            <thead class="table-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Book Name</th>
                <th scope="col">Student Name</th>
                <th scope="col">Loan Date</th>
                <th scope="col">Due Date</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Raja Natwarlal</td>
                <td>Ravi</td>
                <td>12/may 2024</td>
                <td>13/may 2024</td>
                <td><span
                    class="badge rounded-pill text-bg-success">Active</span></td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Consistency is the key</td>
                <td>Sneha</td>
                <td>13/may 2024</td>
                <td>13/may 2024</td>
                <td><span
                    class="badge rounded-pill text-bg-warning">Returned</span></td>
              </tr>
            </tbody>
          </table>
        </div>

        <!-- Recent Subscription Tab -->
        <div class="tab-pane fade"
          id="recent-subscription-tab-pane" role="tabpanel"
          aria-labelledby="recent-subscription-tab"
          tabindex="0">
          <table class="table">
            <thead class="table-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Subscriber Name</th>
                <th scope="col">Subscription Plan</th>
                <th scope="col">Subscription Fee</th>
                <th scope="col">Subscribed Date</th>
                <th scope="col">Due Date</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Raj</td>
                <td>Gold</td>
                <td>899 &#8377;</td>
                <td>15/may 2024</td>
                <td>15/May 2025</td>
                <td><span
                    class="badge rounded-pill text-bg-success">Active</span></td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Ankita</td>
                <td>Silver</td>
                <td>499 &#8377;</td>
                <td>19/May 2024</td>
                <td>15/Oct 2024</td>
                <td><span
                    class="badge rounded-pill text-bg-danger">Expired</span></td>
              </tr>
              <tr>
                <th scope="row">1</th>
                <td>Raj</td>
                <td>Bronze</td>
                <td>199 &#8377;</td>
                <td>15/may 2024</td>
                <td>15/Aug 2024</td>
                <td><span
                    class="badge rounded-pill text-bg-success">Active</span></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- TAB ENDS -->
  <!--  -->

</main>

<!-- MAIN ENDS -->

<?php
include_once("include/footer.php");
?>