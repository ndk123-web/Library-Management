<?php
include_once("../config/config.php");
include_once(DIR_URL . "config/database.php");
include_once(DIR_URL . "modules/student.php");
include_once(DIR_URL . "include/header.php");
include_once(DIR_URL . "include/topbar.php");

$shows = showstudents($conn);
?>


<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
        exit("Invalid ID");
    }
    $id = $_GET["id"];
    $res = deletestudent($conn, $id);
    if ($res) {
        header("Location: " . BASE_URL . "/students/managestudents.php");
        exit;
    } else {
        echo "Error deleting book: " . mysqli_error($conn);
    }
}

?>

<!-- MAIN STARTS -->


<main class="mt-1 pt-3">
    <div class="container-fluid">
        <!-- CARDS -->
        <div class="row dashboard-counts">
            <div class="col-md-12">
                <h4 class="fw-bold text-uppercase">Manage Books</h4>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        All Books
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Book Name</th>
                                    <th scope="col">Publication Year</th>
                                    <th scope="col">Author</th>
                                    <th scope="col">ISBN</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = $shows->fetch_assoc()) {
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $row['id']; ?></th>
                                        <td><?php echo $row['title']; ?></td>
                                        <td><?php echo $row['publication_year']; ?></td>
                                        <td><?php echo $row['author']; ?></td>
                                        <td><?php echo $row['isbn_no']; ?></td>
                                        <td>
                                            <a type="button" class="btn btn-primary btn-sm" href="<?php echo BASE_URL ?>books/edit.php?id=<?php echo htmlspecialchars($row['id']); ?>">Edit</a>
                                            <a type="button" class="btn btn-danger btn-sm" href="<?php echo BASE_URL ?>books/delete.php?id=<?php echo htmlspecialchars($row['id']); ?>">Delete</a>
                                        </td>
                                    </tr> <!-- Moved inside the loop -->
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</main>


<!-- MAIN ENDS -->

<?php
include_once(DIR_URL . "include/sidebar.php");
include_once(DIR_URL . "/include/footer.php");
?>