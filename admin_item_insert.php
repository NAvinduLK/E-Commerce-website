<?php
session_start();
require_once 'dbConnection.php';
$userid   =  $_SESSION['adminid'];
$username = 'Login / Sing In';
if(isset($_SESSION['adminid'])){
    $sql = "select * from admin where A_ID ='" . $_SESSION['adminid'] . "'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $username = $row['name'];
    }
}

if (isset($_POST['submit'])) {

    $item_name      = $_POST['itemname'];
    $brand_name     = $_POST['brand'];
    $ram            = $_POST['ram'];
    $storage        = $_POST['storage'];
    $battery        = $_POST['battery'];
    $display        = $_POST['display'];
    $price          = $_POST['itemprice'];
    $image          = $_FILES['image']['name'];

    $sql = "insert into item (item_name, brand_name, ram, storage, battery, display, price, image) values ('$item_name','$brand_name', '$ram', '$storage', '$battery', '$display', '$price','$image')";
    if ($conn->query($sql) === true) {
        move_uploaded_file($_FILES['image']['tmp_name'], "img/$image");
        echo "<script>alert('Data inserted...')</script>";
        echo '<script>window.location="admin_item_insert.php"</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
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
    <title>Admin Item Insert</title>
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
                <li><a href="admin_singout.php?Aout=1">Home</a></li>
                <li><a href="admin_singout.php?Aout=2">Product</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Media</a></li>
                <li><a href="session_close.php?sout=<?php echo $row['A_ID']; ?>">ADMIN Sign out</a></li>
                <li><a href="cart.php"><img src="icons/cart.png" alt=""><?php echo "$cartcount" ?></a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <div class="All-form">
            <div class="registration_form1">

                <div class="title">
                    Item Insert Form
                </div>
                <form action="admin_item_insert.php" class="form" method="POST" enctype="multipart/form-data">
                    <div class="form1">
                        <div class="left">
                            <div class="input-lbl">
                                <label>Brand Name </label>
                                <input type="text" name="brand" required>

                            </div>
                            <div class="input-lbl">
                                <label>Item Name </label>
                                <input type="text" name="itemname" required>

                            </div>
                            <div class="input-lbl">
                                <label>RAM </label>
                                <input type="number" name="ram" required>

                            </div>
                            <div class="input-lbl">
                                <label>Storage size </label>
                                <input type="number" name="storage" required>

                            </div>
                        </div>

                        <div class="right">
                            <div class="input-lbl">
                                <label>Battery Capacity </label>
                                <input type="text" name="battery" required>

                            </div>
                            <div class="input-lbl">
                                <label>Display Size </label>
                                <input type="text" name="display" required>

                            </div>
                            <div class="input-lbl">
                                <label>Item Price </label>
                                <input type="text" name="itemprice" required>

                            </div>
                            <div class="input-lbl">
                                <label>Select Image </label>
                                <input type="file" name="image" class="filechoose" required>

                            </div>
                        </div>
                        <div class="input-lbl">
                            <input type="submit" name="submit" value="Insert data" class="submit_btn">
                        </div>
                    </div>
                </form>
            </div>
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