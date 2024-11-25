<?php

session_start();

include_once("../config/config.php");
include_once(DIR_URL . "config/database.php");
include_once(DIR_URL . "modules/student.php");
include_once(DIR_URL . "include/header.php");
include_once(DIR_URL . "include/topbar.php");



$id = null;

?>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $srow = getrow($conn, $id);     // specific row returns
        if (!$srow) {
            exit;
        }
    }
}

?>

<main class="mt-1 pt-3">
    <div class="container-fluid">
        <div class="row dashboard-counts">

            <!-- CARDS -->

            <!-- PHP CODE FOR SUCCESS OR FAILED TO ADD BOOK IN DB -->
            <!-- PHP CODE FOR SUCCESS OR FAILED TO ADD BOOK IN DB -->
            <!-- MAIN STARTS -->

            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['update'])) {
                    $fullname = $_POST['fullname'];
                    $phone_no = $_POST['phone_no'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $id = $_POST['id'];

                    // Use the $id variable here
                    $update_book = updatestudent($conn, $fullname,$phone_no,$email,$address,$id);
                
                    if ($update_book) {
                        echo "<div class='alert alert-success'>Successfully updated the book.</div>";
                        $_SESSION['success']="success";
                        header("location: " . BASE_URL . "students/managestudents.php");
                        exit;
                    }else{
                        $_SESSION['serror']=='serror';
                        header("location:".BASE_URL."students/managestudents.php");
                        exit;
                    }
                }
            }
            ?>

            <div class="col-md-12">
                <h4 class="fw-bold text-uppercase ">Update Books</h4>
            </div>

            <div col-md-12>
                <div class="card">
                    <div class="card-header">
                        Fill the Form
                    </div>
                    <div class="card-body">
                        <form action="<?php echo BASE_URL ?>/students/edit.php" method="post">

                            <!-- very imporatant to update info  -->
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <!-- very imporatant to update info  -->


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1"
                                            class="form-label">FullName</label>
                                        <input type="text" name="fullname" class="form-control"
                                            id="exampleInputEmail1"
                                            aria-describedby="emailHelp" required value="<?php echo $srow['name'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1"
                                            class="form-label">Phone No</label>
                                        <input type="number" name="phone_no" class="form-control"
                                            id="exampleInputPassword1" required value="<?php echo $srow['phone_no'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1"
                                            class="form-label">Email</label>
                                        <input type="text" name="email" class="form-control"
                                            id="exampleInputPassword1" required value="<?php echo $srow['email'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1"
                                            class="form-label">Address</label>
                                        <input type="text" name="address" class="form-control"
                                            id="exampleInputPassword1" required value="<?php echo $srow['address'] ?>">
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-12">
                                <button name="update" type="submit"
                                    class="btn btn-success my-3 me-2">Update</button>
                                <a type="Cancel" name="cancel" href="./managestudents.php"
                                    class="btn btn-secondary my-3">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</main>


<?php
include_once(DIR_URL . "/include/footer.php");
include_once(DIR_URL . "include/sidebar.php");
?>