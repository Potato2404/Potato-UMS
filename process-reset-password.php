<?php

$token = $_POST["token"];

$token_hash = hash("sha256", $token);

$mysqli = require __DIR__ . "/db_connect.php";

$sql = "SELECT * FROM user_form
        WHERE reset_token_hash = ?";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("s", $token_hash);

$stmt->execute();

$result = $stmt->get_result();

$user = $result->fetch_assoc();

if ($user === null) {
    die("token not found");
}

if (strtotime($user["reset_token_expires_at"]) <= time()) {
    die("token has expired");
}

if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}

if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if ( ! preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}

if ($_POST["password"] !== $_POST["cpassword"]) {
    die("Passwords must match");
}

$pass = isset($_POST['password']) ? md5($_POST['password']) : '';

$sql = "UPDATE user_form
        SET password = ?,
            reset_token_hash = NULL,
            reset_token_expires_at = NULL
        WHERE id = ?";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("ss", $pass, $user["id"]);

$stmt->execute();

if ($mysqli->affected_rows) {
    // Redirect to success.php
    header("Location: reset_succes.php");
    exit(); // Make sure to exit after redirection
}