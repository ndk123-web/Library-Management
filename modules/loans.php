<?php
include_once("../config/config.php");
include_once(DIR_URL . "config/database.php");
?>

<?php
    function getBooks($conn) {

        $sql = "SELECT * FROM books";
        $res = $conn->query($sql);

        if (!$res || $res->num_rows == 0) {
            // Better error handling
            return false;
        }

        return $res;
    }
?>

<?php
    function getStudents($conn) {

        $sql = "SELECT * FROM students";
        $res = $conn->query($sql);

        if (!$res || $res->num_rows == 0) {
            // Better error handling
            return false;
        }

        return $res;
    }
?>

<?php

// <---------------------------------------------------->
// ADD BOOKS STARTS
// Function to create student using prepared statements to prevent SQL injection
function create($conn, $params) {
    // Assuming $params is an associative array with keys 'book_id', 'student_id', 'loan_date', 'return_date'

    $book_id = $params['book_id'];
    $student_id = $params['student_id'];
    $loan_date = $params['loan_date'];
    $return_date = $params['return_date'];
    $datetime = date("Y-m-d H:i:s");

    // Prepare the SQL statement to prevent SQL injection
    $sql = $conn->prepare("INSERT INTO book_loans (book_id, student_id, loan_date, return_date, created_at) VALUES (?, ?, ?, ?, ?)");
    $sql->bind_param('iisss', $book_id, $student_id, $loan_date, $return_date, $datetime);

    if ($sql->execute()) {
        return "success";
    } else {
        return "error";
    }

}



// ADD BOOKS ENDS
// <---------------------------------------------------->


// Manage BOOKS STARTS
// <---------------------------------------------------->

function showloans($conn)
{
   $sql = "select l.*, b.title as book_title, s.name as student_name
        from book_loans l
        inner join books b on b.id = l.book_id
        inner join students s on s.id = l.student_id
        order by l.id desc;
    ";
    $result = $conn->query($sql);
    return $result;
}

// Manage BOOKS ENDS
// <---------------------------------------------------->

?>


<?php
function updatestudent($conn, $fullname, $phone_no, $email, $address, $id)
{
    // Prepare the SQL statement
     if (strlen($phone_no) != 10) {
        $_SESSION['invalid_phone_length']='invalid_phone_len';
        header("Location: " . BASE_URL . "students/managestudents.php");
        exit;
    }
    $stmt = $conn->prepare("SELECT * FROM students WHERE (phone_no = ? OR email = ?) AND id != ?");
    $stmt->bind_param("ssi", $phone_no, $email, $id); // Using prepared and parameterized queries
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows > 0) {
        $_SESSION['sduplicate'] = 'sduplicate';
        header("Location: " . BASE_URL . "students/managestudents.php");
        exit();
    } else {
        $stmt = $conn->prepare("UPDATE students SET name = ?, phone_no = ?, email = ?, address = ? WHERE id = ?");
        $stmt->bind_param("sissi", $fullname, $phone_no, $email, $address, $id); // Using prepared and parameterized queries
        $result = $stmt->execute();
        return $result;
    }
}
?>

<?php
function getrow($conn, $id)
{
    $sql = "SELECT * from students WHERE id = $id";
    $res = $conn->query($sql);
    if (!$res) {
        exit;
    }
    $row = $res->fetch_assoc();
    return $row;
}
?>

<?php
function deletestudent($conn, $id)
{
    $sql = "DELETE FROM students WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Redirect to manage books page after successful deletion
        header("Location: " . BASE_URL . "/students/managestudents.php");
        exit;
    } else {
        // Handle deletion failure
        echo "Error deleting book: " . mysqli_error($conn);
    }
}
?>