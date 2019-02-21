<?php
/**
 * Created by PhpStorm.
 * User: deicer
 * Date: 21.02.2019
 * Time: 22:58
 */

namespace Logger;


/**
 *
 * Класс для записи логово в Syslog
 *
 * Class SyslogLogger
 * @package Logger
 */
class SyslogLogger extends AbstractLogger
{


    /**
     *
     * Массив соотвествий уровней логов программы с уровнями Syslog
     *
     * @var array
     */
    protected $syslog_priority = [
        LogLevel::LEVEL_NOTICE => LOG_NOTICE,
        LogLevel::LEVEL_DEBUG => LOG_DEBUG,
        LogLevel::LEVEL_ERROR => LOG_ERR,
        LogLevel::LEVEL_INFO => LOG_INFO
    ];


    /**
     * Логирование сообщений в Syslog
     *
     * @param mixed $level
     * @param string $message
     * @return void
     */
    public function log($level, string $message): void
    {
        if (!in_array($level, $this->levels) && count($this->levels)) {
            return;
        }

        syslog($this->syslog_priority[$level], $message);
    }
}