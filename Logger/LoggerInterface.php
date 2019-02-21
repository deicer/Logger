<?php
/**
 * Created by PhpStorm.
 * User: deicer
 * Date: 21.02.2019
 * Time: 22:05
 */

namespace Logger;


interface LoggerInterface
{
    /**
     * Логирование сообщений
     *
     * @param mixed $level
     * @param string $message
     * @return void
     */
    public function log($level, string $message): void;

    /**
     * Логирование сообщений уровня ERROR
     *
     * @param string $message
     * @return void
     */
    public function error(string $message): void;

    /**
     * Логирование сообщений уровня INFO
     *
     * @param string $message
     * @return void
     */
    public function info(string $message): void;

    /**
     * Логирование сообщений уровня INFO
     *
     * @param string $message
     * @return void
     */
    public function debug(string $message): void;

    /**
     * Логирование сообщений уровня NOTICE
     *
     * @param string $message
     * @return void
     */
    public function notice(string $message): void;
}