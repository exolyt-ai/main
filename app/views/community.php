<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сообщество - CookAI</title>
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
                <li><a href="/community" class="active">Сообщество</a></li>
                <li><a href="/profile">Личное</a></li>
            </ul>
        </div>
    </nav>

    <main class="container">
        <section class="hero">
            <h2>👥 Сообщество CookAI</h2>
            <p>Присоединяйся к единомышленникам и делись рецептами</p>
        </section>

        <section class="communities-section">
            <h3>Сообщества</h3>
            <div class="communities-grid">
                <?php foreach ($communities as $community): ?>
                    <div class="community-card">
                        <div class="community-header" style="background: linear-gradient(135deg, #FFE5CC, #FFD0A3);"></div>
                        <div class="community-content">
                            <h4><?= htmlspecialchars($community['name']) ?></h4>
                            <p><?= htmlspecialchars($community['description']) ?></p>
                            <p class="community-stats">👥 <?= $community['members_count'] ?> участников</p>
                            <button class="btn-primary">Присоединиться</button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>

    <script src="/assets/js/main.js"></script>
</body>
</html>
