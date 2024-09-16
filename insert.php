<?php
session_start();
include 'config.php'; // Include your database connection configuration

// Check if the form data is submitted via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve POST data
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $city = isset($_POST['city']) ? $_POST['city'] : '';
    $postcode = isset($_POST['postcode']) ? $_POST['postcode'] : '';
    $payment_method = isset($_POST['payment_method']) ? $_POST['payment_method'] : '';
    $total_cost = isset($_POST['total_cost']) ? $_POST['total_cost'] : '';
    $order_type = isset($_POST['order_type']) ? $_POST['order_type'] : '';

    // Default order status
    $order_status = 'Processing';

    // Prepare SQL query based on order type
    if ($order_type === 'Delivery') {
        $stmt = $mysqli->prepare("INSERT INTO orders (username, name, address, city, postcode, payment_method, total_cost, order_type, order_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('sssssssss', $_SESSION['username'], $name, $address, $city, $postcode, $payment_method, $total_cost, $order_type, $order_status);
    } else {
        $stmt = $mysqli->prepare("INSERT INTO orders (username, payment_method, total_cost, order_type, order_status) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param('sssss', $_SESSION['username'], $payment_method, $total_cost, $order_type, $order_status);
    }

    // Execute the statement and check for success
    if ($stmt->execute()) {
        // Get the last inserted order ID
        $order_id = $mysqli->insert_id;

        // Store the order_id in session
        $_SESSION['order_id'] = $order_id;

        // Optionally redirect or display a success message
        echo "Order placed successfully. Your Order ID is " . $order_id;
        // Redirect to a success page or payment page
        // header('Location: success.php');
        // exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $mysqli->close();
} else {
    echo "No data submitted.";
}
?>
