# CookAI Project Documentation

## 📚 Структура проекта

```
cookai/
├── public/
│   ├── index.php                 # Точка входа приложения
│   ├── .htaccess                # Apache конфигурация
│   └── uploads/                 # Загруженные файлы пользователей
│
├── app/
│   ├── controllers/             # Контроллеры
│   │   ├── HomeController.php
│   │   ├── RecipeController.php
│   │   ├── AIController.php
│   │   ├── CommunityController.php
│   │   ├── ProfileController.php
│   │   ├── AdminController.php
│   │   └── APIController.php
│   │
│   ├── models/                  # Модели БД
│   │   ├── User.php
│   │   ├── Recipe.php
│   │   ├── Community.php
│   │   └── ...
│   │
│   ├── views/                   # Шаблоны
│   │   ├── home.php
│   │   ├── recipe.php
│   │   ├── ai.php
│   │   ├── community.php
│   │   ├── profile.php
│   │   └── admin/
│   │       └── dashboard.php
│   │
│   └── assets/                  # Статические файлы
│       ├── css/
│       │   ├── style.css        # Главные стили
│       │   └── admin.css        # Стили админ-панели
│       └── js/
│           ├── main.js          # Основной скрипт
│           └── ai.js            # AI инструменты
│
├── config/
│   ├── database.php             # Параметры БД
│   ├── yandex_ai.php            # Yandex AI конфигурация
│   ├── schema.sql               # Структура БД
│   └── seeds.sql                # Тестовые данные
│
├── .env.example                 # Пример .env файла
├── .gitignore                   # Git исключения
├── LICENSE.md                   # MIT лицензия
└── README.md                    # Документация
```

## 🚀 Быстрый старт

### Предварительные требования
- PHP 8.0+
- MySQL 5.7+
- Apache с mod_rewrite
- cURL, GD

### 1. Загрузка файлов
Загрузите все файлы проекта на хостинг в папку `public_html/`

### 2. Создание БД
```bash
mysql -u user -p < config/schema.sql
```

### 3. Конфигурация
Создайте файл `.env` из `.env.example`:
```bash
cp .env.example .env
```

Отредактируйте `.env`:
```env
DB_HOST=localhost
DB_NAME=cookai_db
DB_USER=your_user
DB_PASS=your_password

YANDEX_API_KEY=ваш_ключ
YANDEX_FOLDER_ID=ваш_folder_id
```

### 4. Загрузка тестовых данных
```bash
mysql -u user -p cookai_db < config/seeds.sql
```

### 5. Права доступа
```bash
chmod 755 app/
chmod 755 public/
chmod 755 config/
```

## 🎨 Дизайн CookAI

### Цветовая палитра
- **Primary:** #D4A574 (коричневый)
- **Secondary:** #FFE5CC (кремовый)
- **Accent:** #FFD0A3 (персиковый)
- **Dark:** #2D2D2D (черный)
- **Light:** #FFF8F0 (светлый фон)

### Компоненты
- **Navbar:** белый фон, липкая позиция
- **Карточки рецептов:** с изображением, метаданными, кнопкой
- **Формы:** с валидацией и feedback
- **Admin панель:** боковое меню с навигацией

## 🔐 Безопасность

### Реализовано
- ✅ PDO prepared statements для защиты от SQL-инъекций
- ✅ Защита API-ключей в конфиге
- ✅ Хеширование паролей (password_hash)
- ✅ Session безопасность
- ✅ CORS заголовки

### Рекомендации
- Используйте HTTPS в production
- Не commit .env файл
- Регулярно обновляйте зависимости
- Используйте strong пароли БД

## 📊 API Endpoints

### Recipe API
```
GET  /api/recipes              # Список рецептов
GET  /api/recipes/{id}         # Деталь рецепта
POST /api/recipe/generate      # Генерация рецепта (AI)
```

### Food Scan API
```
POST /api/food/scan            # Сканирование блюда
GET  /api/food/scanned         # История сканирований
```

### Community API
```
GET  /api/communities          # Список сообществ
POST /api/communities/join     # Присоединиться к сообществу
```

## 🔧 Разработка

### Добавление новой страницы

1. **Создайте контроллер** `app/controllers/NewController.php`
2. **Создайте представление** `app/views/new.php`
3. **Добавьте маршрут** в `public/index.php`
4. **Добавьте стили** в `app/assets/css/style.css`

### Пример контроллера
```php
<?php
namespace App\Controllers;

class NewController {
    private $db;
    
    public function __construct($db) {
        $this->db = $db;
    }
    
    public function index() {
        $data = $this->db->getAll("SELECT * FROM recipes");
        require_once __DIR__ . '/../views/new.php';
    }
}
```

## 📞 Поддержка

### Issues
Создавайте Issues в GitHub для:
- Багов
- Улучшений
- Вопросов

### Pull Requests
Приветствуются PR с улучшениями!

## 📝 Changelog

### v1.0.0 (2026-06-07)
- ✅ Инициальный релиз
- ✅ Основной функционал
- ✅ AI интеграция
- ✅ Admin панель

## 📄 Лицензия

MIT License - см. LICENSE.md

---

**Автор:** exolyt-ai  
**Дата:** 2026-06-07  
**Версия:** 1.0.0
