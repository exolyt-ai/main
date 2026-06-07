<?php
/**
 * CommunityController - Управление сообществами
 */

namespace App\Controllers;

class CommunityController {
    private $db;
    
    public function __construct($db) {
        $this->db = $db;
    }
    
    public function index() {
        $communities = $this->db->getAll(
            "SELECT * FROM communities ORDER BY members_count DESC"
        );
        
        require_once __DIR__ . '/../views/community.php';
    }
}
