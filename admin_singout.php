<?php 

echo "<script>alert('ADMIN login out...')</script>";

if($_GET['Aout'] == 1){
    echo '<script>window.location="home.php"</script>';
}elseif($_GET['Aout'] == 2){
    echo '<script>window.location="product.php"</script>';
}

?>