# CookAI - API Reference

## 🔌 REST API Endpoints

### Рецепты

#### Список рецептов
```
GET /api/recipes?page=1&limit=10&cuisine=итальянская
```

**Параметры:**
- `page` (int) - номер страницы
- `limit` (int) - количество рецептов на странице
- `cuisine` (string) - тип кухни
- `diet_type` (string) - тип диеты

**Ответ:**
```json
{
  "success": true,
  "data": [
    {
      "id": 1,
      "title": "Паста Карбонара",
      "calories": 650,
      "cook_time": 20,
      "difficulty": "medium"
    }
  ],
  "total": 100
}
```

#### Деталь рецепта
```
GET /recipe?id=1
```

**Ответ:**
```json
{
  "id": 1,
  "title": "Паста Карбонара",
  "description": "Классическое итальянское блюдо",
  "ingredients": [...],
  "instructions": [...],
  "calories": 650,
  "protein": 25,
  "fats": 28,
  "carbs": 65
}
```

### AI Инструменты

#### Генерация рецепта
```
POST /api/recipe/generate
Content-Type: application/json

{
  "restrictions": "без глютена, без молочных продуктов",
  "time": 30
}
```

**Ответ:**
```json
{
  "success": true,
  "recipe": {
    "title": "Куриный рис без глютена",
    "ingredients": [...],
    "instructions": [...]
  }
}
```

#### Сканирование блюда
```
POST /api/food/scan
Content-Type: multipart/form-data

image: [binary image data]
```

**Ответ:**
```json
{
  "success": true,
  "data": {
    "ingredients": ["Курица", "Рис", "Овощи"],
    "calories": 450,
    "protein": 35,
    "fats": 12,
    "carbs": 48,
    "confidence": 0.92
  }
}
```

### Сообщества

#### Список сообществ
```
GET /api/communities?sort=members
```

**Параметры:**
- `sort` - сортировка (members, created_at, name)

**Ответ:**
```json
{
  "success": true,
  "data": [
    {
      "id": 1,
      "name": "Вегетарианцы",
      "members_count": 150,
      "description": "Сообщество любителей растительной пищи"
    }
  ]
}
```

### Челленджи

#### Текущие челленджи
```
GET /api/challenges/active
```

**Ответ:**
```json
{
  "success": true,
  "data": [
    {
      "id": 1,
      "title": "30 дней ПП",
      "participants": 1250,
      "reward_points": 500,
      "progress": 15
    }
  ]
}
```

### Профиль

#### Информация пользователя
```
GET /api/users/{id}
```

**Ответ:**
```json
{
  "id": 1,
  "username": "john_chef",
  "bio": "Любитель готовки",
  "followers_count": 320,
  "recipes_count": 45
}
```

#### Рецепты пользователя
```
GET /api/users/{id}/recipes
```

**Ответ:**
```json
{
  "success": true,
  "data": [...]
}
```

## 🔐 Аутентификация

Все защищенные endpoints требуют токена в header:
```
Authorization: Bearer {token}
```

## 📊 Коды ошибок

| Код | Описание |
|-----|---------|
| 200 | OK |
| 400 | Bad Request |
| 401 | Unauthorized |
| 403 | Forbidden |
| 404 | Not Found |
| 500 | Internal Server Error |

## 📝 Примеры

### cURL

```bash
# Получить рецепты
curl -X GET "https://yourdomain.com/api/recipes?limit=5"

# Генерировать рецепт
curl -X POST "https://yourdomain.com/api/recipe/generate" \
  -H "Content-Type: application/json" \
  -d '{"restrictions":"без молока","time":30}'

# Сканировать блюдо
curl -X POST "https://yourdomain.com/api/food/scan" \
  -F "image=@/path/to/image.jpg"
```

### JavaScript

```javascript
// Получить рецепты
fetch('/api/recipes?limit=5')
  .then(r => r.json())
  .then(data => console.log(data));

// Генерировать рецепт
fetch('/api/recipe/generate', {
  method: 'POST',
  headers: { 'Content-Type': 'application/json' },
  body: JSON.stringify({ restrictions: 'без молока', time: 30 })
})
  .then(r => r.json())
  .then(data => console.log(data));
```

---

**Версия:** 1.0.0
