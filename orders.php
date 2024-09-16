<?php
// Include the database connection file
include('config.php');
session_start(); // Start the session to handle user sessions

// Ensure the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: orders.php");
    exit();
}

// Fetch user ID from session
$username = $_SESSION['username'];

// Prepare a query to get user orders
$stmt = $mysqli->prepare("
    SELECT orders.id AS order_id, orders.order_date, order_items.product_name, order_items.quantity, order_items.price
    FROM orders
    INNER JOIN order_items ON orders.id = order_items.order_id
    WHERE orders.username = ?
    ORDER BY orders.order_date DESC
");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// Fetch orders
$orders = [];
while ($row = $result->fetch_assoc()) {
    $orders[] = $row;
}

// Close statement
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #004d00;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #003300;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .receipt-button {
            background: #004d00;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 1em;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 20px;
        }
        .receipt-button:hover {
            background: #003300;
        }
        .track-button {
            background: #007bff;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 1em;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 20px;
        }
        .track-button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Order History</h1>
        
        <?php if (empty($orders)): ?>
            <p>You have no orders yet.</p>
        <?php else: ?>
            <?php
            // Group orders by order ID
            $orderGroups = [];
            foreach ($orders as $order) {
                $orderGroups[$order['order_id']]['order_date'] = $order['order_date'];
                $orderGroups[$order['order_id']]['items'][] = $order;
            }
            ?>

            <?php foreach ($orderGroups as $orderId => $orderGroup): ?>
                <h2>Order ID: <?php echo htmlspecialchars($orderId); ?></h2>
                <p>Date: <?php echo htmlspecialchars($orderGroup['order_date']); ?></p>

                <table>
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                    <?php foreach ($orderGroup['items'] as $item): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($item['product_name']); ?></td>
                            <td><?php echo htmlspecialchars($item['quantity']); ?></td>
                            <td><?php echo htmlspecialchars($item['price']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                
                <a href="receipt.php?order_id=<?php echo htmlspecialchars($orderId); ?>" class="receipt-button">View Receipt</a>
                <a href="track_order.php?order_id=<?php echo htmlspecialchars($orderId); ?>" class="track-button">Track Order</a>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</body>
</html>
