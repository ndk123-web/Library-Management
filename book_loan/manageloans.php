<?php
session_start();
include_once("../config/config.php");
include_once(DIR_URL . "config/database.php");
include_once(DIR_URL . "modules/loans.php");
include_once(DIR_URL . "/include/header.php");
include_once(DIR_URL . "/include/topbar.php");
include_once(DIR_URL . "/include/sidebar.php");

$shows = showloans($conn); // Ensure this function is secure and uses prepared statements


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
                    <strong>Book Loan Successfully Added</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                    unset($_SESSION['success']);
                }
                elseif (isset($_SESSION['error'])) {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>There May be A Problem</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                    unset($_SESSION['error']);
                }
                elseif (isset($_SESSION['duplicate'])) {
                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Isbn Number already exists</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                    unset($_SESSION['duplicate']);
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
                                    <th scope="col">Book Name</th>
                                    <th scope="col">Student Name</th>
                                    <th scope="col">Loan Date</th>
                                    <th scope="col">Return Date</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1; // Initialize the counter variable
                                while ($row = $shows->fetch_assoc()) {
                                ?>
                                <tr>
                <th scope="row"><?php echo $i++ ?></th>
                <td><?php echo htmlspecialchars($row['book_title'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($row['student_name'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo date("d-m-Y", strtotime($row['loan_date'])); ?></td>
                <td><?php echo date("d-m-Y", strtotime($row['return_date'])); ?></td>
                <td>
                    <?php
                    if ($row['is_return'] == 1)
                        echo '<span class="badge text-bg-success">Returned</span>';
                    else
                        echo '<span class="badge text-bg-warning">Active</span>';
                    ?>
                </td>
                <td><?php echo date("d-m-Y h:i A", strtotime($row['created_at'])); ?></td>
                <td>
                    <a href="<?php echo BASE_URL ?>loans/edit.php?id=<?php echo $row['id'] ?>" class="btn btn-primary btn-sm">
                        Edit
                    </a>
                    <a onclick="return confirm('Are you sure?')" href="<?php echo BASE_URL ?>loans?action=delete&id=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm">
                        Delete
                    </a>
                    <?php
                    if (!$row['is_return']) { ?>
                        <a href="<?php echo BASE_URL ?>loans?action=status&id=<?php echo $row['id'] ?>&status=1" class="btn btn-success btn-sm">
                            Returned
                        </a>
                    <?php  } ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php include_once(DIR_URL . "/include/footer.php"); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>