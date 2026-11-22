<?php
if (!isset($_SESSION)) {
    session_start();
}

$error = array();

$db = mysqli_connect('localhost', 'root', '', 'projectia',3307);

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email    = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $confirm  = mysqli_real_escape_string($db, $_POST['confirm_pass']);

    if (empty($username)) {
        array_push($error, "Username is required");
    }
    if (empty($email)) {
        array_push($error, "Email is required");
    }
    if (empty($password)) {
        array_push($error, "Password is required");
    }
    if (empty($confirm)) {
        array_push($error, "Confirm password is required");
    }
    if ($password != $confirm) {
        array_push($error, "Passwords do not match");
    }

    if (count($error) == 0) {
        $sql = "INSERT INTO userinfo (name, email, password) VALUES ('$username', '$email', '$password')";
        mysqli_query($db, $sql);
        $_SESSION['username'] = $username;
        $_SESSION['success']  = "Registration successful!";
        header('location: home_page.php');
        exit();
    }
}

if (isset($_POST['Login'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username)) {
        array_push($error, "Username is required");
    }
    if (empty($password)) {
        array_push($error, "Password is required");
    }

    if (count($error) == 0) {
        $query  = "SELECT * FROM userinfo WHERE name='$username' AND password='$password'";
        $result = mysqli_query($db, $query);

        if (mysqli_num_rows($result) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['success']  = "Welcome! You are now logged in";
            header('location: home_page.php');
            exit();
        } else {
            array_push($error, "Wrong username or password");
        }
    }
}

if (isset($_POST['add_to_cart'])) {
    $name  = $_POST['product_name'];
    $price = $_POST['product_price'];

    $product = array("name" => $name, "price" => $price, "quantity" => 1);

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    $found = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['name'] == $name) {
            $item['quantity'] += 1;
            $found = true;
            break;
        }
    }

    if (!$found) {
        $_SESSION['cart'][] = $product;
    }

    header("Location: product.php");
    exit();
}