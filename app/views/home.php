<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CookAI - Интеллектуальная кулинарная платформа</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <nav class="navbar">
        <div class="navbar-container">
            <div class="navbar-brand">
                <h1>🍳 CookAI</h1>
            </div>
            <ul class="navbar-menu">
                <li><a href="/" class="active">Главная</a></li>
                <li><a href="/ai">AI Инструменты</a></li>
                <li><a href="/community">Сообщество</a></li>
                <li><a href="/profile">Личное</a></li>
                <?php if (isset($user)): ?>
                    <li><a href="/admin" class="btn-admin">Админ</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <main class="container">
        <section class="hero">
            <h2>Кулинарное вдохновение с AI</h2>
            <p>Генерируй рецепты, сканируй калории, учись готовить и вдохновляй других</p>
        </section>

        <section class="section">
            <h3>Популярное</h3>
            <div class="recipes-grid">
                <?php foreach ($popular as $recipe): ?>
                    <div class="recipe-card">
                        <div class="recipe-image" style="background: linear-gradient(135deg, #FFE5CC, #FFD0A3);"></div>
                        <div class="recipe-content">
                            <h4><?= htmlspecialchars($recipe['title']) ?></h4>
                            <p class="recipe-meta">
                                ⏱️ <?= $recipe['cook_time'] ?> мин | 
                                🔥 <?= $recipe['calories'] ?> ккал | 
                                ⭐ <?= $recipe['difficulty'] ?>
                            </p>
                            <a href="/recipe?id=<?= $recipe['id'] ?>" class="btn-primary">Смотреть</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="section">
            <h3>Сезонные рецепты</h3>
            <div class="recipes-grid">
                <?php foreach ($seasonal as $recipe): ?>
                    <div class="recipe-card">
                        <div class="recipe-image" style="background: linear-gradient(135deg, #D4A574, #C99060);"></div>
                        <div class="recipe-content">
                            <h4><?= htmlspecialchars($recipe['title']) ?></h4>
                            <p class="recipe-meta">
                                ⏱️ <?= $recipe['cook_time'] ?> мин | 
                                🔥 <?= $recipe['calories'] ?> ккал
                            </p>
                            <a href="/recipe?id=<?= $recipe['id'] ?>" class="btn-primary">Смотреть</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>

    <footer class="footer">
        <p>&copy; 2026 CookAI. Все права защищены.</p>
    </footer>

    <script src="/assets/js/main.js"></script>
</body>
</html>
