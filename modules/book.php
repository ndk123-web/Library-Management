<?php

// <---------------------------------------------------->
// ADD BOOKS STARTS

// Function to store book using prepared statements to prevent SQL injection
function storeBook($conn, $params)
{
    // First, check if the title already exists in the database
    $check_sql = "SELECT id FROM books WHERE title = ? and isbn_no = ?";
    $stmt = $conn->prepare($check_sql);
    if (!$stmt) {
        return $conn->error;
    }
    $stmt->bind_param("ss", $params['title'], $params['isbn_no']);
    $stmt->execute();
    $result = $stmt->get_result();
    $num_rows = $result->num_rows;

    if ($num_rows > 0) {
        $stmt->close();
        return "duplicate"; // Title or ISBN already exists
    }

    // If the title is unique, proceed with the insertion
    $stmt->close();  // Close the previous statement

    $datetime = date('Y-m-d H:i:s');
    $sql = "INSERT INTO books (title, author, publication_year, isbn_no, category_id, created_at)
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die('Prepare failed: ' . $conn->error);  // SQL preparation error
    }

    // Bind parameters for insertion
    $stmt->bind_param("ssisis", $params['title'], $params['author'], $params['publication_year'], $params['isbn'], $params['category_id'], $datetime);

    try {
        if ($stmt->execute()) {
            $stmt->close();
            return "success";  // Successful insertion
        } else {
            $stmt->close();
            return "error";  // Insertion failed
        }
    } catch (mysqli_sql_exception $e) {
        $stmt->close();
        return "duplicate"; // Duplicate title error
    }
}


// Function to get categories
function getCategories($conn)
{
    $sql = "SELECT id, name FROM categories";
    $res = $conn->query($sql);

    if (!$res) {
        // Handle error
        die('Error: ' . $conn->error);
    }

    return $res;
}

// ADD BOOKS ENDS
// <---------------------------------------------------->


// Manage BOOKS STARTS
// <---------------------------------------------------->

function showbooks($conn)
{
    $sql = "SELECT id,title,publication_year,author,isbn_no from books";
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
function specificid($conn, $id)
{
    $sql = "SELECT * from books where id=$id";
    $res = $conn->query($sql);

    if (!$res) {
        exit();
    }
    return $res;
}
?>

<?php
function getid($conn, $id)
{
    $sql = "SELECT name from categories where id = $id";
    $res = $conn->query($sql);

    if (!$res) {
        exit();
    }
    $row = $res->fetch_assoc();
    if ($row)
        return $row['name'];
    else
        return "Select please";
}
?>

<?php
function updatebook($conn, $title, $isbn, $author, $publication_year, $category_id, $id)
{
    $sql = "SELECT * from books where isbn_no =  '$isbn' and  id != $id";

    $res = $conn->query($sql);

    if ($res->num_rows > 0) {
        $_SESSION['duplicate'] = 'duplicate';
        header("location: " . BASE_URL . "books/managebooks.php");
        exit;
    } else {
        $sql = "UPDATE books SET title = '$title', isbn_no = '$isbn', author = '$author', publication_year = '$publication_year', category_id = '$category_id' WHERE id = '$id'";
        $result = $conn->query($sql);
        return $result;
    }
}
?>

<?php
function getrow($conn, $id)
{
    $sql = "SELECT * from books WHERE id = $id";
    $res = $conn->query($sql);
    if (!$res) {
        exit;
    }
    $row = $res->fetch_assoc();
    return $row;
}
?>

<?php
function deleteRow($conn, $id)
{
    $sql = "DELETE FROM books WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Redirect to manage books page after successful deletion
        header("Location: " . BASE_URL . "/books/managebooks.php");
        exit;
    } else {
        // Handle deletion failure
        echo "Error deleting book: " . mysqli_error($conn);
    }
}
?>
