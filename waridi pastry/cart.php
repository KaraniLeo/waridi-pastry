<?php include('header.php'); ?>

<!DOCTYPE html>
<html>
<head>
  <title>Checkout</title>
  <link rel="stylesheet" type="text/css" href="css/admins.css">
  <link rel="stylesheet" type="text/css" href="css/layout.css">
</head>
<body>
  <style>
    body {
      background-image: url('images/bckg2.jpg');
    }
  </style>

  <h1>Checkout</h1>

  <form action='process_order.php' method='post'>
    <table>
      <tr>
        <th>Product Name</th>
        <th>Price</th>
        <th>Quantity</th>
      </tr>
      <?php
        // Checkout page
        session_start();
        if (!isset($_SESSION['cart'])) {
          // If the cart is empty, display a message
          echo "Your cart is empty.";
          exit();
        }

        // Display the contents of the cart
        echo "<table>";
        echo "<tr>";
        echo "<th>Product Name</th>";
        echo "<th>Price</th>";
        echo "<th>Quantity</th>";
        echo "</tr>";
        $total = 0;
        foreach ($_SESSION['cart'] as $product) {
          echo "<tr>";
          echo "<td>" . $product['name'] . "</td>";
          echo "<td>" . $product['price'] . "</td>";
          echo "<td>" . $product['quantity'] . "</td>";
          echo "</tr>";
          $total += $product['price'] * $product['quantity'];
        }
        echo "<tr>";
        echo "<th>Total</th>";
        echo "<td colspan='2'>" . $total . "</td>";
        echo "</tr>";

        // Add a radio button for pick up stations
        echo "<tr>";
        echo "<td>Pick up Station:</td>";
        echo "<td colspan='2'>";
        echo "<input type='radio' id='lower-kabete' name='station' value='Lower Kabete'>";
        echo "<label for='lower-kabete'>Lower Kabete</label><br>";
        echo "<input type='radio' id='kikuyu' name='station' value='Kikuyu'>";
        echo "<label for='kikuyu'>Kikuyu</label><br>";
        echo "<input type='radio' id='westlands' name='station' value='Westlands'>";
        echo "<label for='westlands'>Westlands</label><br>";
        echo "<input type='radio' id='total-spring-valley' name='station' value='Total Spring Valley'>";
        echo "<label for='total-spring-valley'>Total Spring Valley</label><br>";
        echo "<input type='radio' id='wangige' name='station' value='Wangige'>";
        echo "<label for='wangige'>Wangige</label><br>";
        echo "</td>";
        echo "</tr>";

        echo "</table>";

        // Add a "Buy Now" button
        echo "<input type='hidden' name='total' value='" . $total . "'>";
        echo "<button type='submit' name='buy_now'>Buy Now</button>";
      ?>
  </form>
</body>
</html>
