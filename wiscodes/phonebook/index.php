<?php
    include("db.php");

    // SQL query to select all contacts
    $sql = "SELECT * FROM contacts";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phonebook</title>
</head>
<body>
    <h2>Phonebook</h2>

    <table border="1">
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Action</th>
            <th>Edit</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["name"]. "</td>";
                echo "<td>" . $row["phone"]. "</td>";
                echo "<td><a href='delete.php?id=" . $row["id"] . "'>Delete</a></td>";
                echo "<td><a href='edit.php?id=" . $row["id"] . "'>edit</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No contacts found</td></tr>";
        }
        ?>
    </table>
    <br><a href="add.php">Add New Contact</a>
</body>
</html>
