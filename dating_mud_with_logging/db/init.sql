-- Users Table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    faction VARCHAR(50),
    region VARCHAR(100),
    stats JSON,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Encounters Log
CREATE TABLE encounters (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    npc_profile JSON,
    outcome TEXT,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);