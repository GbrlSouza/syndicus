<?php

/**
 * Application Configuration
 */
define('APP_NAME', 'Syndicus');
define('APP_BREADCRUMB', dirname(__FILE__));
define('APP_URL_DEVELOPMENT', 'http://localhost/syndicus');
define('APP_URL_GITHUB', 'https://github.com/gbrlsouza/syndicus');
define('APP_URL_PRODUCTION', 'http://syndicus.infinityfreeapp.com');

/** Ambiente local vs produção */
$host = $_SERVER['HTTP_HOST'] ?? '';

define('APP_ENV', (str_contains($host, 'localhost') || str_contains($host, '127.0.0.1')) ? 'development' : 'production');
define('APP_URL', APP_ENV === 'development' ? APP_URL_DEVELOPMENT : APP_URL_PRODUCTION);
define('APP_AUTHOR', 'Gabriel Costa de Souza');
define('APP_DESCRIPTION', 'Syndicus é um sistema de gestão de condomínios desenvolvido por Gabriel Costa de Souza. Ele oferece uma solução completa para administradores de condomínios, facilitando a organização e a comunicação entre moradores e administradores. Com recursos como controle de despesas, gestão de reservas, comunicação interna e muito mais, o Syndicus é a escolha ideal para quem busca eficiência e praticidade na administração de condomínios.');
define('APP_LICENSE', 'MIT');
define('APP_VERSION', trim(@file_get_contents(dirname(APP_BREADCRUMB) . '/VERSION')) ?: '1.0.0');
define('APP_LANGUAGES', 'pt-br');
define('APP_TIMEZONE', 'America/Sao_Paulo');

/**
 * Database Configuration
 * Local (XAMPP): MySQL em 127.0.0.1 — crie o banco "syndicus" e importe app/DataBase/Schemma.sql
 * Produção (InfinityFree): só funciona com o site hospedado lá (MySQL remoto não aceita seu PC)
 */
define('DB_CONNECTION', 'mysql');
define('DB_PORT', '3306');

if (APP_ENV === 'development') {
    define('DB_HOST', '127.0.0.1');
    define('DB_DATABASE', 'syndicus');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_CHARSET', 'utf8mb4');
    define('DB_COLLATION', 'utf8mb4_unicode_ci');
} else {
    define('DB_HOST', 'sql303.infinityfree.com');
    define('DB_DATABASE', 'if0_42073908_syndicus');
    define('DB_USERNAME', 'if0_42073908');
    define('DB_PASSWORD', 'syndicus0800');
    define('DB_CHARSET', 'utf8mb4');
    define('DB_COLLATION', 'utf8mb4_unicode_ci');
}
