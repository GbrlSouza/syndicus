<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

/**
 * Application Configuration
 */
define('APP_NAME', 'Syndicus');
define('APP_ROOT', __DIR__);
define('APP_URL_DEVELOPMENT', 'http://localhost/syndicus');
define('APP_URL_GITHUB',      'https://github.com/gbrlsouza/syndicus');
define('APP_URL_PRODUCTION',  'http://syndicus.infinityfreeapp.com');

/** Ambiente */
$host = $_SERVER['HTTP_HOST'] ?? '';
define('APP_ENV', (str_contains($host, 'localhost') || str_contains($host, '127.0.0.1')) ? 'development' : 'production');
define('APP_URL', APP_ENV === 'development' ? APP_URL_DEVELOPMENT : APP_URL_PRODUCTION);

define('APP_AUTHOR',      'Gabriel Costa de Souza');
define('APP_DESCRIPTION', 'Syndicus é um sistema de gestão de condomínios...');
define('APP_LICENSE',     'MIT');

$versionFile = dirname(APP_ROOT) . '/VERSION';
define('APP_VERSION', is_readable($versionFile) ? trim(file_get_contents($versionFile)) : '1.0.0');

define('APP_LANGUAGES', 'pt-br');
define('APP_TIMEZONE',  'America/Sao_Paulo');

/**
 * Database Configuration
 */
define('DB_CONNECTION', 'mysql');
define('DB_PORT',       '3306');
define('DB_CHARSET',    'utf8mb4');
define('DB_COLLATION',  'utf8mb4_unicode_ci');

if (APP_ENV === 'development') {
    define('DB_HOST',     $_ENV['DB_HOST_DEV']);
    define('DB_DATABASE', $_ENV['DB_DATABASE_DEV']);
    define('DB_USERNAME', $_ENV['DB_USERNAME_DEV']);
    define('DB_PASSWORD', $_ENV['DB_PASSWORD_DEV']);
} else {
    define('DB_HOST',     $_ENV['DB_HOST_PROD']);
    define('DB_DATABASE', $_ENV['DB_DATABASE_PROD']);
    define('DB_USERNAME', $_ENV['DB_USERNAME_PROD']);
    define('DB_PASSWORD', $_ENV['DB_PASSWORD_PROD']);
}
