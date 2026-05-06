<?php
session_start();

$conn = new mysqli("localhost", "root", "", "php_ecom");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";

/* REGISTER */
if (isset($_POST['register'])) {

    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm = $_POST['confirm_password'];

    if ($password !== $confirm) {
        $message = "Passwords do not match.";
    } else {

        $hashed = password_hash($password, PASSWORD_DEFAULT);

        // CHECK EMAIL EXISTS
        $check = $conn->prepare("SELECT userid FROM users WHERE email = ?");
        $check->bind_param("s", $email);
        $check->execute();
        $check->store_result();

        if ($check->num_rows > 0) {
            $message = "Email already exists.";
        } else {

            // INSERT USER
            $stmt = $conn->prepare("INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $full_name, $email, $hashed);
            $stmt->execute();
            $stmt->close();

            $message = "Account created successfully.";
        }

        $check->close();
    }
}

/* LOGIN */
if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT userid, full_name, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($userid, $full_name, $hashed);

    if ($stmt->fetch() && password_verify($password, $hashed)) {
        $_SESSION['user_id'] = $userid;
        $_SESSION['full_name'] = $full_name;

        header("Location: index.php");
        exit();
    } else {
        $message = "Invalid login details.";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Register | Scent Atelier</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>
<body>

<?php include 'nav.php'; ?>

<div class="auth-wrapper">

<div class="auth-box">

    <?php if (!empty($message)) echo "<div class='auth-message'>$message</div>"; ?>

    <div class="auth-toggle">
        <button id="loginTab" class="active" onclick="switchTab('login')">Login</button>
        <button id="registerTab" onclick="switchTab('register')">Register</button>
    </div>

    <!-- LOGIN -->
    <form id="loginForm" method="POST">
        <h2 class="auth-title">Welcome Back</h2>

        <input type="email" name="email" placeholder="Email address" required>
        <input type="password" name="password" placeholder="Password" required>

        <button class="auth-btn" name="login">Login</button>
    </form>

    <!-- REGISTER -->
    <form id="registerForm" method="POST" style="display:none;">
        <h2 class="auth-title">Create Account</h2>

        <input type="text" name="full_name" placeholder="Full name" required>
        <input type="email" name="email" placeholder="Email address" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="confirm_password" placeholder="Confirm password" required>

        <button class="auth-btn" name="register">Register</button>
    </form>

</div>

</div>

<script>
function switchTab(tab){
    document.getElementById("loginForm").style.display = (tab === 'login') ? 'block' : 'none';
    document.getElementById("registerForm").style.display = (tab === 'register') ? 'block' : 'none';

    document.getElementById("loginTab").classList.toggle("active", tab === 'login');
    document.getElementById("registerTab").classList.toggle("active", tab === 'register');
}
</script>

<?php include 'footer.php'; ?>

</body>
</html>