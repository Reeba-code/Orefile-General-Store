<?php
// Start the session
session_start();

include 'config.php';

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Initialize the total amount
$total = 0;


if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    
    foreach ($_SESSION['cart'] as $product_id => $quantity) {
        $result = $mysqli->query("SELECT product_code, product_name, price FROM products WHERE id = " . $product_id);
        if ($result) {
            while ($obj = $result->fetch_object()) {
                $cost = $obj->price * $quantity;
                $total += $cost; 
            }
        }
    }
}


echo "Total Amount: " . $total;

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout || Orefile General Dealer</title>
    <link rel="stylesheet" href="css/foundation.css">
    <script src="js/vendor/modernizr.js"></script>
</head>
<body>

    <nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">
          <h1><a href="index.php">Orefile General Dealer</a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
      </ul>
      <section class="top-bar-section">
        <ul class="right">
          <li><a href="about.php">About</a></li>
          <li><a href="products.php">Products</a></li>
          <li><a href="cart.php">View Cart</a></li>
          <li class="active"><a href="checkout.php">Checkout</a></li>
          <li><a href="contact.php">Contact</a></li>
          <?php
          if(isset($_SESSION['username'])){
            echo '<li><a href="account.php">My Account</a></li>';
            echo '<li><a href="logout.php">Log Out</a></li>';
          }
          ?>
        </ul>
      </section>
    </nav>

    <div class="row" style="margin-top:20px;">
      <div class="large-12">
        <h2>Checkout</h2>

        <?php
        if(isset($_SESSION['cart'])) {
            $total = 0;
            echo '<table>';
            echo '<tr>';
            echo '<th>Code</th>';
            echo '<th>Name</th>';
            echo '<th>Quantity</th>';
            echo '<th>Cost</th>';
            echo '</tr>';

            foreach($_SESSION['cart'] as $product_id => $quantity) {
                $result = $mysqli->query("SELECT product_code, product_name, price FROM products WHERE id = ".$product_id);
                if($result) {
                    while($obj = $result->fetch_object()) {
                        $cost = $obj->price * $quantity;
                        $total += $cost;
                        echo '<tr>';
                        echo '<td>'.$obj->product_code.'</td>';
                        echo '<td>'.$obj->product_name.'</td>';
                        echo '<td>'.$quantity.'</td>';
                        echo '<td>'.$cost.'</td>';
                        echo '</tr>';
                    }
                }
            }

            echo '<tr>';
            echo '<td colspan="3" align="right">Total</td>';
            echo '<td>'.$total.'</td>';
            echo '</tr>';
            echo '</table>';
        } else {
            echo '<p>Your cart is empty. <a href="products.php">Go back to products.</a></p>';
        }
        ?>


<!-- Checkout Form -->
<h3>Delivery and Payment Information</h3>
<form action="payment.php" method="POST">
    <!-- Pickup or Delivery Option -->
    <label>Choose Pickup or Delivery:</label><br>
    <input type="radio" name="order_type" value="Collect" id="collect" onclick="toggleAddressFields()" required> Collect
    <input type="radio" name="order_type" value="Delivery" id="delivery" onclick="toggleAddressFields()" required> Delivery

    <!-- Address Fields (shown only if 'Delivery' is selected) -->
    <div id="addressFields" style="display:none;">
        <label for="name">Full Name:</label>
        <input type="text" name="name" id="name">

        <label for="address">Address:</label>
        <input type="text" name="address" id="address">

        <label for="city">Village:</label>
        <input type="text" name="city" id="city">

        <label for="postcode">Postal Code:</label>
        <input type="text" name="postcode" id="postcode">
    </div>

    <!-- Payment Method -->
    <label for="payment">Payment Method:</label>
    <select name="payment_method">
        <option value="PayFast">PayFast</option>
        <option value="Credit Card">Credit Card</option>
    </select>

    <!-- Proceed to Payment -->
    <input type="hidden" name="total_cost" value="<?php echo $total; ?>">
    <input type="submit" value="Proceed to Payment" class="button success">
</form>

      </div>
    </div>

    <footer>
        <p style="text-align:center; font-size:0.8em;">&copy; 2024 Mafikeng Digital Innovation Hub. All rights reserved.</p>
    </footer>

    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();

      // Toggle visibility of address fields based on delivery option
      function toggleAddressFields() {
        var deliveryOption = document.getElementById('delivery');
        var addressFields = document.getElementById('addressFields');

        if(deliveryOption.checked) {
          addressFields.style.display = 'block';  // Show address fields
          document.getElementById('name').required = true; // Set as required
          document.getElementById('address').required = true;
          document.getElementById('city').required = true;
          document.getElementById('postcode').required = true;
        } else {
          addressFields.style.display = 'none';  // Hide address fields
          document.getElementById('name').required = false; // Remove required fields
          document.getElementById('address').required = false;
          document.getElementById('city').required = false;
          document.getElementById('postcode').required = false;
        }
      }
    </script>
</body>
</html>
