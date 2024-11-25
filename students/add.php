<?php
include_once("../config/config.php");
include_once(DIR_URL . "config/database.php");
include_once(DIR_URL . "modules/student.php");
include_once(DIR_URL . "include/header.php");
include_once(DIR_URL . "include/topbar.php");
include_once(DIR_URL . "include/sidebar.php");
?>

<main class="mt-1 pt-3">
    <div class="container-fluid">
        <div class="row dashboard-counts">

            <!-- CARDS -->

            <!-- PHP CODE FOR SUCCESS OR FAILED TO ADD BOOK IN DB -->
            <!-- PHP CODE FOR SUCCESS OR FAILED TO ADD BOOK IN DB -->


            <!-- MAIN STARTS -->
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['submit'])) {
        // Sanitize and validate $_POST data here
        $res = create($conn, $_POST);   // return from modules/student.php
        if ($res == "success") {
?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Successfully Added</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        } elseif ($res == "duplicate") {
        ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Email is already Exists</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        } elseif ($res == 'invalid_phone') {
        ?>
               <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Phone number length is invalid</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        } else if($res=='already_exists') {
        ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Phone number or Email Already Exists</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
            } else{
        ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Error: An unexpected error occurred. Please try again later.</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
            // Optionally, log $res somewhere for debugging
        }
    }
}
?>

            <div class="col-md-12">
                <h4 class="fw-bold text-uppercase ">Add Students</h4>
            </div>

            <div col-md-12>
                <div class="card">
                    <div class="card-header">
                        Fill the Form
                    </div>
                    <div class="card-body">
                        <form action="<?php echo BASE_URL ?>/students/add.php" method="post">
                          
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1"
                                            class="form-label">Full Name</label>
                                        <input type="text" name="fullname" class="form-control"
                                            id="exampleInputEmail1"
                                            aria-describedby="emailHelp" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1"
                                            class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control"
                                            id="exampleInputPassword1" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1"
                                            class="form-label">Phone no</label>
                                        <input type="number" name="phone_no" class="form-control"
                                            id="exampleInputPassword1" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1"
                                            class="form-label">Address</label>
                                        <input type="text" name="address" class="form-control"
                                            id="exampleInputPassword1" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <button name="submit" type="submit"
                                    class="btn btn-success my-3 me-2">Add</button>
                                <a type="Cancel"  href="./managestudents.php"
                                    class="btn btn-secondary my-3">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</main>

<!-- MAIN ENDS -->

<?php
include_once(DIR_URL . "/include/footer.php");
?>