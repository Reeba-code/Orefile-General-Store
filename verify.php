<?php
// Include the database connection file
include('db_connection.php');
session_start(); // Start the session to handle user sessions

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form inputs
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Prepare a query to fetch user data
    $stmt = $mysqli->prepare("SELECT username, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        
        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Password is correct, start the session
            $_SESSION['username'] = $username; // Store username in session

            // Redirect to checkout page
            header("Location: checkout.php");
            exit();
        } else {
            // Authentication failed
            $error_message = "Invalid username or password.";
        }
    } else {
        // User does not exist
        $error_message = "Invalid username or password.";
    }

    // Close statement
    $stmt->close();
}

// If there's an error message, display it
if (isset($error_message)) {
    echo "<p style='color: red;'>$error_message</p>";
}
?>
