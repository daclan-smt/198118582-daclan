<?php
include("db.php");

// SQL query to select all books
$sql = "SELECT * FROM books";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
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
    <h2>Library</h2>

    <table border="1">
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Published Year</th>
            <th>Action</th>
            <th>Edit</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["title"]. "</td>";
                echo "<td>" . $row["author"]. "</td>";
                echo "<td>" . $row["published_year"]. "</td>";
                echo "<td><a href='delete.php?id=" . $row["id"] . "'>Delete</a></td>";
                echo "<td><a href='edit.php?id=" . $row["id"] . "'>Edit</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No books found</td></tr>";
        }
        ?>
    </table>
    <br><a href="add.php">Add New Book</a>
</body>
</html>