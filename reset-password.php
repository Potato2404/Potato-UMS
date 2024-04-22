<?php

$token = $_GET["token"];

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

?>
<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style24.css">
</head>
<body>

<div class="form-container">
    <form method="post" action="process-reset-password.php">
        <h3><span style="color: crimson; ">r</span>eset <span style="color: crimson;">p</span>assword</h3>
        <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
        <input type="password" name="password" style="width: 100%;" required placeholder="enter your new password">
        <input type="password" name="cpassword" style="width: 100%;" required placeholder="confirm your password">
        <input type="submit" style="width: 100%;" value="Okay" class="form-btn">
    </form>
</div>

</body>
</html>