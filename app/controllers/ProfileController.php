<?php
/**
 * ProfileController - Профили пользователей
 */

namespace App\Controllers;

class ProfileController {
    private $db;
    
    public function __construct($db) {
        $this->db = $db;
    }
    
    public function index() {
        $user_id = $_GET['id'] ?? ($_SESSION['user']['id'] ?? null);
        
        if (!$user_id) {
            http_response_code(401);
            return;
        }
        
        $user = $this->db->getOne(
            "SELECT * FROM users WHERE id = ?",
            [$user_id]
        );
        
        if (!$user) {
            http_response_code(404);
            return;
        }
        
        $recipes = $this->db->getAll(
            "SELECT * FROM recipes WHERE user_id = ? ORDER BY created_at DESC",
            [$user_id]
        );
        
        require_once __DIR__ . '/../views/profile.php';
    }
}
