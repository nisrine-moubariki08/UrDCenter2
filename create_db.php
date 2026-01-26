<?php
try {
    $pdo = new PDO('mysql:host=127.0.0.1;port=3306', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec('CREATE DATABASE IF NOT EXISTS datacenterproj1_db');
    echo "Database 'datacenterproj1_db' created successfully or already exists.\n";
    $pdo->exec('USE datacenterproj1_db');
    $pdo->exec('SET FOREIGN_KEY_CHECKS=0');
    $pdo->exec('DROP TABLE IF EXISTS migrations, users, sessions, password_reset_tokens, cache, cache_locks, jobs, job_batches, resource_categories, resources, reservations, incidents, categories');
    $pdo->exec('SET FOREIGN_KEY_CHECKS=1');
    echo "Dropped orphan tables if any.\n";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
    exit(1);
}
