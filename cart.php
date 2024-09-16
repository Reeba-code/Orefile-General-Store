<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';


?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shopping Cart || Orefile General Dealer</title>
  </head>
  <style>
         /* General Reset */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Baskerville SC', serif;
}

/* Header Navigation */
.top-bar {
  background-color: #003300; /* Green background */
  padding: 15px 20px; /* Add padding */
  position: fixed; /* Fixed at the top */
  top: 0;
  width: 100%; /* Full width */
  z-index: 1000; /* Ensures the header stays on top */
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.top-bar .title-area h1 a {
  color: #fff; /* White text for the brand name */
  text-decoration: none; /* No underline */
  font-size: 2em; /* Large font size */
  font-weight: bold; /* Bold font */
}

.toggle-topbar.menu-icon {
  display: none; /* Initially hidden for desktop */
}

.top-bar-section ul {
  list-style: none; /* Remove bullet points */
  display: flex; /* Flex for horizontal layout */
  gap: 20px; /* Space between menu items */
}

.top-bar-section ul li a {
  color: #fff; /* White text */
  text-decoration: none; /* No underline */
  padding: 10px 20px; /* Padding inside links */
  transition: background-color 0.3s; /* Smooth hover transition */
  border-radius: 5px; /* Rounded corners for links */
}

.top-bar-section ul li a:hover,
.top-bar-section ul li.active a {
  background-color: #9a1e1e; /* Darker green on hover or active link */
}
/* Mobile styles */
@media only screen and (max-width: 768px) {
  .top-bar .top-bar-section {
    display: none;
    flex-direction: column;
    cursor: pointer;
    padding: 10px;
    background: #333;
    color: #fff;
    border: none;
    position: absolute;
    top: 10px;
    right: 10px;
  }

  .top-bar .toggle-topbar {
    display: block; /* Show the hamburger menu icon */
  }

  .top-bar .toggle-topbar.menu-icon a {
    display: block;
    padding: 10px;
    color: #fff;
  }

  .top-bar .toggle-topbar.menu-icon a span {
    display: block;
    width: 30px;
    height: 3px;
    background: #fff;
    position: relative;
    transition: background 0.3s ease;
  }

  .top-bar .toggle-topbar.menu-icon a span::before,
  .top-bar .toggle-topbar.menu-icon a span::after {
    content: "";
    display: block;
    width: 30px;
    height: 3px;
    background: #fff;
    position: absolute;
    transition: transform 0.3s ease;
  }

  .top-bar .toggle-topbar.menu-icon a span::before {
    top: -8px;
  }

  .top-bar .toggle-topbar.menu-icon a span::after {
    top: 8px;
  }

  .top-bar .show-menu {
    display: block;
    position: absolute;
    top: 60px;
    right: 0;
    background: #333;
    width: 100%;
    border-top: 1px solid #fff;
  }

  .top-bar .show-menu ul {
    list-style: none;
    padding: 0;
  }

  .top-bar .show-menu ul li {
    border-bottom: 1px solid #003300;
    margin: 0;
  }

  .top-bar .show-menu ul li a {
    display: block;
    padding: 10px;
    color: #fff;
    text-decoration: none;
  }

  .top-bar .show-menu ul li a:hover {
    background: #444;
  }
}

/* Shopping Cart Table Styling */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 120px;
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
    background-color: #f2f2f2;
  }

  .button {
    display: inline-block;
    padding: 10px 20px;
    margin: 5px;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
  }

  .button.secondary {
    background-color: #006400; /* Slightly different green for secondary actions */
  }

  .button.success {
    background-color: #004d00; /* Success green */
  }

  .button.alert {
    background-color: #b30000; /* Alert red */
  }

  .button:hover {
    opacity: 0.8;
  }

  .button:active {
    opacity: 0.6;
  }
  
  /* Responsive Design */
  @media (max-width: 768px) {
    table {
      font-size: 14px;
    }
  }


footer {
  background-color: #003300;
  color: #fff;
  text-align: center;
  padding: 20px 0;
  margin-top: 20px;
  font-size: 0.9em;
}
      </style>
  <body>

  <nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">
          <h1><a href="index.php">Orefile General Dealer</a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
      </ul>

      <section class="top-bar-section">
      <!-- Right Nav Section -->
        <ul class="right">
        <li><a href="index.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="products.php">Products</a></li>
          <li class="active"><a href="cart.php">View Cart</a></li>
          <li><a href="orders.php">My Orders</a></li>
          <li><a href="contact.php">Contact</a></li>
          <?php

          if(isset($_SESSION['username'])){
            echo '<li><a href="account.php">My Account</a></li>';
            echo '<li><a href="logout.php">Log Out</a></li>';
          }
          else{
            echo '<li><a href="login.php">Log In</a></li>';
            echo '<li><a href="register.php">Register</a></li>';
          }
          ?>
        </ul>
      </section>
    </nav>


    <div class="row" style="margin-top:10px;">
      <div class="large-12">
        <?php

          echo '<p><h3>Your Shopping Cart</h3></p>';

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

            $result = $mysqli->query("SELECT product_code, product_name, product_desc, qty, price FROM products WHERE id = ".$product_id);


            if($result){

              while($obj = $result->fetch_object()) {
                $cost = $obj->price * $quantity; //work out the line cost
                $total = $total + $cost; //add to the total cost

                echo '<tr>';
                echo '<td>'.$obj->product_code.'</td>';
                echo '<td>'.$obj->product_name.'</td>';
                echo '<td>'.$quantity.'&nbsp;<a class="button [secondary success alert]" style="padding:5px;" href="update-cart.php?action=add&id='.$product_id.'">+</a>&nbsp;<a class="button alert" style="padding:5px;" href="update-cart.php?action=remove&id='.$product_id.'">-</a></td>';
                echo '<td>'.$cost.'</td>';
                echo '</tr>';
              }
            }

          }



          echo '<tr>';
          echo '<td colspan="3" align="right">Total</td>';
          echo '<td>'.$total.'</td>';
          echo '</tr>';

          echo '<tr>';
          echo '<td colspan="4" align="right"><a href="update-cart.php?action=empty" class="button alert">Empty Cart</a>&nbsp;<a href="products.php" class="button [secondary success alert]">Continue Shopping</a>';
          if(isset($_SESSION['username'])) {
            echo '<a href="checkout.php"><button style="float:right;">Login</button></a>';
          }

          else {
            echo '<a href="checkout.php"> <button style="
        float: right; 
        padding: 10px 20px; 
        background-color: #003300; /* Dark green background */ 
        color: white; 
        border: none; 
        border-radius: 5px; 
        font-size: 16px; 
        font-weight: bold; 
        cursor: pointer; 
        text-align: center; 
        margin: 5px; 
        transition: background-color 0.3s, transform 0.3s; /* Smooth background color and transform changes */
    " >Login</button></a>';
          }

          echo '</td>';

          echo '</tr>';
          echo '</table>';
        }

        else {
          echo "You have no items in your shopping cart.";
        }





          echo '</div>';
          echo '</div>';
          ?>



    <div class="row" style="margin-top:10px;">
      <div class="small-12">




        
  <footer>
           <p style="text-align:center; font-size:0.8em;">&copy; 2024 Mafikeng Digital Innovation Hub. All rights reserved.</p>
        </footer>

      </div>
    </div>





    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
