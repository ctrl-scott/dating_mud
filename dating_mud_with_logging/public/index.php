<?php
// Enable error reporting for development
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('../lib/db.php');

// Fetch factions
$factionStmt = $pdo->query("SELECT name FROM factions ORDER BY name ASC");
$factions = $factionStmt->fetchAll(PDO::FETCH_COLUMN);

// Fetch regions
$regionStmt = $pdo->query("SELECT name FROM regions ORDER BY name ASC");
$regions = $regionStmt->fetchAll(PDO::FETCH_COLUMN);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Heartland Crawl - Register or Login</title>
</head>
<body>
  <h1>Register for Heartland Crawl</h1>

  <form id="registerForm">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>

    <select name="faction" required>
      <option value="">Choose Faction</option>
      <?php foreach ($factions as $f): ?>
        <option value="<?= htmlspecialchars($f) ?>"><?= htmlspecialchars($f) ?></option>
      <?php endforeach; ?>
    </select><br>

    <select name="region" required>
      <option value="">Choose Region</option>
      <?php foreach ($regions as $r): ?>
        <option value="<?= htmlspecialchars($r) ?>"><?= htmlspecialchars($r) ?></option>
      <?php endforeach; ?>
    </select><br>

    <button type="submit">Register</button>
  </form>

  <div id="message"></div>

  <hr>
  <h2>Login</h2>

  <form id="loginForm">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Login</button>
  </form>

  <div id="loginMessage"></div>

  <script>
    // Handle registration
    document.getElementById('registerForm').onsubmit = async (e) => {
      e.preventDefault();
      const form = e.target;
      const data = new FormData(form);

      const res = await fetch('/api/register.php', {
        method: 'POST',
        body: data
      });

      const text = await res.text();
      document.getElementById('message').innerText = text;
      form.reset();
    };

    // Handle login
    document.getElementById('loginForm').onsubmit = async (e) => {
      e.preventDefault();
      const form = e.target;
      const data = new FormData(form);

      const res = await fetch('/api/login.php', {
        method: 'POST',
        body: data
      });

      const text = await res.text();
      document.getElementById('loginMessage').innerText = text;
      form.reset();
    };
  </script>
</body>
</html>
