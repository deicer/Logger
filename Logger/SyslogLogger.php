<?php
/**
 * Created by PhpStorm.
 * User: deicer
 * Date: 21.02.2019
 * Time: 22:58
 */

namespace Logger;


class SyslogLogger extends AbstractLogger
{


    /**
     * SyslogLogger constructor.
     * @param array $options
     */
    public function __construct(array $options)
    {
        parent::__construct($options);
    }

    /**
     * Логирование сообщений
     *
     * @param mixed $level
     * @param string $message
     * @return void
     */
    public function log($level, string $message): void
    {
        // TODO: Implement log() method.
    }
}