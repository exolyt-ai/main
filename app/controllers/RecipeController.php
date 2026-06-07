<?php
/**
 * RecipeController - Управление рецептами
 */

namespace App\Controllers;

class RecipeController {
    private $db;
    
    public function __construct($db) {
        $this->db = $db;
    }
    
    public function show() {
        $recipe_id = $_GET['id'] ?? null;
        
        if (!$recipe_id) {
            http_response_code(404);
            return;
        }
        
        $recipe = $this->db->getOne(
            "SELECT r.*, u.username FROM recipes r LEFT JOIN users u ON r.user_id = u.id WHERE r.id = ?",
            [$recipe_id]
        );
        
        if (!$recipe) {
            http_response_code(404);
            return;
        }
        
        // Увеличиваем количество просмотров
        $this->db->query("UPDATE recipes SET views_count = views_count + 1 WHERE id = ?", [$recipe_id]);
        
        // Получаем комментарии
        $comments = $this->db->getAll(
            "SELECT c.*, u.username FROM comments c LEFT JOIN users u ON c.user_id = u.id WHERE c.recipe_id = ? ORDER BY c.created_at DESC",
            [$recipe_id]
        );
        
        require_once __DIR__ . '/../views/recipe.php';
    }
}
