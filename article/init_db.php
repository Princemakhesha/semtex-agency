<?php
try {
    $db = new PDO('sqlite:comments.db');

    // Enable foreign keys
    $db->exec("PRAGMA foreign_keys = ON");

    // Create comments table
    $db->exec("CREATE TABLE IF NOT EXISTS comments (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL,
        comment TEXT NOT NULL,
        date_time DATETIME DEFAULT CURRENT_TIMESTAMP
    )");

    // Create replies table
    $db->exec("CREATE TABLE IF NOT EXISTS replies (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        comment_id INTEGER NOT NULL,
        name TEXT NOT NULL,
        reply TEXT NOT NULL,
        date_time DATETIME DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (comment_id) REFERENCES comments(id) ON DELETE CASCADE
    )");

    echo "Database and tables created successfully!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
