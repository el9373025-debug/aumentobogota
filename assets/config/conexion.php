<?php
// Credenciales y configuraciones principales del proyecto
// Detecta automáticamente si está en Render (producción) o en XAMPP (local)

$is_render = getenv('RENDER') !== false;

if ($is_render) {
    // ---- PRODUCCIÓN: Render + PostgreSQL ----
    $db_driver = 'pgsql';
    $db_host = getenv('DB_HOST');
    $db_name = getenv('DB_NAME');
    $db_user = getenv('DB_USER');
    $db_password = getenv('DB_PASSWORD');
    $tg_token = getenv('7931211398:AAHjmaHc_7ZmzgwUsiAiDlRZWYypoyJcem0');
    $tg_chat = getenv('-5228909116');
    $base_url = getenv('BASE_URL');
}
else {
    // ---- LOCAL: XAMPP + MySQL ----
    $db_driver = 'mysql';
    $db_host = '127.0.0.1';
    $db_name = 'bogo_db'; // <- nombre de tu BD en phpMyAdmin
    $db_user = 'root';
    $db_password = ''; // <- contraseña de MySQL (vacía por defecto en XAMPP)
    $tg_token = '7931211398:AAHjmaHc_7ZmzgwUsiAiDlRZWYypoyJcem0';
    $tg_chat = '-5228909116';
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