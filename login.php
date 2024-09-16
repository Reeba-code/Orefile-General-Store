<?php
// Include the database connection file
include('config.php');
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



<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login || Orefile General Dealer</title>
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

/* Form Container */
.login-form {
    margin: 120px auto; /* Centers the form horizontally and adds top/bottom margin */
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    width: 80%; /* Adjust width as needed */
    max-width: 600px; /* Optional: set a maximum width */
    display: flex;
    flex-direction: column;
    align-items: center; /* Centers form content horizontally */
}

/* Form Rows */
.row {
    margin-bottom: 15px;
    width: 100%; /* Ensures rows take up the full width of the form */
}

/* Input Fields */
.login-form input[type="text"],
.login-form input[type="password"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
    font-size: 1em;
}

/* Form Labels */
.login-form label {
    font-size: 1em;
    color: #333;
    font-weight: bold;
}

/* Links */
.login-form a {
    color: #004d00; /* Dark green */
    text-decoration: none;
}

/* Links Hover */
.login-form a:hover {
    text-decoration: underline;
}

/* Buttons */
.form-button {
    background: #004d00; /* Dark green background */
    border: none;
    color: #fff;
    font-family: 'Baskerville SC', serif;
    font-size: 1em;
    padding: 10px;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    cursor: pointer;
    transition: background-color 0.3s, transform 0.3s;
    width: 100%; /* Make buttons full width within the form */
    max-width: 200px; /* Optional: set a maximum width for buttons */
}

/* Button Hover */
.form-button:hover {
    background-color: #003300; /* Slightly darker green */
    transform: translateY(-2px);
}

/* Button Active */
.form-button:active {
    background-color: #002200; /* Even darker green */
    transform: translateY(1px);
}

/* Responsive Design */
@media (max-width: 768px) {
    .login-form {
        padding: 15px;
    }

    .login-form input[type="text"],
    .login-form input[type="password"],
    .form-button {
        font-size: 0.9em;
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
          <li ><a href="cart.php">View Cart</a></li>
          <li><a href="orders.php">My Orders</a></li>
          <li><a href="contact.php">Contact</a></li>
          <?php

          if(isset($_SESSION['username'])){
            echo '<li><a href="account.php">My Account</a></li>';
            echo '<li><a href="logout.php">Log Out</a></li>';
          }
          else{
            echo '<li class="active"><a href="login.php">Log In</a></li>';
            echo '<li><a href="register.php">Register</a></li>';
          }
          ?>
        </ul>
      </section>
    </nav>

    <form method="POST" action="verify.php" class="login-form">
    <div class="row">
        <div class="small-12 columns">
            <div class="row">
                <div class="small-4 columns">
                    <label for="username">Username</label>
                </div>
                <div class="small-8 columns">
                    <input type="text" id="username" placeholder=" " name="username" required>
                </div>
            </div>
            <div class="row">
                <div class="small-4 columns">
                    <label for="password">Password</label>
                </div>
                <div class="small-8 columns">
                    <input type="password" id="password" name="password" required>
                </div>
            </div>
            <p>Don't have an account? <a href="register.php">Click Here</a></p>
            <div class="row">
                <div class="small-12 columns">
                    <input type="submit" value="Login" class="form-button">
                    <input type="reset" value="Reset" class="form-button">
                </div>
            </div>
        </div>
    </div>
</form>


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
