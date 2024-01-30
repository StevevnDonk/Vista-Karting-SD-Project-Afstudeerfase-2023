<?php
// Include the database connection file
include('../connection.php');

// Function to delete a user by UserID
function deleteUser($conn, $userID) {
    $sql = "DELETE FROM gebruiker WHERE UserID = $userID";
    $result = $conn->query($sql);
    return $result;
}

// Check if the delete button is clicked
if (isset($_POST['delete_user'])) {
    $userIDToDelete = $_POST['delete_user'];
    deleteUser($conn, $userIDToDelete);
}

// Close the database connection
$conn->close();

// Redirect back to the admin panel after deletion
header('Location: index.php');
exit();
?>
