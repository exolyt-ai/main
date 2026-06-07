<?php
/**
 * APIController - REST API endpoints
 */

namespace App\Controllers;

class APIController {
    private $db;
    
    public function __construct($db) {
        $this->db = $db;
        header('Content-Type: application/json');
    }
    
    public function generateRecipe() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['error' => 'Method not allowed']);
            return;
        }
        
        $data = json_decode(file_get_contents('php://input'), true);
        
        // Валидация
        if (!isset($data['restrictions']) || !isset($data['time'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Missing required fields']);
            return;
        }
        
        // Вызов Yandex GPT API
        $prompt = "Придумай рецепт с такими ограничениями: " . $data['restrictions'] . 
                  ", время готовки: " . $data['time'] . " минут. Выведи в формате JSON с полями: title, ingredients, instructions, prep_time, cook_time";
        
        $recipe = $this->callYandexGPT($prompt);
        
        echo json_encode([
            'success' => true,
            'recipe' => $recipe
        ]);
    }
    
    public function scanFood() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['error' => 'Method not allowed']);
            return;
        }
        
        if (!isset($_FILES['image'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Image file required']);
            return;
        }
        
        $user_id = $_SESSION['user']['id'] ?? null;
        if (!$user_id) {
            http_response_code(401);
            echo json_encode(['error' => 'Unauthorized']);
            return;
        }
        
        // Сохраняем изображение
        $image_path = $this->saveImage($_FILES['image']);
        
        // Вызов Yandex Computer Vision
        $result = $this->callYandexVision($image_path);
        
        // Сохраняем в БД
        $this->db->query(
            "INSERT INTO scanned_food (user_id, image_path, recognized_ingredients, calories, protein, fats, carbs) 
             VALUES (?, ?, ?, ?, ?, ?, ?)",
            [
                $user_id,
                $image_path,
                json_encode($result['ingredients']),
                $result['calories'] ?? 0,
                $result['protein'] ?? 0,
                $result['fats'] ?? 0,
                $result['carbs'] ?? 0
            ]
        );
        
        echo json_encode([
            'success' => true,
            'data' => $result
        ]);
    }
    
    private function callYandexGPT($prompt) {
        // Реализация API Yandex GPT
        // Это заглушка - замените на реальную реализацию с использованием YANDEX_API_KEY
        return [
            'title' => 'Sample Recipe',
            'ingredients' => [
                ['name' => 'Ingredient 1', 'amount' => 100, 'unit' => 'g']
            ],
            'instructions' => [
                ['step' => 1, 'text' => 'Cook the ingredients']
            ],
            'prep_time' => 10,
            'cook_time' => 20
        ];
    }
    
    private function callYandexVision($image_path) {
        // Реализация API Yandex Computer Vision
        // Это заглушка - замените на реальную реализацию
        return [
            'ingredients' => ['Chicken', 'Rice', 'Vegetables'],
            'calories' => 450,
            'protein' => 35,
            'fats' => 12,
            'carbs' => 48
        ];
    }
    
    private function saveImage($file) {
        $upload_dir = __DIR__ . '/../../public/uploads/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }
        
        $filename = uniqid() . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);
        move_uploaded_file($file['tmp_name'], $upload_dir . $filename);
        
        return '/uploads/' . $filename;
    }
}
