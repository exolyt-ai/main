<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($user['username']) ?> - CookAI</title>
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
                <li><a href="/ai">AI Инструменты</a></li>
                <li><a href="/community">Сообщество</a></li>
                <li><a href="/profile" class="active">Личное</a></li>
            </ul>
        </div>
    </nav>

    <main class="container">
        <section class="profile-section">
            <div class="profile-header">
                <div class="profile-avatar" style="background: linear-gradient(135deg, #D4A574, #C99060); width: 120px; height: 120px; border-radius: 50%; margin: 0 auto;"></div>
                <h1><?= htmlspecialchars($user['username']) ?></h1>
                <p><?= htmlspecialchars($user['bio']) ?></p>
                <div class="profile-stats">
                    <div>👥 Подписчики: <strong><?= $user['followers_count'] ?></strong></div>
                    <div>📝 Рецептов: <strong><?= count($recipes) ?></strong></div>
                </div>
            </div>
        </section>

        <section class="user-recipes">
            <h2>Рецепты пользователя</h2>
            <div class="recipes-grid">
                <?php foreach ($recipes as $recipe): ?>
                    <div class="recipe-card">
                        <div class="recipe-image" style="background: linear-gradient(135deg, #FFE5CC, #FFD0A3);"></div>
                        <div class="recipe-content">
                            <h4><?= htmlspecialchars($recipe['title']) ?></h4>
                            <p class="recipe-meta">⏱️ <?= $recipe['cook_time'] ?> мин | 🔥 <?= $recipe['calories'] ?> ккал</p>
                            <a href="/recipe?id=<?= $recipe['id'] ?>" class="btn-primary">Смотреть</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>

    <script src="/assets/js/main.js"></script>
</body>
</html>
