<?php
include 'header.php';
$error = "";
$success = isset($_GET['registered']) ? "Account created. Login now." : "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];
        header("Location: " . ($user['role'] === 'admin' ? "admin.php" : "index.php"));
        exit;
    } else {
        $error = "Wrong email or password.";
    }
}
?>
<section class="auth-page">
  <form class="auth-card" method="POST">
    <h1>Login</h1>
    <?php if ($success): ?><div class="success"><?= htmlspecialchars($success); ?></div><?php endif; ?>
    <?php if ($error): ?><div class="error"><?= htmlspecialchars($error); ?></div><?php endif; ?>
    <input name="email" type="email" required placeholder="Email">
    <input name="password" type="password" required placeholder="Password">
    <button class="btn" type="submit">Login</button>

<?php
require_once 'google-config.php';
$google_login_url = $google_client->createAuthUrl();
?>
<a class="google-btn" href="<?= htmlspecialchars($google_login_url); ?>">Continue with Google</a>

    <p>No account? <a href="register.php">Register</a></p>
  </form>
</section>
<?php include 'footer.php'; ?>
