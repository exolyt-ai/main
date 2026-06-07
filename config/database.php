<?php
/**
 * Конфигурация базы данных
 */

// Проверяем наличие .env файла и загружаем переменные
if (file_exists(__DIR__ . '/../.env')) {
    $env_vars = parse_ini_file(__DIR__ . '/../.env');
    foreach ($env_vars as $key => $value) {
        $_ENV[$key] = $value;
    }
}

define('DB_HOST', $_ENV['DB_HOST'] ?? 'localhost');
define('DB_NAME', $_ENV['DB_NAME'] ?? 'cookai_db');
define('DB_USER', $_ENV['DB_USER'] ?? 'root');
define('DB_PASS', $_ENV['DB_PASS'] ?? '');

// Параметры приложения
define('APP_URL', $_ENV['APP_URL'] ?? 'http://localhost');
define('APP_DEBUG', $_ENV['APP_DEBUG'] ?? true);
define('APP_TIMEZONE', $_ENV['APP_TIMEZONE'] ?? 'Europe/Moscow');

date_default_timezone_set(APP_TIMEZONE);
