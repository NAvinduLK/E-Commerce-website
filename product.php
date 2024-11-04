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

if (isset($_POST['add'])) {
    if (isset($_SESSION['userid'])) {
        if (isset($_SESSION['cart'])) {
            $itemarray_id = array_column($_SESSION['cart'], "product_id");
            if (!in_array($_GET['id'], $itemarray_id)) {
                $count = count($_SESSION['cart']);
                $item_array = array(
                    'product_id' => $_GET['id'],
                    'product_name' => $_POST['hi-name'],
                    'product_price' => $_POST['hi-price'],
                    'product_qty' => $_POST['qty']
                );
                $_SESSION['cart'][$count] = $item_array;
                echo "<script>alert('Item insert Successfull')</script>";
                /*echo '<script>window.location="product.php"</script>';*/
            } else {
                echo "<script>alert('Product is already in the cart!')</script>";
                /*echo '<script>window.location="product.php"</script>';*/
            }
        } else {
            $item_array = array(
                'product_id' => $_GET['id'],
                'product_name' => $_POST['hi-name'],
                'product_price' => $_POST['hi-price'],
                'product_qty' => $_POST['qty']
            );
            $_SESSION['cart'][0] = $item_array;
            echo "<script>alert('Item insert Successfull')</script>";
            /*echo '<script>window.location="product.php"</script>';*/
        }
    } else {
        echo "<script>alert('Please Login Your Account')</script>";
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
    <link rel="stylesheet" href="css.css">
    <title>Product Page</title>

    <!--banner script-->
    <script type="text/javascript">
        var counter = 1;
        setInterval(function() {
            document.getElementById('radio' + counter).checked = true;
            counter++;
            if (counter > 5) {
                counter = 1;
            }
        }, 5000);
    </script>
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
    <br>
    <div class="container">
        <div>
            <div class="subtitle">
                <h3>Populers</h3>
            </div>
            <div class="hr">
                <hr>
            </div>
            <?php
            $query = "select * from item limit 4";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
            ?>
                    <div class="col-md-3" style="float: left;">
                        <form class="from" action="product.php?id=<?php echo $row['ID']; ?>" method="post">
                            <a href="view.php?id=<?php echo $row['ID']; ?>">
                                <div class="product">
                                    <img src="img/<?php echo $row['image']; ?>" width="190px" height="200px" class="img-responsive">
                                    <h5 class="txt-name"><?php echo $row['item_name']; ?></h5>
                                    <h5 class="txt-price">Rs.<?php echo $row['price']; ?>/=</h5>
                            </a>
                            <div class="inline">
                                <input type="number" name="qty" class="form-control" value="1"><br>
                            </div>
                            <input type="hidden" name="hi-name" value="<?php echo $row['item_name']; ?>">
                            <input type="hidden" name="hi-price" value="<?php echo $row['price']; ?>">
                            <div class="inline">
                                <input type="submit" name="add" style="margin-top: 5px;" class="btn-addtocart" value="Add to cart">
                            </div>
                    </div>

                    </form>
        </div>
<?php
                }
            }
?>
    </div>
    </div>

    <div class="clear">

    </div>

    <div class="top-banner">
        <div class="slider">
            <div class="sliders">
                <input type="radio" name="radio-btn" id="radio1">
                <input type="radio" name="radio-btn" id="radio2">
                <input type="radio" name="radio-btn" id="radio3">
                <input type="radio" name="radio-btn" id="radio4">
                <input type="radio" name="radio-btn" id="radio5">

                <div class="slide first">
                    <img src="photo/banner4.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="photo/banner3.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="photo/banner5.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="photo/banner1.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="photo/banner2.jpg" alt="">
                </div>

                <div class="navigation-auto">
                    <div class="auto-btn1"></div>
                    <div class="auto-btn2"></div>
                    <div class="auto-btn3"></div>
                    <div class="auto-btn4"></div>
                    <div class="auto-btn5"></div>
                </div>

            </div>
            <div class="navigation-manual">
                <label for="radio1" class="manual-btn"></label>
                <label for="radio2" class="manual-btn"></label>
                <label for="radio3" class="manual-btn"></label>
                <label for="radio4" class="manual-btn"></label>
                <label for="radio5" class="manual-btn"></label>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="lorem1">
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. <br>
                Veritatis minima perferendis omnis cum, ea praesentium nemo ipsa blanditiis quae ipsum ratione doloremque illo quia sed. Quaerat quo a possimus laudantium nulla, amet vel magnam architecto ullam recusandae quidem alias, nihil dignissimos optio odit nam corporis reprehenderit debitis totam illum. <br><br>
                Consectetur ipsa expedita vel itaque culpa ad, nisi distinctio aliquam explicabo amet voluptates? Modi earum rem quam?</p>
        </div>
        <br><br><br>
        <div>
            <div class="subtitle">
                <h3>All Products</h3>
            </div>
            <div class="hr">
                <hr>
            </div>
            <?php
            $query = "select * from item order by ID desc";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
            ?>
                    <div class="col-md-3" style="float: left;">
                        <form class="from" action="product.php?id=<?php echo $row['ID']; ?>" method="post">
                            <a href="view.php?id=<?php echo $row['ID']; ?>">
                                <div class="product">
                                    <img src="img/<?php echo $row['image']; ?>" width="190px" height="200px" class="img-responsive">
                                    <h5 class="txt-name"><?php echo $row['item_name']; ?></h5>
                                    <h5 class="txt-price">Rs.<?php echo $row['price']; ?>/=</h5>
                            </a>
                            <div class="inline">
                                <input type="number" name="qty" class="form-control" value="1"><br>
                            </div>
                            <input type="hidden" name="hi-name" value="<?php echo $row['item_name']; ?>">
                            <input type="hidden" name="hi-price" value="<?php echo $row['price']; ?>">
                            <div class="inline">
                                <input type="submit" name="add" style="margin-top: 5px;" class="btn-addtocart" value="Add to cart">
                            </div>
                    </div>

                    </form>
        </div>
<?php
                }
            }
?>
    </div>
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