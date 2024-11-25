<?php
session_start();

include_once("../config/config.php");
include_once(DIR_URL . "config/database.php");
include_once(DIR_URL . "modules/student.php");
include_once(DIR_URL . "/include/header.php");
include_once(DIR_URL . "/include/topbar.php");
include_once(DIR_URL . "/include/sidebar.php");

$shows = showstudents($conn);      // to Show the books from which are coming from modules/book.php
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

              <?php
                if (isset($_SESSION['success'])) {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Successfully Added</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                    unset($_SESSION['success']);
                }

                else if(isset($_SESSION['serror'])){
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>There May be A Problem</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                    unset($_SESSION['serror']);
                }

                else if(isset($_SESSION['sduplicate'])){
                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Phone Number or Email already Exists</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                    unset($_SESSION['sduplicate']);
                }
                else if(isset($_SESSION['invalid_phone_length'])){
                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Length of Phone Number is Invalid</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                    unset($_SESSION['invalid_phone_length']);
                }

?>

                <div class="card">
                    <div class="card-header">
                        All Books
                    </div>
                    <div class="card-body">
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">FULL NAME</th>
                                    <th scope="col">PHONE NO.</th>
                                    <th scope="col">EMAIL</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = $shows->fetch_assoc()) {
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $row['id']; ?></th>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['phone_no']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td>
                                        <a type="button" class="btn btn-primary btn-sm" href="<?php echo BASE_URL ?>students/edit.php?id=<?php echo htmlspecialchars($row['id']); ?>">Edit</a>
                                        <a type="button" class="btn btn-danger btn-sm"  href="<?php echo BASE_URL ?>students/delete.php?id=<?php echo htmlspecialchars($row['id']); ?>">Delete</a>
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
include_once(DIR_URL . "/include/footer.php");
?>