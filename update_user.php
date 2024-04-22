<?php
// Include the database connection file
@include 'db_connect.php';

// Check if the request is for updating user data
if(isset($_POST['update_user'])) {
    // Retrieve data from the AJAX request
    $userId = $_POST['user_id'];
    $name = isset($_POST['name']) ? mysqli_real_escape_string($conn, $_POST['name']) : '';
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : '';

    // Update the user's name and email in the database
    $query = "UPDATE user_form SET name='$name', email='$email' WHERE id=$userId";
    if(mysqli_query($conn, $query)) {
        echo "User data updated successfully!";
    } else {
        echo "Error updating user data: " . mysqli_error($conn);
    }
} else {
    echo "No update action specified!";
}
?>