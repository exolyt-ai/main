<?php
/**
 * Конфигурация Yandex AI Studio API
 */

// Yandex AI GPT
define('YANDEX_API_KEY', $_ENV['YANDEX_API_KEY'] ?? 'your_api_key_here');
define('YANDEX_FOLDER_ID', $_ENV['YANDEX_FOLDER_ID'] ?? 'your_folder_id_here');
define('YANDEX_GPT_MODEL', 'yandexgpt-3');
define('YANDEX_API_URL', 'https://llm.api.cloud.yandex.net:443/foundationModels/v1/completion');

// Yandex Vision (Computer Vision)
define('YANDEX_VISION_URL', 'https://vision.api.cloud.yandex.net/vision/v1/imageClassification');

// Yandex Image Generation
define('YANDEX_IMAGE_GEN_URL', 'https://llm.api.cloud.yandex.net:443/imageGeneration/ImageGenerationWithModel');
define('YANDEX_IMAGE_MODEL', 'yandex/yandexart-3');

// Параметры API
define('YANDEX_TIMEOUT', 30);
define('YANDEX_TEMPERATURE', 0.7);
define('YANDEX_MAX_TOKENS', 2000);
