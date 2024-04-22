<?php

// Function to set remember me cookie
function setRememberMeCookie($email, $password) {
    $cookie_value = $email . ':' . $password;
    $cookie_expire = time() + (10 * 365 * 24 * 60 * 60); // 10 years
    setcookie('remember_me', $cookie_value, $cookie_expire, '/');
}

// Function to unset remember me cookie
function unsetRememberMeCookie() {
    setcookie('remember_me', '', time() - 3600, '/');
}

// Check if remember me cookie is set
if (isset($_COOKIE['remember_me']) && !isset($_SESSION['user_name'])) {
    @include 'db_connect.php';
    list($email, $password) = explode(':', $_COOKIE['remember_me']);
    $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$password'";
    $result = mysqli_query($conn, $select);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $_SESSION['user_name'] = $row['name'];
        if ($row['user_type'] == 'admin') {
            $_SESSION['admin_name'] = $row['name'];
            header('location:index_admin_page.php');
        } else {
            header('location:index_user_page.php');
        }
        exit();
    } else {
        unsetRememberMeCookie();
    }
}