<?php
@include 'db_connect.php';

// Check if the form is submitted for user deletion
if(isset($_POST['user_id'])){
    $id = $_POST['user_id'];
    $query = "DELETE FROM user_form WHERE id = $id";
    if(mysqli_query($conn, $query)) {
        echo "User/Admin deleted successfully!";
    } else {
        echo "Error deleting user/admin: " . mysqli_error($conn);
    }
} else {
    echo "No user ID provided!";
}
?>