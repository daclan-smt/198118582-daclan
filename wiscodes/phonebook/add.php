<?php
    include 'db.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Capture the input from the form
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);

        // Check if the input fields are not empty
        if (!empty($name) && !empty($phone)) {
            // Prepare the SQL statement
            $sql = "INSERT INTO contacts (name, phone) VALUES ('$name', '$phone')";

            // Execute the SQL statement
            if ($conn->query($sql) === TRUE) {
                echo "New contact added successfully";
            } else {
                echo "Failed to add new contact: " . $conn->error;
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
    <title>Add a New Contact</title>
</head>
<body>
    <h1>Add a New Contact</h1>
    <form method="post" action="add.php">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name"><br><br>
        
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone"><br><br>
        
        <input type="submit" value="Add Contact">
    </form>
    <br><a href="index.php">Back to Phonebook</a>
</body>
</html>
