<?php
include("db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare the SQL statement
    $sql = "DELETE FROM books WHERE id = $id";

    // Execute the SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "Book deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    // Redirect to index.php after deletion
    header("Location: index.php");
}
?>