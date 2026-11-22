<?php include('server2.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>F1 Products</title>
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="css/logout.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>

    <nav>
        <a href="home_page.php">Home</a>
        <a href="about_us.php">About</a>
        <a href="feedback.php">Feedback</a>
        <a href="contact.php">Contact</a>
        <a href="product.php">Products</a>
    </nav>

    <h2>F1 Merchandise</h2>

    <?php

    if (isset($_SESSION['msg'])) {
        echo '<div class="msg-success">' . $_SESSION['msg'] . '</div>';
        unset($_SESSION['msg']);
    }
    if (isset($_SESSION['err'])) {
        echo '<div class="msg-error">' . $_SESSION['err'] . '</div>';
        unset($_SESSION['err']);
    }
    ?>

    <?php

    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $id = mysqli_real_escape_string($db, $id);

        $sql = "DELETE FROM products WHERE id = '$id'";
        $result = mysqli_query($db, $sql);

        if ($result) {
            $_SESSION['msg'] = "Product deleted successfully!";
        } else {
            $_SESSION['err'] = "Error deleting product.";
        }

        header("Location: product.php");
        exit();
    }
    ?>

    <?php

    if (isset($_POST['save_edit'])) {
        $id    = $_POST['edit_id'];
        $name  = $_POST['edit_name'];
        $brand = $_POST['edit_brand'];
        $price = $_POST['edit_price'];
        $img   = $_POST['edit_img'];

        $id    = mysqli_real_escape_string($db, $id);
        $name  = mysqli_real_escape_string($db, $name);
        $brand = mysqli_real_escape_string($db, $brand);
        $price = mysqli_real_escape_string($db, $price);
        $img   = mysqli_real_escape_string($db, $img);

        $sql = "UPDATE products SET name='$name', brand='$brand', price='$price', img='$img' WHERE id='$id'";
        $result = mysqli_query($db, $sql);

        if ($result) {
            $_SESSION['msg'] = " Product updated successfully!";
        } else {
            $_SESSION['err'] = " Error updating product.";
        }

        header("Location: product.php");
        exit();
    }
    ?>

    <?php

    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $id = mysqli_real_escape_string($db, $id);

        $sql    = "SELECT * FROM products WHERE id = '$id'";
        $result = mysqli_query($db, $sql);
        $row    = mysqli_fetch_assoc($result);

        if ($row) {
            echo '
        <div class="edit-form">
            <h3>Edit Product</h3>
            <form method="POST" action="product.php">
                <input type="hidden" name="edit_id" value="' . $row['id'] . '">

                <label>Product Name:</label>
                <input type="text" name="edit_name" value="' . $row['name'] . '" required>

                <label>Brand:</label>
                <input type="text" name="edit_brand" value="' . $row['brand'] . '" required>

                <label>Price ($):</label>
                <input type="number" name="edit_price" value="' . $row['price'] . '" required>

                <label>Image filename (e.g. f1.jpg):</label>
                <input type="text" name="edit_img" value="' . $row['img'] . '" required>

                <button type="submit" name="save_edit" class="btn-edit">💾 Save Changes</button>
                <a href="product.php" style="color:#aaa; margin-left:10px;">Cancel</a>
            </form>
        </div>
        ';
        }
    }
    ?>

    <?php
    if (isset($_GET['add_to_cart'])) {
        $id = $_GET['add_to_cart'];
        $id = mysqli_real_escape_string($db, $id);

        $sql    = "SELECT * FROM products WHERE id = '$id'";
        $result = mysqli_query($db, $sql);
        $product = mysqli_fetch_assoc($result);

        if ($product) {
            echo '
            <div class="add-form">
                <h3>Add to Cart</h3>
                <form method="POST" action="product.php">
                    <input type="hidden" name="product_name" value="' . $product['name'] . '">
                    <input type="hidden" name="product_price" value="' . $product['price'] . '">
                    <button type="submit" name="add_to_cart" class="btn-add">Add ' . $product['name'] . ' to Cart</button>
                </form>
            </div>
        ';
        }
        if ($result) {
            $_SESSION['msg'] = "Product added to cart!";
        } else {
            $_SESSION['err'] = "Error adding product to cart.";
        }
    }
    ?>

    <?php

    $sql     = "SELECT * FROM products";
    $result  = mysqli_query($db, $sql);

    while ($product = mysqli_fetch_assoc($result)) {
        echo '
    <div class="product">
        <img src="images/' . $product['img'] . '" alt="' . $product['name'] . '">
        <p>' . $product['brand'] . '</p>
        <h4>' . $product['name'] . '</h4>
        <p>' . $product['price'] . '$</p>
        <div class="stars"><span class="star">★★★★☆</span></div>

        <a href="product.php?edit=' . $product['id'] . '">
            <button class="btn-edit">Edit</button>
        </a>

        <a href="product.php?delete=' . $product['id'] . '" onclick="return confirm(\'Are you sure you want to delete this product?\')">
            <button class="btn-delete">Delete</button>
        </a>

        <a href="product.php?add_to_cart=' . $product['id'] . '">
            <button class="btn-add">Add to Cart</button>
        </a>
    </div>
    ';
    }
    ?>

</body>

</html>