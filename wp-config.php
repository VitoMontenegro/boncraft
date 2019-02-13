<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'boncraft');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'LS*6$<1>9}*XS(eCLV;-a2/!v7M{-,nc2(AwZJj%MuW`,#4T%TMu8_9d&2+/gmGx');
define('SECURE_AUTH_KEY',  '2uB1{Ax7?}MAzT,#s]=Af?{f!|%S0T;obJOVyJ}R=,=7VSlMgn]R0g7-^=2 Q5zL');
define('LOGGED_IN_KEY',    'PYYT(g22GB!q*TtIN;R3BUu:vN3C1<z6qq)(7tRLo.+eyU]Xh5_m{4{nHkvJHPGc');
define('NONCE_KEY',        ' x%,Lm?^XlGpp}uq#T) M!N]/$)i;4L#KRD[s3>{EeJ7;9:$dg3:I]aN.OyFFm1E');
define('AUTH_SALT',        'n!NrO]X}9t V|b[/rqG!f>IYj(*=~3Kd%`K6,g*?fu?1+&#yZUern{3~sO{L3-5Y');
define('SECURE_AUTH_SALT', 'o:p6!vpKgo/oueum8j^@fF1!npWym/GL`|:zHwa-=U&X[B@XIOW-W7wEbkY^*;om');
define('LOGGED_IN_SALT',   'RlnPO<H}x(3EVdM*:<hRqe]dUn!6eddv/d?fw4V5KVBJIBk93q81cn8_s<v:0edl');
define('NONCE_SALT',       '*L[Z$jA?k21@EE)z9Ab:hq9u#+l{VX$PM}@;M=!aa`EEXmAp^WPsh;ee(c2d?797');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
