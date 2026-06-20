<?php require_once 'config.php'; ?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>MotoMarket</title><link rel="stylesheet" href="assets/css/style.css"></head><body>
<header class="navbar"><a class="logo" href="index.php">Moto<span>Market</span></a><nav>
<a href="index.php">Home</a><a href="products.php">Shop</a><a href="cart.php">Cart (<?= cart_count(); ?>)</a><?php if(is_admin()): ?><a href="admin.php">Admin</a><?php endif; ?>
<?php if(is_logged_in()): ?><span class="hello">Hi, <?= htmlspecialchars($_SESSION['name']); ?></span><a href="logout.php">Logout</a><?php else: ?><a href="login.php">Login</a><a class="nav-btn" href="register.php">Register</a><?php endif; ?>
</nav></header>
