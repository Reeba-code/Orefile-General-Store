<?php

if(session_id() == '' || !isset($_SESSION)){session_start();}

?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Baskerville+SC:wght@400;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baskervville+SC&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <title>About Us</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
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



/* Footer */
footer {
  background-color: #003300;
  color: #fff;
  text-align: center;
  padding: 20px 0;
  margin-top: 20px;
  font-size: 0.9em;
}




     /* General Styles for Mission, Vision, and Values */
.mission, .vision, .values {
    margin: 0 auto; /* Center containers horizontally */
    padding: 20px; /* Padding for content inside each section */
    max-width: 800px; /* Restrict max width for better centering */
    text-align: center; /* Center text inside sections */
}

.mission h3, .vision h3, .values h3 {
    color: #006400; /* Dark green */
    margin-bottom: 10px;
}

/* Services Section */
.services {
    text-align: center;
    padding: 2rem;
    background-color: #f9f9f9; /* Light gray */
    margin-top: 50px;
}

.services h2 {
    font-size: 2rem;
    margin-bottom: 1rem;
}

.services-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center; /* Center items horizontally */
    gap: 1.5rem;
}

.service-item {
    flex: 1 1 200px; /* Allows items to grow and shrink */
    max-width: 300px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
    background-color: #fff; /* White background for cards */
    text-align: center;
    padding: 1rem;
    margin: 0 auto; /* Center cards horizontally */
}

.service-item img {
    width: 100%;
    height: auto;
    border-bottom: 2px solid #ddd; /* Light gray border */
}

.service-item h3 {
    margin: 1rem 0 0;
    font-size: 1.25rem;
}
/* About Section Styling */
.about-section {
    margin: 50px auto; /* Move section down and center horizontally */
    padding: 40px 20px; /* Increase padding to expand the content area */
    max-width: 90%; /* Expand to 90% of the viewport width */
    text-align: center; /* Center text inside section */
    box-sizing: border-box; /* Ensure padding is included in width calculations */
}

/* Text Styles */
.about-section .tip {
    font-weight: bold;
    font-size: 24px;
    margin-bottom: 15px;
}

.about-section .second-text {
    font-size: 16px;
    line-height: 1.6;
    margin-bottom: 20px;
}

/* Media Queries for Responsiveness */
@media (max-width: 768px) {
    .about-section {
      margin: 50px auto; /* Adjust vertical margin for smaller screens */
        padding: 30px 15px; /* Reduce padding for smaller screens */
        max-width: 95%; /* Allow more width for smaller screens */
    }

    .about-section .tip {
        font-size: 20px; /* Adjust font size for smaller screens */
        margin-bottom: 10px; /* Adjust margin for smaller screens */
    }

    .about-section .second-text {
        font-size: 14px; /* Adjust font size for smaller screens */
        margin-bottom: 15px; /* Adjust margin for smaller screens */
    }
}

@media (max-width: 480px) {
    .about-section {
        margin: 200px auto; /* Further adjust vertical margin for very small screens */
        padding: 20px 10px; /* Further reduce padding for very small screens */
        max-width: 100%; /* Allow full width for very small screens */
    }

    .about-section .tip {
        font-size: 18px; /* Further adjust font size for very small screens */
        margin-bottom: 8px; /* Further adjust margin for very small screens */
    }

    .about-section .second-text {
        font-size: 12px; /* Further adjust font size for very small screens */
        margin-bottom: 10px; /* Further adjust margin for very small screens */
    }
}


/* Individual Sections with Background Colors */
.mission {
    background-color: #ffc4c4; /* Light pink */
}

.vision {
    background-color: rgb(170, 255, 0); /* Light yellow-green */
}

.values {
    background-color: #e6e6fa; /* Lavender */
}

/* Cards Container */
.cards {
    display: flex;
    justify-content: center; /* Center cards horizontally */
    gap: 20px; /* Optional: Add space between individual cards */
    text-align: center;
    padding: 2rem;
    background-color: #fff;
    margin-top: 500px; /* Adjust the value as needed to move the cards down */
}

/* Card Styles */
.card {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    text-align: center;
    height: 350px; /* Height for content fit */
    width: 1000px; /* Expanded width for more content */
    max-width: 90vw; /* Ensure cards do not exceed viewport width */
    border-radius: 10px;
    color: rgb(0, 0, 0);
    cursor: pointer;
    transition: 400ms;
    padding: 15px; /* Padding inside the card */
    box-sizing: border-box; /* Include padding in width and height */
    margin: 0 auto; /* Center cards horizontally */
}

/* Card Text Styles */
.card p.tip {
    font-size: 22px;
    font-weight: bold;
    margin: 0; /* Remove margin for better alignment */
}

.card p.second-text {
    font-size: 15px; /* Slightly larger for readability */
    margin-top: 10px; /* Add space between tip and text */
    line-height: 1.5; /* Improve text readability */
}

/* Card Hover Effects */
.card:hover {
    transform: scale(1.1, 1.1);
}

.cards:hover > .card:not(:hover) {
    filter: blur(10px);
    transform: scale(0.9, 0.9);
}

/* Card Color Variations */
.cards .red {
    background-color: #9a1e1e;
    height: 50%;
}

.cards .blue {
    background-color: #0a3cff;
}

.cards .green {
    background-color: #28A745;
}

.cards .yellow {
    background-color: #ffd700;
}

/* General Styles for Rows */
.row {
    display: flex;
    flex-direction: column;
    margin: 0 auto;
    padding: 0 15px;
}

/* Small 12 Width Class */
.small-12 {
    width: 100%;
}

/* Tip and Second Text Styles */
p.tip {
    font-weight: bold;
    font-size: 20px;
    margin-bottom: 15px;
}

p.second-text {
    font-size: 16px;
    line-height: 1.6;
    margin-bottom: 20px;
}

/* Card General Styles */
.card {
    padding: 20px;
    margin-bottom: 20px;
    border-radius: 8px;
    color: white;
}

/* Card Color Variations */
.card.blue {
    background-color: #0073e6;
}

.card.green {
    background-color: #28a745;
}

.card.yellow {
    background-color: #ffc107;
    color: black;
}

/* Media Queries for Responsiveness */
@media (max-width: 768px) {
    p.tip {
        font-size: 20px;
    }

    p.second-text {
        font-size: 14px;
    }

    .card {
        padding: 15px;
        margin-bottom: 15px;
    }
}

@media (max-width: 480px) {
    p.tip {
        font-size: 18px;
    }

    p.second-text {
        font-size: 13px;
    }

    .card {
        padding: 10px;
        margin-bottom: 10px;
    }
}

/* Adjust margins for small screens */
@media (max-width: 320px) {
    .row {
        padding: 0 10px;
    }

    p.tip {
        font-size: 14px;
    }

    p.second-text {
        font-size: 10px;
    }
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
          <li class="active"><a href="about.php">About</a></li>
          <li><a href="products.php">Products</a></li>
          <li><a href="cart.php">View Cart</a></li>
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

    
    <div class="row" style="margin-top: 30px;">
  <div class="small-12">
<!-- About Section -->
<div class="about-section">
    <p class="tip">About Orefile General Dealer</p>
    <p class="second-text">
      Orefile Digital Tuckshop is your neighborhood grocery store with a modern twist. We combine the convenience of online
      shopping with the personal touch of a local store, ensuring you get the best of both worlds. Our mission is to provide
      high-quality groceries and exceptional customer service to our community.<br><br>
      Established in 2024, we have quickly become a trusted name in the community, known for our wide range of products,
      competitive prices, and reliable delivery services. Our goal is to make grocery shopping easier and more enjoyable for everyone.
    </p>

    <!-- Translation Section -->
    <p class="tip">Ka ga Orefile General Dealer</p>
    <p class="second-text">
      Orefile Digital Tuckshop ke lebenkele la korosari la mo lefelong la lona le le nang le dilo tsa segompieno. Re kopanya tsela e e motlhofo ya go dirisa Internet<br>
      go reka ka tsela e e tshwanang le ya lebenkele la mo lefelong la lona, go go tlhomamisetsa gore o tla bona dilo tse di molemo go gaisa tsotlhe. <br>Boikaelelo jwa rona ke go tlamela batho ba rona ka dijo tsa boleng jo bo kwa godimo le go ba direla ka tsela e e tlhomologileng.<br><br>
      E re ka re tlhomilwe ka 2024, ka bonako fela re ne ra nna leina le le ikanyegang mo setšhabeng, re itsege ka mefuta e mentsi ya dilo tse re di rekang, ditlhwatlhwa tsa rona tse di gaisanang le tsa ba bangwe le ditirelo tse di ikanyegang tsa go tsamaisa dilwana.<br><br>
      Mokgele wa rona ke go dira gore go reka dijo go nne motlhofo e bile go itumedise mongwe le mongwe.
    </p>
</div>

    
    <!-- Cards Section -->
    <div class="card blue" style="padding: 20px; background-color: #0073e6; color: white; margin-bottom: 20px;">
      <p class="tip" style="font-weight: bold; font-size: 22px; margin-bottom: 10px;">Our Mission</p>
      <p class="second-text" style="font-size: 16px; line-height: 1.6;">
        To deliver fresh and affordable groceries to our customers' doorsteps while fostering a sense of community and supporting local producers.
      </p>
      <p class="tip" style="font-weight: bold; font-size: 22px; margin-top: 20px;">Tiro ya Rona</p>
      <p class="second-text" style="font-size: 16px; line-height: 1.6;">
        Go isa dijo tse di foreše le tse di tlhwatlhwa e e kwa tlase kwa magaeng a bareki ba rona fa re ntse re rotloetsa boikutlo jwa go nna karolo ya setšhaba le go tshegetsa batlhagisi ba mo lefelong leo.
      </p>
    </div>

    <div class="card green" style="padding: 20px; background-color: #28a745; color: white; margin-bottom: 20px;">
      <p class="tip" style="font-weight: bold; font-size: 22px; margin-bottom: 10px;">Our Vision</p>
      <p class="second-text" style="font-size: 16px; line-height: 1.6;">
        To be the leading digital grocery store in the region, known for our commitment to quality, customer satisfaction, and innovation.
      </p>
      <p class="tip" style="font-weight: bold; font-size: 22px; margin-top: 20px;">Pono ya Rona</p>
      <p class="second-text" style="font-size: 16px; line-height: 1.6;">
        Go nna lebenkele la korosari la dijithale le le di gogang kwa pele mo kgaolong eno, le le itsegeng ka boineelo jwa rona mo boleng, go kgotsofatsa bareki le go dira dilo tse disha.
      </p>
    </div>

    <div class="card yellow" style="padding: 20px; background-color: #ffc107; color: black; margin-bottom: 20px;">
      <p class="tip" style="font-weight: bold; font-size: 22px; margin-bottom: 10px;">Our Values</p>
      <p class="second-text" style="font-size: 16px; line-height: 1.6;">
        We believe in integrity, customer focus, and continuous improvement. Our values guide us in everything we do and help us build strong relationships with our customers and partners.
      </p>
      <p class="tip" style="font-weight: bold; font-size: 22px; margin-top: 20px;">Mekgwa ya Rona ya Botlhokwa</p>
      <p class="second-text" style="font-size: 16px; line-height: 1.6;">
        Re dumela mo bothokgaming, mo go tsepamiseng mogopolo mo badirising le mo go tokafatseng ka metlha. Melaometheo ya rona e re kaela mo go sengwe le sengwe se re se dirang e bile e re thusa go nna le dikamano tse di nonofileng le bareki le badirimmogo le rona.
      </p>
    </div>
  </div>
</div>


       
        
        <section class="services">
            <h2>Our Services/Ditirelo Tsa Rona</h2>
            <div class="services-container">
                <div class="service-item">
                    <img src="images/online.jpg" alt="Online Ordering">
                    <h3>Online Ordering</h3>
                    <p>Conveniently order your favorite items online from the comfort of your home.</p>
                    <h3>Go reka ka Internet</h3>
                    <p>Dira gore o kgone go reka dilo tse o di ratang mo Internet o ntse o le kwa gae.</p>

                 </div>
                <div class="service-item">
                    <img src="images/delivery.jpg" alt="Home Delivery">
                    <h3>Home Delivery</h3>
                    <p>Enjoy fast and reliable delivery straight to your doorstep.</p>
                    <h3>Go tsamaisa dilwana</h3>
                    <p>Itumelele go romelelwa dilo ka bonako le ka tsela e e ka ikanngwang ka tlhamalalo kwa legaeng la gago.</p>
                </div>
                <div class="service-item">
                    <img src="images/fresh.jpg" alt="Fresh Produce">
                    <h3>Fresh Produce</h3>
                    <p>Get access to the freshest fruits and vegetables available.</p>
                    <h3>maungo a a foreshe</h3>
                    <p>Re go tshepisa gore re rekisa go ja maungo le merogo e e foreshe.</p>
                </div>
                <div class="service-item">
                    <img src="images/exclusive.png" alt="Exclusive Deals">
                    <h3>Exclusive Deals</h3>
                    <p>Take advantage of special discounts and promotions only for our customers.</p>
                    <h3>ditlhwatlhwa tse di kwa tlase</h3>
                    <p>Dirisa ditshenyegelo tse di kwa tlase tse di kgethegileng le dipapatso tse di direlwang bareki ba rona fela.</p>
                </div>
            </div>
        </section>
        

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
