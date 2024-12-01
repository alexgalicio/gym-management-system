<?php

$token = $_GET["token"];

$token_hash = hash("sha256", $token);

include "dbcon.php";

$sql = "SELECT * FROM members
        WHERE reset_token_hash = ?";

$stmt = $con->prepare($sql);

$stmt->bind_param("s", $token_hash);

$stmt->execute();

$result = $stmt->get_result();

$user = $result->fetch_assoc();

if ($user === null) {
    die("Token not found");
}

if (strtotime($user["reset_token_hash_exp_at"]) <= time()) {
    die("Token has expired");
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Fitness Infinity</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/loginregister.css">
</head>

<body>

    <main>
        <div class="background">
            <a href="../index.php">
                <h1>Fitness Infinity</h1>
            </a>
        </div>

        <div class="form-container">
            <form class="form" method="post" action="process-reset.php" onsubmit="return validatePassword()">
                <div class="form-greet">
                    <h2>Reset Password</h2>
                </div>

                <div class="input-fields">
                    <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
                    <input type="password" id="password" name="password" placeholder="New Password"
                        pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$"
                        title="Password must contain at least one uppercase letter, one lowercase letter, one number, one symbol, and be at least 8 characters long."
                        required>

                    <input type="password" id="password_confirmation" name="password_confirmation" required
                        placeholder="Confirm Password">
                </div>

                <div class="submit">
                    <button class="login" type="submit">Log In</button>
                </div>
            </form>
        </div>
    </main>

    <script>
        function validatePassword() {
            const password = document.getElementById("password").value;
            const confirmPassword = document.getElementById("password_confirmation").value;

            if (password !== confirmPassword) {
                alert("Passwords do not match!");
                return false;
            }
            return true;
        }
    </script>

</body>

</html>