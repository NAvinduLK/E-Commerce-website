<?php
session_start();
require_once 'dbConnection.php';
$username = 'Login / Sing In';
if (isset($_SESSION['userid'])) {
    $sql = "select * from users where ID ='" . $_SESSION['userid'] . "'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $username = $row['username'];
    }
}

if (isset($_GET['action'])) {
    if ($_GET['action'] == "delete") {
        foreach ($_SESSION['cart'] as $keys => $value) {
            if ($value['product_id'] == $_GET['id']) {
                unset($_SESSION['cart'][$keys]);
                echo "<script>alert('Product has been removed ')</script>";
            }
        }
    }
}
$cartcount = 0;
if (isset($_SESSION['cart'])) {
    $cartcount = count($_SESSION['cart']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <title>Document</title>
</head>

<body>
    <header class="header">
        <a href="home.php">
            <div class="logo">
                <h1>Rio Mobiles</h1>
            </div>
        </a>
        <nav id="nav-bar">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="product.php">Product</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Media</a></li>
                <li><a href="login.php"><?php echo "$username" ?></a></li>
                <li><a href="cart.php"><img src="icons/cart.png" alt=""><?php echo "$cartcount" ?></a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <div class="subtitle">
            <h3>Shopping Cart</h3>
        </div>
        <div class="hr">
            <hr>
        </div>
        <table class="cart-tbl" cellpadding="1" cellspacing="0">
            <tr>
                <th style="padding: 10px;">Product name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total Price</th>
                <th>Remove Item</th>
            </tr>
            <?php
            if (empty($_SESSION['cart'])) {
                echo '<tr>';
                echo '<td colspan="5" align="center">Empty cart</td>';
                echo '</tr>';
            } else {
                $total = 0;
                foreach ($_SESSION['cart'] as $key => $value) {
            ?>
                    <tr>
                        <td><?php echo $value['product_name']; ?></td>
                        <td align="center"><?php echo $value['product_qty']; ?></td>
                        <td align="right"><?php echo $value['product_price']; ?></td>
                        <td align="right"><?php echo number_format($value['product_qty'] * $value['product_price'], 2); ?></td>
                        <td align="center"><a href="cart.php?action=delete&id=<?php echo $value['product_id']; ?>">Remove</a></td>
                    </tr>
                <?php
                    $total = $total + ($value['product_qty'] * $value['product_price']);
                }
                ?>
                <tr>
                    <td colspan="3" align="right" style="padding: 10px;">Total</td>
                    <td align="right"><?php echo number_format($total, 2); ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
    <div class="clear">

    </div>
    <footer class="footer">
        <div class="servirce">
            <table class="footer-service">
                <tr>
                    <td>
                        <div class="s1">
                            <table>
                                <tr>
                                    <td>
                                        <div class="service-img">
                                            <img src="icons/gratemoney.png" alt="">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="service-img">
                                            <div class="sname">
                                                <h3>GREAT VALUE</h3>
                                            </div>
                                            <div class="sinfo">
                                                <h5>We offer competitive prices</h5>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </td>
                    <td>
                        <div class="s1">
                            <table>
                                <tr>
                                    <td>
                                        <div class="service-img">
                                            <img src="icons/delivery.png" alt="">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="service-img">
                                            <div class="sname">
                                                <h3>ISLAND WIDE DELIVERY</h3>
                                            </div>
                                            <div class="sinfo">
                                                <h5>Delivery within five working days</h5>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </td>
                    <td>
                        <div class="s1">
                            <table>
                                <tr>
                                    <td>
                                        <div class="service-img">
                                            <img src="icons/shield.png" alt="">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="service-img">
                                            <div class="sname">
                                                <h3>SAFE SHOPPING</h3>
                                            </div>
                                            <div class="sinfo">
                                                <h5>Safe Shopping GuaranteeSafe Shopping Guarantee</h5>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="hr">
            <hr>
        </div>
        <div class="details">
            <div class="details-col">
                <h4>Address</h4>
                <p>No : 37/1 Uyanwatta South,<br>Matara<br>Sri Lanka.</p>
            </div>
            <div class="details-col">
                <h4>HOT LINE</h4>
                <p>071 21 96 347</p>
            </div>
            <div class="details-col">
                <h4>Quick Links</h4>
                <a href="">My Account</a><br>
                <a href="">My Cart</a>
            </div>
            <div class="details-col">
                <h4>Informations</h4>
                <a href="">About Us</a><br>
                <a href="">Contact Us</a> <br>
                <a href="">Terms & Conditions</a><br>
                <a href="">Privecy Policy</a>
            </div>

        </div>
        <div class="clear"></div>
        <br>
        <div class="details2">
            <div class="details-col2">
                <h4>Social Media</h4><br>
                <ul>
                    <li><a href="#"><img src="icons/facebook.png" alt=""></a></li>
                    <li><a href="#"><img src="icons/instergram.png" alt=""></a></li>
                    <li><a href="#"><img src="icons/whatapp.png" alt=""></a></li>
                    <li><a href="#"><img src="icons/twitter.png" alt=""></a></li>
                </ul>
            </div>
        </div>
        </div>
        <div class="footer-lorem">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia pariatur, corrupti totam voluptatibus magnam rem ipsam alias aliquid? Cumque reprehenderit molestias natus nemo modi ipsum qui ullam tempora illo repudiandae fugit a adipisci neque, accusantium molestiae inventore nisi perspiciatis! Architecto voluptate, iste repudiandae deserunt eveniet nisi quod recusandae quisquam alias deleniti porro nobis laborum dolorem delectus? Reprehenderit cum soluta assumenda. Impedit, dolor! Laudantium voluptatum dolorem quo delectus fugit nihil nam explicabo odit neque. Quasi quod optio doloremque nemo ab totam facere facilis, eveniet modi explicabo voluptate sapiente veniam aliquam. Ipsam rerum, culpa at, sint, quae rem adipisci laboriosam provident expedita error exercitationem in veniam dolore reprehenderit. Ratione excepturi harum ad odio voluptate, asperiores cumque. Odit aspernatur commodi laboriosam porro similique. Pariatur tempore labore quo ipsam, accusantium voluptatibus adipisci explicabo tempora, ab dolorum harum repellat asperiores vero quod inventore exercitationem officia, perferendis reprehenderit! Aut porro, officia tenetur est consectetur debitis ea?</p>
        </div>
        <div class="hr">
            <hr>
        </div>
        <div class="footerend">
            <div class="madeby">
                <h6>Made with ❤ by<a href="#">Isuru Pradeep</a></h6>
            </div>
            <div class="madeby">
                <h6>Copyright © 2024 Rio Mobiles. All Rights Reserved</h6>
            </div>
            <br>
        </div>
    </footer>

</body>

</html>