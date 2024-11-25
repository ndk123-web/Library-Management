<?php
include_once("../config/config.php");
include_once(DIR_URL . "config/database.php");
include_once(DIR_URL . "modules/book.php");
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
                if (isset($_POST['publish'])) {
                    $res = storeBook($conn, $_POST);
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
                            <strong>Duplicate title or ISBN. Please try again.</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Error: <?php echo $res ?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                    }
                }
            }
            ?>

            <div class="col-md-12">
                <h4 class="fw-bold text-uppercase ">Add Books</h4>
            </div>

            <div col-md-12>
                <div class="card">
                    <div class="card-header">
                        Fill the Form
                    </div>
                    <div class="card-body">
                        <form action="<?php echo BASE_URL ?>/books/add.php" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1"
                                            class="form-label">Book Name</label>
                                        <input type="text" name="title" class="form-control"
                                            id="exampleInputEmail1"
                                            aria-describedby="emailHelp" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1"
                                            class="form-label">ISBN number</label>
                                        <input type="number" name="isbn" class="form-control"
                                            id="exampleInputPassword1" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1"
                                            class="form-label">Author</label>
                                        <input type="text" name="author" class="form-control"
                                            id="exampleInputPassword1" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1"
                                            class="form-label">Publish Year</label>
                                        <input type="number" name="publication_year" class="form-control"
                                            id="exampleInputPassword1" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1"
                                            class="form-label">Categories /
                                            Course</label>
                                        <?php
                                        $cats = getcategories($conn);
                                        ?>
                                        <select name="category_id" class="form-control" required>
                                            <option value>Select Category /
                                                Course</option>

                                            <?php
                                            while ($row = $cats->fetch_assoc()) {
                                            ?>
                                                <option value="<?php echo $row['id'] ?>">
                                                    <?php
                                                    echo $row['name'];
                                                    ?>
                                                </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-12">
                                <button name="publish" type="submit"
                                    class="btn btn-success my-3 me-2">Add</button>
                                <a type="Cancel"  href="./managebooks.php"
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