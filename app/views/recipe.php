<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($recipe['title']) ?> - CookAI</title>
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
                <li><a href="/profile">Личное</a></li>
            </ul>
        </div>
    </nav>

    <main class="container">
        <article class="recipe-article">
            <h1><?= htmlspecialchars($recipe['title']) ?></h1>
            
            <div class="recipe-meta-info">
                <span>👨‍🍳 <?= htmlspecialchars($recipe['username']) ?></span>
                <span>⏱️ <?= $recipe['prep_time'] ?> + <?= $recipe['cook_time'] ?> мин</span>
                <span>👥 Порций: <?= $recipe['servings'] ?></span>
                <span>⭐ <?= $recipe['difficulty'] ?></span>
            </div>

            <div class="recipe-nutrition">
                <div class="nutrition-item">
                    <strong>🔥 Калории</strong>
                    <p><?= $recipe['calories'] ?> ккал</p>
                </div>
                <div class="nutrition-item">
                    <strong>🥚 Белки</strong>
                    <p><?= $recipe['protein'] ?>г</p>
                </div>
                <div class="nutrition-item">
                    <strong>🧈 Жиры</strong>
                    <p><?= $recipe['fats'] ?>г</p>
                </div>
                <div class="nutrition-item">
                    <strong>🍞 Углеводы</strong>
                    <p><?= $recipe['carbs'] ?>г</p>
                </div>
            </div>

            <section class="recipe-ingredients">
                <h2>Ингредиенты</h2>
                <ul>
                    <?php $ingredients = json_decode($recipe['ingredients'], true); ?>
                    <?php foreach ($ingredients as $ingredient): ?>
                        <li>
                            <?= htmlspecialchars($ingredient['name']) ?> – 
                            <?= htmlspecialchars($ingredient['amount']) ?> 
                            <?= htmlspecialchars($ingredient['unit']) ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </section>

            <section class="recipe-instructions">
                <h2>Приготовление</h2>
                <ol>
                    <?php $instructions = json_decode($recipe['instructions'], true); ?>
                    <?php foreach ($instructions as $instruction): ?>
                        <li><?= htmlspecialchars($instruction['text']) ?></li>
                    <?php endforeach; ?>
                </ol>
            </section>

            <section class="recipe-comments">
                <h2>Комментарии (<?= count($comments) ?>)</h2>
                <?php foreach ($comments as $comment): ?>
                    <div class="comment">
                        <strong><?= htmlspecialchars($comment['username']) ?></strong>
                        <p><?= htmlspecialchars($comment['text']) ?></p>
                        <small><?= $comment['created_at'] ?></small>
                    </div>
                <?php endforeach; ?>
            </section>
        </article>
    </main>

    <script src="/assets/js/main.js"></script>
</body>
</html>
