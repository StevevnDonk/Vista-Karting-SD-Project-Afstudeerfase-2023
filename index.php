<?php
// Include the database connection file

session_start();

// Controleer of de gebruiker is ingelogd
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    // Als de gebruiker niet is ingelogd, stuur ze naar de inlogpagina
    header("location: login.php");
    exit;
}

// Hier kun je andere code plaatsen die alleen zichtbaar moet zijn voor ingelogde gebruikers


include('../connection.php');

// SQL query to retrieve all user data
$sql = "SELECT * FROM gebruiker";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>User Information Admin Panel</title>
</head>
<body>
<p><a href="logout.php">Uitloggen</a></p>
    <h2>User Information</h2>
    <table border="1">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Voornaam</th>
                <th>Achternaam</th>
                <th>Tussenvoegsel</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Display user information in the table
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["UserID"] . "</td>";
                    echo "<td>" . $row["Voornaam"] . "</td>";
                    echo "<td>" . $row["Achternaam"] . "</td>";
                    echo "<td>" . $row["Tussenvoegsel"] . "</td>";
                    echo "<td>" . $row["Email"] . "</td>";
                    echo "<td>" . $row["Rol"] . "</td>";
                    
                    // Edit button
                    echo "<td>";
                    echo "<form method='post' action='edit.php'>";
                    echo "<input type='hidden' name='edit_user' value='" . $row["UserID"] . "'>";
                    echo "<button type='submit' name='edit_button'>Edit</button>";
                    echo "</form>";
                    echo "</td>";
                    
                    // Delete button
                    echo "<td>";
                    echo "<form method='post' action='delete.php'>";
                    echo "<input type='hidden' name='delete_user' value='" . $row["UserID"] . "'>";
                    echo "<button type='submit' name='delete_button'>Delete</button>";
                    echo "</form>";
                    echo "</td>";
                    
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No users found</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <?php
    // Close the database connection
    $conn->close();
    ?>
</body>
</html>
