<?php
session_start();

include_once("../config/config.php");
include_once(DIR_URL . "config/database.php");
include_once(DIR_URL . "modules/loans.php");
include_once(DIR_URL . "include/header.php");
include_once(DIR_URL . "include/topbar.php");

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
                if (isset($_POST['publish'])) {
                    $res = create($conn, $_POST);
                    if ($res == "success") {
                        $_SESSION['success']='success';
                        header("location: ".BASE_URL."book_loan/manageloans.php");
                        exit;
                    } else {
                       $_SESSION['error']='error';
                       header("location: ".BASE_URL."book_loan/manageloans.php");
                       exit;
                    }
                }
            }
            ?>

            <div class="col-md-12">
                <h4 class="fw-bold text-uppercase ">Add Books</h4>
            </div>

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            Fill the Form
        </div>
        <div class="card-body">
            <form action="<?php echo BASE_URL ?>/book_loan/add.php" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="selectBook" class="form-label">Select Book</label>
                            <?php
                            $books = getbooks($conn);
                            ?>
                            <select name="book_id" class="form-control" required>
                                <option value="">Select Category / Course</option>
                                <?php
                                while ($row1 = $books->fetch_assoc()) {
                                ?>
                                    <option value="<?php echo $row1['id'] ?>">
                                        <?php echo $row1['title']; ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                <div class="col-md-6">
                        <div class="mb-3">
                            <label for="selectBook" class="form-label">Select Student</label>
                            <?php
                            $students = getStudents($conn);
                            ?>
                            <select name="student_id" class="form-control" required>
                                <option value="">Select Student</option>
                                <?php
                                while ($row2 = $students->fetch_assoc()) {
                                ?>
                                    <option value="<?php echo $row2['id'] ?>">
                                        <?php echo $row2['name']; ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="loan_date" class="form-label">Loan Date</label>
                            <input type="date" name="loan_date" class="form-control" id="loanDate" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="return_date" class="form-label">Return Date</label>
                            <input type="date" name="return_date" class="form-control" id="returnDate" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button name="publish" type="submit" class="btn btn-success my-3 me-2">Add</button>
                        <a type="button" href="./managebooks.php" class="btn btn-secondary my-3">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</main>

<!-- MAIN ENDS -->

<?php
include_once(DIR_URL . "include/sidebar.php");
include_once(DIR_URL . "/include/footer.php");
?>