<?php
// Enable error logging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/**
 * MLA Citation:
 * Owen, Scott. “Heartland Crawl Registration Logic.” ChatGPT, OpenAI, 2025.
 */

require_once('../lib/db.php');

try {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $faction  = $_POST['faction'] ?? '';
    $region   = $_POST['region'] ?? '';

    if (!$username || !$password || !$faction || !$region) {
        http_response_code(400);
        echo "❌ Missing required fields.";
        exit;
    }

    $hash = password_hash($password, PASSWORD_BCRYPT);
    $defaultStats = json_encode([
        "health" => 100,
        "charm" => rand(10, 50),
        "wealth" => rand(5, 30)
    ]);

    $stmt = $pdo->prepare("INSERT INTO users (username, password_hash, faction, region, stats) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$username, $hash, $faction, $region, $defaultStats]);

    echo "✅ Registration successful. Welcome, $username!";
} catch (PDOException $e) {
    http_response_code(500);
    echo "❌ Error: " . $e->getMessage();
}
