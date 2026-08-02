<?php
$projectRoot = dirname(__DIR__);
$autoloadFile = $projectRoot . '/vendor/autoload.php';

if (is_file($autoloadFile)) {
    require_once $autoloadFile;
}

if (class_exists('Dotenv\\Dotenv')) {
    foreach ([$projectRoot, __DIR__] as $envPath) {
        if (is_dir($envPath)) {
            $dotenv = Dotenv\Dotenv::createImmutable($envPath);
            $dotenv->load();
            break;
        }
    }
}

function loadEnvironmentFile(string $path): void
{
    if (!is_file($path)) {
        return;
    }

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    if ($lines === false) {
        return;
    }

    foreach ($lines as $line) {
        $line = trim($line);

        if ($line === '' || str_starts_with($line, '#')) {
            continue;
        }

        if (!str_contains($line, '=')) {
            continue;
        }

        [$name, $value] = explode('=', $line, 2);
        $name = trim($name);
        $value = trim($value);

        if ($name === '') {
            continue;
        }

        if (!array_key_exists($name, $_ENV) && !array_key_exists($name, $_SERVER) && getenv($name) === false) {
            putenv($name . '=' . $value);
            $_ENV[$name] = $value;
            $_SERVER[$name] = $value;
        }
    }
}

foreach ([$projectRoot, __DIR__] as $envPath) {
    foreach (['.env', '.env.example'] as $fileName) {
        loadEnvironmentFile($envPath . '/' . $fileName);
    }
}

/** Ambiente */
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';

$isHttps =
    (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
    || (($_SERVER['SERVER_PORT'] ?? null) == 443)
    || (($_SERVER['HTTP_X_FORWARDED_PROTO'] ?? '') === 'https');

$protocol = $isHttps ? 'https://' : 'http://';

/**
 * Application Configuration
 */
define('APP_NAME', 'Syndicus');
define('APP_ROOT', __DIR__);

define('APP_URL_DEVELOPMENT', 'http://localhost/syndicus');
define('APP_URL_GITHUB', 'https://github.com/gbrlsouza/syndicus');
define('APP_URL_PRODUCTION', $protocol . $host);

define(
    'APP_ENV',
    (
        str_contains($host, 'localhost')
        || str_contains($host, '127.0.0.1')
    )
        ? 'development'
        : 'production'
);

define(
    'APP_URL',
    APP_ENV === 'development'
        ? APP_URL_DEVELOPMENT
        : APP_URL_PRODUCTION
);

define('APP_AUTHOR', 'Gabriel Costa de Souza');
define('APP_DESCRIPTION', 'Syndicus é um sistema de gestão de condomínios...');
define('APP_LICENSE', 'MIT');

$versionFile = dirname(APP_ROOT) . '/VERSION';

define(
    'APP_VERSION',
    is_readable($versionFile)
        ? trim(file_get_contents($versionFile))
        : '1.0.0'
);

define('APP_LANGUAGES', 'pt-br');
define('APP_TIMEZONE', 'America/Sao_Paulo');

/**
 * Database Configuration
 */
define('DB_CONNECTION', 'mysql');
define('DB_PORT', '3306');
define('DB_CHARSET', 'utf8mb4');
define('DB_COLLATION', 'utf8mb4_unicode_ci');

$envPrefix = APP_ENV === 'development' ? 'DB_' : 'DB_';

$dbHost = $_ENV['DB_HOST_DEV'] ?? $_ENV['DB_HOST_PROD'] ?? '127.0.0.1';
$dbDatabase = $_ENV['DB_DATABASE_DEV'] ?? $_ENV['DB_DATABASE_PROD'] ?? 'syndicus';
$dbUsername = $_ENV['DB_USERNAME_DEV'] ?? $_ENV['DB_USERNAME_PROD'] ?? 'root';
$dbPassword = $_ENV['DB_PASSWORD_DEV'] ?? $_ENV['DB_PASSWORD_PROD'] ?? '';

if (APP_ENV === 'development') {
    define('DB_HOST', $dbHost);
    define('DB_DATABASE', $dbDatabase);
    define('DB_USERNAME', $dbUsername);
    define('DB_PASSWORD', $dbPassword);
} else {
    define('DB_HOST', $dbHost);
    define('DB_DATABASE', $dbDatabase);
    define('DB_USERNAME', $dbUsername);
    define('DB_PASSWORD', $dbPassword);
}
