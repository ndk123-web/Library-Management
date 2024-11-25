<?php

session_start();

include_once("../config/config.php");
include_once(DIR_URL . "config/database.php");
include_once(DIR_URL . "modules/book.php");
include_once(DIR_URL . "include/header.php");
include_once(DIR_URL . "include/topbar.php");



$id = null;

?>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $srow = getrow($conn, $id);
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
                    $title = $_POST['title'];
                    $isbn = $_POST['isbn'];
                    $author = $_POST['author'];
                    $publication_year = $_POST['publication_year'];
                    $category_id = $_POST['category_id'];
                    $id = $_POST['id'];

                    // Use the $id variable here
                    $update_book = updatebook($conn, $title, $isbn, $author, $publication_year, $category_id, $id);

                    if ($update_book) {
                        echo "<div class='alert alert-success'>Successfully updated the book.</div>";
                        $_SESSION['message']="success";
                        header("location: " . BASE_URL . "books/managebooks.php");
                        exit;
                    } else {
                        $_SESSION['error']="error";
                        header("location: " . BASE_URL . "books/managebooks.php");
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
                        <form action="<?php echo BASE_URL ?>/books/edit.php" method="post">

                            <!-- very imporatant to update info  -->
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <!-- very imporatant to update info  -->


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1"
                                            class="form-label">Book Name</label>
                                        <input type="text" name="title" class="form-control"
                                            id="exampleInputEmail1"
                                            aria-describedby="emailHelp" required value="<?php echo $srow['title'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1"
                                            class="form-label">ISBN number</label>
                                        <input type="number" name="isbn" class="form-control"
                                            id="exampleInputPassword1" required value="<?php echo $srow['isbn_no'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1"
                                            class="form-label">Author</label>
                                        <input type="text" name="author" class="form-control"
                                            id="exampleInputPassword1" required value="<?php echo $srow['author'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1"
                                            class="form-label">Publish Year</label>
                                        <input type="number" name="publication_year" class="form-control"
                                            id="exampleInputPassword1" required value="<?php echo $srow['publication_year'] ?>">
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
                                            <option value="<?php echo getid($conn, $srow['category_id']) ?>"><?php echo getid($conn, $srow['category_id']) ?>
                                            </option>

                                            <?php
                                            while ($row = $cats->fetch_assoc()) {
                                            ?>
                                                <option value="<?php echo $row['id'] ?>">
                                                    <?php
                                                    if ($srow['category_id'] != $row['id'])
                                                        echo $row['name'];
                                                    else
                                                        echo "Select Please";
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
                                <button name="update" type="submit"
                                    class="btn btn-success my-3 me-2">Update</button>
                                <a type="Cancel" name="cancel" href="./managebooks.php"
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