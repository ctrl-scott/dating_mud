<?php
// lib/db.php
// MLA Citation:
// Owen, Scott. “Heartland Crawl Database Handler.” ChatGPT, OpenAI, 2025.
// PHP Documentation: https://www.php.net/manual/en/pdo.construct.php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database configuration
define('DB_HOST', 'localhost');
define('DB_PORT', '3306'); // Default MySQL port
define('DB_NAME', 'scottina_dating_mud');
define('DB_USER', 'scottina');
define('DB_PASS', 'Flossy1978123!'); // Update this securely for production

try {
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME,
        DB_USER,
        DB_PASS,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    die("❌ Database connection failed: " . $e->getMessage());
}
?>
