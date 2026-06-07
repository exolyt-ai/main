<?php
/**
 * CookAI - Интеллектуальная кулинарная платформа
 * Точка входа приложения
 */

session_start();

// Включаем конфигурацию
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../config/yandex_ai.php';

// Автозагрузка классов
spl_autoload_register(function ($class) {
    $path = __DIR__ . '/../app/' . str_replace('\\\\', '/', $class) . '.php';
    if (file_exists($path)) {
        require_once $path;
    }
});

// Инициализация приложения
try {
    $app = new App();
    $app->run();
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'error' => 'Internal Server Error',
        'message' => $e->getMessage()
    ]);
}

class App {
    private $db;
    
    public function __construct() {
        $this->db = new Database();
    }
    
    public function run() {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = trim(str_replace('/public', '', $uri), '/');
        
        // Маршруты
        $routes = [
            '' => 'Controllers\\HomeController@index',
            'recipe' => 'Controllers\\RecipeController@show',
            'ai' => 'Controllers\\AIController@index',
            'community' => 'Controllers\\CommunityController@index',
            'profile' => 'Controllers\\ProfileController@index',
            'admin' => 'Controllers\\AdminController@dashboard',
            'api/recipe/generate' => 'Controllers\\APIController@generateRecipe',
            'api/food/scan' => 'Controllers\\APIController@scanFood',
        ];
        
        // Поиск маршрута
        $controller = null;
        $method = 'index';
        
        foreach ($routes as $path => $handler) {
            if ($uri === $path || strpos($uri, $path) === 0) {
                list($controller, $method) = explode('@', $handler);
                break;
            }
        }
        
        if ($controller) {
            $controllerClass = 'App\\' . $controller;
            if (class_exists($controllerClass)) {
                $ctrl = new $controllerClass($this->db);
                $ctrl->$method();
            } else {
                http_response_code(404);
                echo "Controller not found: $controllerClass";
            }
        } else {
            http_response_code(404);
            require_once __DIR__ . '/../app/views/404.php';
        }
    }
}

class Database {
    private $pdo;
    
    public function __construct() {
        try {
            $this->pdo = new PDO(
                'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4',
                DB_USER,
                DB_PASS,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ]
            );
        } catch (PDOException $e) {
            die('Database connection failed: ' . $e->getMessage());
        }
    }
    
    public function query($sql, $params = []) {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
    
    public function getOne($sql, $params = []) {
        return $this->query($sql, $params)->fetch();
    }
    
    public function getAll($sql, $params = []) {
        return $this->query($sql, $params)->fetchAll();
    }
}
