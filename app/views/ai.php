<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Инструменты - CookAI</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <nav class="navbar">
        <div class="navbar-container">
            <div class="navbar-brand">
                <h1>🍳 CookAI</h1>
            </div>
            <ul class="navbar-menu">
                <li><a href="/">Главная</a></li>
                <li><a href="/ai" class="active">AI Инструменты</a></li>
                <li><a href="/community">Сообщество</a></li>
                <li><a href="/profile">Личное</a></li>
            </ul>
        </div>
    </nav>

    <main class="container">
        <section class="hero">
            <h2>🤖 AI Инструменты</h2>
            <p>Используй силу искусственного интеллекта для кулинарии</p>
        </section>

        <section class="ai-tools">
            <div class="tool-card">
                <h3>🧠 Генератор рецептов</h3>
                <p>AI придумает рецепт по твоим ограничениям</p>
                <form id="recipe-form" class="ai-form">
                    <input type="text" name="restrictions" placeholder="Диета, ингредиенты..." required>
                    <input type="number" name="time" placeholder="Время готовки (минут)" required>
                    <button type="submit" class="btn-primary">Сгенерировать</button>
                </form>
                <div id="recipe-result"></div>
            </div>

            <div class="tool-card">
                <h3>📸 Сканер калорий</h3>
                <p>Загрузи фото блюда и узнай калорийность</p>
                <form id="scan-form" class="ai-form" enctype="multipart/form-data">
                    <input type="file" name="image" accept="image/*" required>
                    <button type="submit" class="btn-primary">Сканировать</button>
                </form>
                <div id="scan-result"></div>
            </div>

            <div class="tool-card">
                <h3>🧊 Подбор по холодильнику</h3>
                <p>Введи список продуктов и найди подходящие рецепты</p>
                <form id="fridge-form" class="ai-form">
                    <textarea name="ingredients" placeholder="Перечисли продукты через запятую" required></textarea>
                    <button type="submit" class="btn-primary">Найти рецепты</button>
                </form>
            </div>
        </section>
    </main>

    <script src="/assets/js/ai.js"></script>
</body>
</html>
