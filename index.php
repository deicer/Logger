<?php /** @noinspection UnnecessaryParenthesesInspection */
/**
 * Задача: реализовать необходимы классы и методы для запуска данного файла
 *
 * Основные требования:
 * - модифицировать файл нельзя
 * - аккуратность, чистота кода
 * - документация (для каждого метода, поля, класса есть DocBlock)
 * - комментарии в коде для непонятных участков
 *
 * Результатом выполнение программы должны быть 3 файла:
 *
 * application.log
 * *****************
 * 2016-05-30T09:50:57+00:00  ERROR  Error message (E)
 * 2016-05-30T09:50:57+00:00  ERROR  Error message (E)
 * 2016-05-30T09:50:57+00:00  INFO  Info message (I)
 * 2016-05-30T09:50:57+00:00  INFO  Info message (I)
 * 2016-05-30T09:50:57+00:00  DEBUG  Debug message (D)
 * 2016-05-30T09:50:57+00:00  DEBUG  Debug message (D)
 * 2016-05-30T09:50:57+00:00  NOTICE  Notice message (N)
 * 2016-05-30T09:50:57+00:00  NOTICE  Notice message (N)
 * 2016-05-30T09:50:57+00:00  INFO  Info message from FileLogger (I)
 * 2016-05-30T09:50:57+00:00  INFO  Info message from FileLogger (I)
 * *****************
 *
 * application.error.log
 * *****************
 * 2016-05-30T09:50:57+00:00  ERROR  Error message (E)
 * 2016-05-30T09:50:57+00:00  ERROR  Error message (E)
 * *****************
 *
 * application.info.log
 * *****************
 * 2016-05-30T09:50:57+00:00  INFO  Info message (I)
 * 2016-05-30T09:50:57+00:00  INFO  Info message (I)
 * *****************
 *
 * Формат логов:
 * {дата} {уровень логирования} {сообщение} ({короткий код уровня логирования})
 */
/**
 * PSR-autoloader
 */
require_once __DIR__ . '/vendor/autoload.php';
/**
 * Компонент для логирования
 */
$logger = new Logger\Logger([]);
/**
 * Логер который все логи будет писать в файл application.log
 */
$fileLogger = new Logger\FileLogger([
    'is_enabled' => true,
    'filename' => __DIR__ . '/application.log',
]);
$logger->addLogger($fileLogger);
/**
 * Логер который все ошибки будет писать в файл application.error.log
 */
$logger->addLogger(new Logger\FileLogger([
    'is_enabled' => true,
    'filename' => __DIR__ . '/application.error.log',
    'levels' => [
        Logger\LogLevel::LEVEL_ERROR,
    ],
]));
/**
 * Логер который все информационные логи будет писать в файл application.info.log
 */
$logger->addLogger(new Logger\FileLogger([
    'is_enabled' => true,
    'filename' => __DIR__ . '/application.info.log',
    'levels' => [
        Logger\LogLevel::LEVEL_INFO,
    ],
]));
/**
 * Логер который все debug логи записывает в syslog
 *
 * @see http://php.net/manual/ru/function.syslog.php
 */
$logger->addLogger(new Logger\SyslogLogger([
    'is_enabled' => true,
    'levels' => [
        Logger\LogLevel::LEVEL_DEBUG,
    ],
]));
/**
 * Логер который ничего не делает
 */
$logger->addLogger(new Logger\NullLogger([
]));
$logger->log(Logger\LogLevel::LEVEL_ERROR, 'Error message');
$logger->error('Error message');
$logger->log(Logger\LogLevel::LEVEL_INFO, 'Info message');
$logger->info('Info message');
$logger->log(Logger\LogLevel::LEVEL_DEBUG, 'Debug message');
$logger->debug('Debug message');
$logger->log(Logger\LogLevel::LEVEL_NOTICE, 'Notice message');
$logger->notice('Notice message');
$fileLogger->log(Logger\LogLevel::LEVEL_INFO, 'Info message from FileLogger');
$fileLogger->info('Info message from FileLogger');