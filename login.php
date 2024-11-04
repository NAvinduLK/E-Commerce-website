<?php
require_once 'dbConnection.php';
session_start();

if (isset($_SESSION['userid'])) {
    echo '<script>window.location="profile.php"</script>';
}

if (isset($_POST['submit'])) {

    $email              = $_POST['email'];
    $password           = $_POST['password'];

    $sql = "select * from users where email = '$email' and password = '$password'";
    $result = mysqli_query($conn, $sql);

    $sql1 = "select * from admin where admin_userName = '$email' and admin_password = '$password'";
    $result1 = mysqli_query($conn, $sql1);

    if (mysqli_num_rows($result) > 0) {
        if ($row = mysqli_fetch_array($result)) {
            $_SESSION['userid'] = $row['ID'];
        }

        echo "<script>alert('login Success!')</script>";
        echo '<script>window.location="product.php"</script>';

    }elseif(mysqli_num_rows($result1) > 0){
        if ($row1 = mysqli_fetch_array($result1)) {
            $_SESSION['adminid'] = $row1['A_ID'];
        }

        echo "<script>alert('ADMIN login Success!')</script>";
        echo '<script>window.location="admin_item_insert.php"</script>';

    } else {

        echo "<script>alert('Login Error!')</script>";
        echo '<script>window.location="login.php"</script>';

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
    <title>Login Form</title>
    <link rel="stylesheet" href="css.css">
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
                <li><a href="home.php"">Home</a></li>
                <li><a href=" product.php">Product</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Media</a></li>
                <li><a href="login.php">Login / Sing In</a></li>
                <li><a href="cart.php"><img src="icons/cart.png" alt=""><?php echo "$cartcount" ?></a></li>
            </ul>
        </nav>
    </header>
    <div class="All-form">
        <div class="registration_form">

            <div class="title">
                Login Form
            </div>
            <form action="login.php" class="form" method="POST" enctype="multipart/form-data">
                <div class="form2">

                    <div class="input-lbl">
                        <label>E-mail</label>
                        <input type="text" name="email" id="email" placeholder="username@example.com" required>
                    </div>
                    <div class="input-lbl">
                        <label>Password</label>
                        <input type="password" name="password" id="password" placeholder="Must be 4 or more than 4 charactors!" required>
                    </div>
                    <div class="input-lbl">
                        <input type="submit" name="submit" value="Login" class="submit_btn">
                    </div>
                    <div class="input-lbl">
                        <p>I am a new user. I want<a style="text-decoration: none;" href="user_registration.php">Sign in</a></p>
                    </div>
                </div>
            </form>
        </div>
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