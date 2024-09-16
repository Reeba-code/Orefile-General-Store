<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
include 'config.php';
?>

<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baskerville+SC:wght@400;700&display=swap" rel="stylesheet">
    <title>Products || Orefile General Store</title>
  
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
    border-bottom: 1px solid #444;
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

/* Product grid */
.product-grid {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  justify-content: center;
  margin-top: 120px; /* Space for the fixed header */
}

/* Product card */
.product-card {
  background-color: #f9f9f9;
  border: 1px solid #ddd;
  border-radius: 8px;
  box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
  padding: 20px;
  max-width: 300px;
  flex: 1 1 30%;
  text-align: center;
  transition: transform 0.3s ease;
}

.product-card:hover {
  transform: scale(1.05);
}

/* Product image styling for uniform size */
.product-card img {
  max-width: 100%;
  height: 200px; /* Set a fixed height for images */
  object-fit: cover; /* Ensures images maintain aspect ratio */
  border-radius: 5px;
}

/* Product details */
.product-card p {
  margin: 10px 0;
}

/* Add to Cart button */
.add-to-cart-btn {
  background-color:#003300; /* Updated button color */
  color: white;
  border: none;
  padding: 10px 20px;
  cursor: pointer;
  font-size: 1em;
  border-radius: 4px;
  transition: background-color 0.3s ease;
}

/* Button hover effect */
.add-to-cart-btn:hover {
  background-color: #9a1e1e; /* Darken button on hover */
}
.out-of-stock {
  color: red;
  font-weight: bold;
}

/* Responsive styles */
@media (max-width: 768px) {
  .product-card {
    flex: 1 1 45%;
  }
}

@media (max-width: 480px) {
  .product-card {
    flex: 1 1 100%;
  }
}

/* Footer */
footer {
  background-color: #003300;
  color: #fff;
  text-align: center;
  padding: 20px 0;
  margin-top: 20px;
  font-size: 0.9em;
}
  </style>
  

  <nav class="top-bar" data-topbar role="navigation">
  <ul class="title-area">
    <li class="name">
      <h1><a href="index.php">Orefile General Dealer</a></h1>
    </li>
    <li class="toggle-topbar menu-icon">
      <a href="#"><span></span></a>
    </li>
  </ul>

  <section class="top-bar-section">
    <ul class="right">
      <li><a href="about.php">About</a></li>
      <li class='active'><a href="products.php">Shop</a></li>
      <li><a href="cart.php">View Cart</a></li>
      <li><a href="orders.php">My Orders</a></li>
      <li><a href="contact.php">Contact</a></li>
      <?php
        if(isset($_SESSION['username'])){
          echo '<li><a href="account.php">My Account</a></li>';
          echo '<li><a href="logout.php">Log Out</a></li>';
        } else {
          echo '<li><a href="login.php">Log In</a></li>';
          echo '<li><a href="register.php">Register</a></li>';
        }
      ?>
    </ul>
  </section>
</nav>


    <div class="product-grid">
      <?php
        $result = $mysqli->query('SELECT * FROM products');
        if($result === FALSE){
          die(mysql_error());
        }

        if($result){
          while($obj = $result->fetch_object()) {
            echo '<div class="product-card">';
            echo '<h3>'.$obj->product_name.'</h3>';
            echo '<img src="images/products/'.$obj->product_img_name.'"/>';
            echo '<p><strong>Product Code</strong>: '.$obj->product_code.'</p>';
            echo '<p><strong>Description</strong>: '.$obj->product_desc.'</p>';
            echo '<p><strong>Units Available</strong>: '.$obj->qty.'</p>';
            echo '<p><strong>Price (Per Unit)</strong>: '.$currency.$obj->price.'</p>';

            if($obj->qty > 0){
              echo '<a href="update-cart.php?action=add&id='.$obj->id.'"><button class="add-to-cart-btn">Add To Cart</button></a>';
            } else {
              echo '<p class="out-of-stock">Out Of Stock!</p>';
            }

            echo '</div>';
          }
        }
      ?>
    </div>

    <footer>
      <p>&copy; 2024 Mafikeng Digital Innovation Hub. All rights reserved.</p>
    </footer>
  <script>  
    document.addEventListener('DOMContentLoaded', function() {
  const toggleButton = document.querySelector('.toggle-topbar.menu-icon a');
  const menu = document.querySelector('.top-bar .top-bar-section');

  toggleButton.addEventListener('click', function(event) {
    event.preventDefault();
    menu.classList.toggle('show-menu');
  });
});
</script>
  </body>
</html>
