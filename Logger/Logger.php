<?php
/**
 * Created by PhpStorm.
 * User: deicer
 * Date: 21.02.2019
 * Time: 20:21
 */

namespace Logger;


/**
 *
 * Основной управляющий класс логера
 *
 *
 * Class Logger
 * @package Logger
 */
class Logger extends AbstractLogger
{


    /**
     *
     * Массив со свсеми добавленными логерами
     *
     * @var array
     */
    protected $loggers = [];

    /**
     * @param LoggerInterface $logger
     */
    public function addLogger(LoggerInterface $logger): void
    {
        $this->loggers[] = $logger;
    }

    /**
     *
     * Логирование сообщений из каждого логера сохраненного в loggers
     *
     * @param $level
     * @param $message
     */
    public function log($level, string $message): void
    {
        foreach ($this->loggers as $logger) {
            $logger->log($level, $message);
        }

    }

}