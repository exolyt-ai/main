-- CookAI Test Data
-- Тестовые данные для разработки

INSERT INTO `users` (`username`, `email`, `password`, `bio`, `is_admin`) VALUES
('admin', 'admin@cookaid.dev', '$2y$10$abc123', 'Администратор', TRUE),
('john_chef', 'john@cookaid.dev', '$2y$10$def456', 'Любитель готовки', FALSE),
('maria_healthy', 'maria@cookaid.dev', '$2y$10$ghi789', 'Фанат ЗОЖ', FALSE),
('alex_baker', 'alex@cookaid.dev', '$2y$10$jkl012', 'Пекарь', FALSE),
('elena_vegan', 'elena@cookaid.dev', '$2y$10$mno345', 'Веганка', FALSE);

INSERT INTO `recipes` (`user_id`, `title`, `description`, `ingredients`, `instructions`, `prep_time`, `cook_time`, `servings`, `difficulty`, `cuisine`, `diet_type`, `calories`, `protein`, `fats`, `carbs`, `is_ai_generated`) VALUES
(1, 'Паста Карбонара', 'Классическое итальянское блюдо', 
    '[{"name":"Спагетти","amount":400,"unit":"г"},{"name":"Яйца","amount":3,"unit":"шт"},{"name":"Бекон","amount":150,"unit":"г"},{"name":"Пармезан","amount":100,"unit":"г"}]',
    '[{"step":1,"text":"Сварить спагетти"},{"step":2,"text":"Нарезать бекон"},{"step":3,"text":"Смешать яйца и сыр"},{"step":4,"text":"Соединить все ингредиенты"}]',
    10, 20, 4, 'medium', 'Итальянская', 'normal', 650, 25, 28, 65, FALSE),
(2, 'Салат Цезарь', 'Освежающий зеленый салат', 
    '[{"name":"Латук","amount":300,"unit":"г"},{"name":"Помидоры","amount":200,"unit":"г"},{"name":"Курица","amount":200,"unit":"г"},{"name":"Пармезан","amount":50,"unit":"г"}]',
    '[{"step":1,"text":"Нарубить латук"},{"step":2,"text":"Нарезать помидоры"},{"step":3,"text":"Приготовить курицу"},{"step":4,"text":"Собрать салат"}]',
    5, 15, 2, 'easy', 'Американская', 'healthy', 320, 35, 12, 15, FALSE),
(3, 'Каша гречневая с овощами', 'Здоровое блюдо для похудения',
    '[{"name":"Гречка","amount":200,"unit":"г"},{"name":"Овощи на пару","amount":300,"unit":"г"},{"name":"Оливковое масло","amount":30,"unit":"мл"}]',
    '[{"step":1,"text":"Сварить гречку"},{"step":2,"text":"Подготовить овощи"},{"step":3,"text":"Соединить"}]',
    5, 25, 2, 'easy', 'Русская', 'diet', 280, 10, 8, 42, FALSE);

INSERT INTO `communities` (`name`, `description`, `admin_id`, `members_count`) VALUES
('Вегетарианцы', 'Сообщество любителей растительной пищи', 5, 150),
('Здоровый образ жизни', 'Обсуждение правильного питания и фитнеса', 3, 320),
('Домашние пекари', 'Делимся рецептами хлеба и выпечки', 4, 85);

INSERT INTO `challenges` (`title`, `description`, `start_date`, `end_date`, `reward_points`) VALUES
('30 дней ПП', 'Готовь только здоровую пищу в течение месяца', '2026-06-01', '2026-06-30', 500),
('Вегетарианская неделя', 'Неделя без мяса и рыбы', '2026-06-07', '2026-06-14', 150),
('Завтраки за 10 минут', 'Готовь завтрак не дольше 10 минут', '2026-06-07', '2026-06-30', 300);

INSERT INTO `cookbooks` (`user_id`, `title`, `description`, `is_public`) VALUES
(1, 'Летние салаты', 'Коллекция салатов для жаркого времени года', TRUE),
(2, 'Быстрые обеды', 'Блюда, которые готовятся менее чем за 30 минут', TRUE),
(3, 'Завтраки на неделю', 'Здоровые завтраки для похудения', TRUE),
(4, 'Выпечка для праздников', 'Торты и пирожные для торжеств', TRUE),
(5, 'Веганские блюда', 'Рецепты без животных продуктов', TRUE);

INSERT INTO `book_recipes` (`book_id`, `recipe_id`) VALUES
(1, 2),
(2, 1),
(3, 3);

INSERT INTO `favorites` (`user_id`, `recipe_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 1);

INSERT INTO `friends` (`user_id`, `friend_id`, `status`) VALUES
(1, 2, 'accepted'),
(1, 3, 'accepted'),
(2, 4, 'pending'),
(3, 5, 'accepted');
