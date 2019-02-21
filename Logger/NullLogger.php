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
 * Пустой логер
 *
 * Class NullLogger
 * @package Logger
 */
class NullLogger extends AbstractLogger
{

    /**
     * Логирование сообщений
     *
     * @param mixed $level
     * @param string $message
     * @return void
     */
    public function log($level, string $message): void
    {

    }
}