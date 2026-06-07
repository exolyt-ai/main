<?php
/**
 * AIController - AI инструменты
 */

namespace App\Controllers;

class AIController {
    private $db;
    
    public function __construct($db) {
        $this->db = $db;
    }
    
    public function index() {
        require_once __DIR__ . '/../views/ai.php';
    }
}
