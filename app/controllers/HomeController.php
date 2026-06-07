<?php
/**
 * HomeController - Главная страница приложения
 */

namespace App\Controllers;

class HomeController {
    private $db;
    
    public function __construct($db) {
        $this->db = $db;
    }
    
    public function index() {
        // Получаем популярные рецепты
        $popular = $this->db->getAll(
            "SELECT * FROM recipes ORDER BY views_count DESC LIMIT 6"
        );
        
        // Получаем сезонные рецепты
        $seasonal = $this->db->getAll(
            "SELECT * FROM recipes ORDER BY created_at DESC LIMIT 6"
        );
        
        // Получаем текущего пользователя (если залогирован)
        $user = $_SESSION['user'] ?? null;
        
        require_once __DIR__ . '/../views/home.php';
    }
}
