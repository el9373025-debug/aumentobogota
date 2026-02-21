<?php
// Credenciales y configuraciones principales del proyecto
// Detecta automáticamente si está en Render (producción) o en XAMPP (local)

$is_render = getenv('RENDER') !== false || isset($_ENV['RENDER']) || isset($_SERVER['RENDER']);

if ($is_render) {
    // ---- PRODUCCIÓN: Render + PostgreSQL ----
    $db_driver = 'pgsql';
    $db_host = $_ENV['DB_HOST'] ?? $_SERVER['DB_HOST'] ?? getenv('DB_HOST');
    $db_name = $_ENV['DB_NAME'] ?? $_SERVER['DB_NAME'] ?? getenv('DB_NAME');
    $db_user = $_ENV['DB_USER'] ?? $_SERVER['DB_USER'] ?? getenv('DB_USER');
    $db_password = $_ENV['DB_PASSWORD'] ?? $_SERVER['DB_PASSWORD'] ?? getenv('DB_PASSWORD');
    $tg_token = $_ENV['TELEGRAM_BOT_TOKEN'] ?? $_SERVER['TELEGRAM_BOT_TOKEN'] ?? getenv('TELEGRAM_BOT_TOKEN');
    $tg_chat = $_ENV['TELEGRAM_CHAT_ID'] ?? $_SERVER['TELEGRAM_CHAT_ID'] ?? getenv('TELEGRAM_CHAT_ID');
    $base_url = $_ENV['BASE_URL'] ?? $_SERVER['BASE_URL'] ?? getenv('BASE_URL');
}
else {
    // ---- LOCAL: XAMPP + MySQL ----
    $db_driver = 'mysql';
    $db_host = '127.0.0.1';
    $db_name = 'bogo_db'; // <- nombre de tu BD en phpMyAdmin
    $db_user = 'root';
    $db_password = ''; // <- contraseña de MySQL (vacía por defecto en XAMPP)
    $tg_token = '8367428003:AAGIVA90j2Ig8s4G_2yAiNGboT3Se3Se00M';
    $tg_chat = '-5215558900';
    $base_url = 'https://hola.com/actualizar_estado.php';
}

return [
    'telegram' => [
        'bot_token' => $tg_token,
        'chat_id' => $tg_chat,
    ],
    'db' => [
        'driver' => $db_driver,
        'host' => $db_host,
        'dbname' => $db_name,
        'user' => $db_user,
        'password' => $db_password,
    ],
    'base_url' => $base_url,
];
?>
