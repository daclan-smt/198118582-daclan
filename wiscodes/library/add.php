<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture the input from the form
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $published_year = mysqli_real_escape_string($conn, $_POST['published_year']);

    // Check if the input fields are not empty
    if (!empty($title) && !empty($author) && !empty($published_year)) {
        // Prepare the SQL statement
        $sql = "INSERT INTO books (title, author, published_year) VALUES ('$title', '$author', '$published_year')";

        // Execute the SQL statement
        if ($conn->query($sql) === TRUE) {
            echo "New book added successfully";
        } else {
            echo "Failed to add new book: " . $conn->error;
        }
    } else {
        echo "Please fill in all fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a New Book</title>
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
    <h1>Add a New Book</h1>
    <form method="post" action="add.php">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title"><br><br>
        
        <label for="author">Author:</label>
        <input type="text" id="author" name="author"><br><br>

        <label for="published_year">Published Year:</label>
        <input type="text" id="published_year" name="published_year"><br><br>
        
        <input type="submit" value="Add Book">
    </form>
    <br><a href="index.php">Back to Library</a>
</body>
</html>