<?php
include("db.php");

$id = null; // Initialize $id

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM contacts WHERE id = $id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) { 
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $phone = $row['phone'];
    } else { 
        echo "No contact found with ID: $id";
    }
}

// Handle form submission to update the contact
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $id = $_POST['id']; // Get the id from POST data

    if (!empty($name) && !empty($phone) && !empty($id)) { // Check if id is not empty
        $sql = "UPDATE contacts SET name='$name', phone='$phone' WHERE id=$id";

        // Execute the SQL statement
        if ($conn->query($sql) === TRUE) {
            echo "Contact updated successfully";
        } else {
            echo "Error editing record: " . $sql . "<br>" . $conn->error;
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
    <title>Edit Contact</title>
</head>
<body>
    <h1>Edit Contact</h1>
    <form method="post" action="edit.php">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>"> <!-- Hidden input for id -->
        
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>"><br><br>
        
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($phone); ?>"><br><br>
        
        <input type="submit" value="Update Contact">
    </form>
    <br><a href="index.php">Back to Phonebook</a>
</body>
</html>