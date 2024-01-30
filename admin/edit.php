<?php
// Include the database connection file

include('../connection.php');

// Function to get user details by UserID
function getUserDetails($conn, $userID) {
    $sql = "SELECT * FROM gebruiker WHERE UserID = $userID";
    $result = $conn->query($sql);
    return ($result->num_rows > 0) ? $result->fetch_assoc() : null;
}

// Check if the edit form is submitted
if (isset($_POST['edit_user'])) {
    $userIDToEdit = $_POST['edit_user'];
    $userDetails = getUserDetails($conn, $userIDToEdit);

    if ($userDetails) {
        // Display the edit form with user details
        echo "<h2>Edit User</h2>";
        echo "<form method='post' action='edit.php'>";
        echo "<input type='hidden' name='userID' value='" . $userDetails['UserID'] . "'>";
        echo "Voornaam: <input type='text' name='voornaam' value='" . $userDetails['Voornaam'] . "'><br>";
        echo "Achternaam: <input type='text' name='achternaam' value='" . $userDetails['Achternaam'] . "'><br>";
        echo "Tussenvoegsel: <input type='text' name='tussenvoegsel' value='" . $userDetails['Tussenvoegsel'] . "'><br>";
        echo "Email: <input type='text' name='email' value='" . $userDetails['Email'] . "'><br>";
        echo "Rol: <input type='text' name='rol' value='" . $userDetails['Rol'] . "'><br>";
        echo "<button type='submit' name='update_user'>Update</button>";
        echo "</form>";
    }
}

// Check if the update button is clicked
if (isset($_POST['update_user'])) {
    $userIDToUpdate = $_POST['userID'];
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $tussenvoegsel = $_POST['tussenvoegsel'];
    $email = $_POST['email'];
    $rol = $_POST['rol'];

    // Update user details
    $sql = "UPDATE gebruiker SET Voornaam='$voornaam', Achternaam='$achternaam', Tussenvoegsel='$tussenvoegsel', Email='$email', Rol='$rol' WHERE UserID = $userIDToUpdate";
    $result = $conn->query($sql);

    // Redirect back to the admin panel after update
    header('Location: index.php');
    exit();
}

// Close the database connection
$conn->close();
?>
