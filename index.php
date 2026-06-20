<?php include 'header.php'; ?>
<section class="hero"><div><p class="badge">Premium motorcycles and spare parts</p><h1>Ride harder. Repair smarter.</h1><p>Buy motorcycles, oils, brakes, filters, helmets, and essential spare parts.</p><a class="btn" href="products.php">Shop Now</a></div></section>
<section class="section"><div class="section-head"><h2>Featured Products</h2><a href="products.php">View all →</a></div><div class="grid">
<?php $stmt=$pdo->query("SELECT * FROM products ORDER BY created_at DESC LIMIT 6"); foreach($stmt as $p): ?>
<div class="card"><img src="<?= htmlspecialchars($p['image']); ?>"><h3><?= htmlspecialchars($p['name']); ?></h3><p><?= htmlspecialchars($p['brand']); ?> • <?= htmlspecialchars(str_replace('_',' ',$p['category'])); ?></p><strong>$<?= number_format($p['price'],2); ?></strong><a class="btn small" href="product.php?id=<?= $p['id']; ?>">View</a></div>
<?php endforeach; ?></div></section><?php include 'footer.php'; ?>
