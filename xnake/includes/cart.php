<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

function add_to_cart($product_id) {
    if (!isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] = 1;
    } else {
        $_SESSION['cart'][$product_id]++;
    }
}

function remove_from_cart($product_id) {
    if (isset($_SESSION['cart'][$product_id])) {
        unset($_SESSION['cart'][$product_id]);
    }
}

function get_cart() {
    global $conn;
    $cart = array();
    foreach ($_SESSION['cart'] as $product_id => $quantity) {
        $result = $conn->query("SELECT * FROM produtos WHERE id = $product_id");
        if ($result) {
            $product = $result->fetch_assoc();
            $product['quantity'] = $quantity;
            $cart[] = $product;
        }
    }
    return $cart;
}
?>
