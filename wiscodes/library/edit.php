<?php
include("db.php");

$id = null; // Initialize $id

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM books WHERE id = $id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) { 
        $row = $result->fetch_assoc();
        $title = $row['title'];
        $author = $row['author'];
        $published_year = $row['published_year'];
    } else { 
        echo "No book found with ID: $id";
    }
}

// Handle form submission to update the book
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $published_year = $_POST['published_year'];
    $id = $_POST['id']; // Get the id from POST data

    if (!empty($title) && !empty($author) && !empty($published_year) && !empty($id)) { // Check if id is not empty
        $sql = "UPDATE books SET title='$title', author='$author', published_year='$published_year' WHERE id=$id";

        // Execute the SQL statement
        if ($conn->query($sql) === TRUE) {
            echo "Book updated successfully";
        } else {
            echo "Error editing record: " . $conn->error;
        }
    } else {
        echo "Please fill in all the fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
        <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h1, h2 {
            color: #2c3e50;
        }

        button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #2980b9;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .table th {
            background-color: #3498db;
            color: white;
        }
    </style>
</head>
<body>
    <h1>Edit Book</h1>
    <form method="post" action="edit.php">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>"> <!-- Hidden input for id -->
        
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($title); ?>"><br><br>
        
        <label for="author">Author:</label>
        <input type="text" id="author" name="author" value="<?php echo htmlspecialchars($author); ?>"><br><br>

        <label for="published_year">Published Year:</label>
        <input type="text" id="published_year" name="published_year" value="<?php echo htmlspecialchars($published_year); ?>"><br><br>
        
        <input type="submit" value="Update Book">
    </form>
    <br><a href="index.php">Back to Library</a>
</body>
</html>