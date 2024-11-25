<?php

// <---------------------------------------------------->
// ADD BOOKS STARTS
// Function to create student using prepared statements to prevent SQL injection
function create($conn, $params)
{
    $phone_no = $params['phone_no'];
    $email = $params['email'];

    // Check if phone number is exactly 10 digits long
    if (strlen($phone_no) != 10) {
        return "invalid_phone"; // Invalid phone number length
    }

    // Check if phone number or email already exists
    $checkSql = "SELECT COUNT(*) as email_count,
                        (SELECT COUNT(*) FROM students WHERE phone_no = ?) as phone_count
                 FROM students WHERE email = ?";
    $checkStmt = $conn->prepare($checkSql);
    if (!$checkStmt) {
        error_log('Prepare failed: ' . $conn->error);  // Use error_log for logging
        return "error";
    }
    $checkStmt->bind_param("ss", $phone_no, $email);
    $checkStmt->execute();
    $result = $checkStmt->get_result();
    $row = $result->fetch_assoc();
    if ($row['email_count'] > 0 || $row['phone_count'] > 0) {
        $checkStmt->close();
        return "already_exists"; // Phone number or email already exists
    }
    $checkStmt->close();

    // Proceed with the insertion if email and phone number do not exist
    $datetime = date('Y-m-d H:i:s');
    $sql = "INSERT INTO students (name, phone_no, email, address, created_at)
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        error_log('Prepare failed: ' . $conn->error);  // Use error_log for logging
        return "error";
    }

    // Bind parameters for insertion
    $stmt->bind_param("sssss", $params['fullname'], $phone_no, $email, $params['address'], $datetime);
    try {
        if ($stmt->execute()) {
            $stmt->close();
            return "success";  // Successful insertion
        } else {
            $stmt->close();
            return "error";  // Insertion failed
        }
    } catch (mysqli_sql_exception $e) {
        error_log('Execution failed: ' . $e->getMessage());  // Log exception message
        $stmt->close();
        return "error"; // Other execution errors
    }
}


// ADD BOOKS ENDS
// <---------------------------------------------------->


// Manage BOOKS STARTS
// <---------------------------------------------------->

function showstudents($conn)
{
    $sql = "SELECT * from students";
    $res = $conn->query($sql);

    if (!$res) {
        die('Error: ' . $conn->error);
    }
    return $res;
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