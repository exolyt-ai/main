<?php
/**
 * AdminController - Панель администратора
 */

namespace App\Controllers;

class AdminController {
    private $db;
    
    public function __construct($db) {
        $this->db = $db;
    }
    
    public function dashboard() {
        // Проверка прав администратора
        if (!isset($_SESSION['user']) || !$_SESSION['user']['is_admin']) {
            http_response_code(403);
            require_once __DIR__ . '/../views/admin/login.php';
            return;
        }
        
        $stats = [
            'total_users' => $this->db->getOne("SELECT COUNT(*) as count FROM users")['count'],
            'total_recipes' => $this->db->getOne("SELECT COUNT(*) as count FROM recipes")['count'],
            'total_communities' => $this->db->getOne("SELECT COUNT(*) as count FROM communities")['count'],
        ];
        
        $recent_users = $this->db->getAll(
            "SELECT * FROM users ORDER BY created_at DESC LIMIT 10"
        );
        
        require_once __DIR__ . '/../views/admin/dashboard.php';
    }
}
