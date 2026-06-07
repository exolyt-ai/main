<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Панель администратора - CookAI</title>
    <link rel="stylesheet" href="/assets/css/admin.css">
</head>
<body>
    <div class="admin-container">
        <aside class="admin-sidebar">
            <h2>Админ-панель</h2>
            <nav>
                <a href="/admin" class="active">📊 Статистика</a>
                <a href="/admin/users">👥 Пользователи</a>
                <a href="/admin/recipes">📖 Рецепты</a>
                <a href="/admin/communities">👥 Сообщества</a>
                <a href="/admin/ai-logs">📋 Логи AI</a>
            </nav>
        </aside>

        <main class="admin-content">
            <h1>Статистика</h1>
            
            <div class="stats-grid">
                <div class="stat-card">
                    <h3>Пользователи</h3>
                    <p class="stat-number"><?= $stats['total_users'] ?></p>
                </div>
                <div class="stat-card">
                    <h3>Рецепты</h3>
                    <p class="stat-number"><?= $stats['total_recipes'] ?></p>
                </div>
                <div class="stat-card">
                    <h3>Сообщества</h3>
                    <p class="stat-number"><?= $stats['total_communities'] ?></p>
                </div>
            </div>

            <section class="recent-users">
                <h2>Недавние пользователи</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Дата регистрации</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($recent_users as $user): ?>
                            <tr>
                                <td><?= $user['id'] ?></td>
                                <td><?= htmlspecialchars($user['username']) ?></td>
                                <td><?= htmlspecialchars($user['email']) ?></td>
                                <td><?= $user['created_at'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
</body>
</html>
