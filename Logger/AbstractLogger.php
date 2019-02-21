<?php
/**
 * Created by PhpStorm.
 * User: deicer
 * Date: 21.02.2019
 * Time: 21:10
 */

namespace Logger;


/**
 * Абстрактный класс для всех логеров
 *
 * Class AbstractLogger
 * @package Logger
 */
abstract class AbstractLogger implements LoggerInterface
{
    /**
     *
     *  Массив уровней логирования
     *
     *
     * @var array
     */
    protected $levels = [];


    /**
     *
     * Логер активен или нет
     *
     * @var boolean
     */
    protected $is_enabled;

    /**
     *
     * Если уровней логирования в levels нет, то будут записываться
     * логи всех уровней.
     *
     * Если is_enabled=false логер не активен
     *
     * AbstractLogger constructor.
     * @param array $options
     */
    public function __construct(array $options)
    {
        if (array_key_exists('levels', $options)) {
            $this->levels = is_array($options['levels']) ? $options['levels'] : [];
        }

        if (array_key_exists('is_enabled', $options)) {
            $this->is_enabled = $options['is_enabled'];
        } else $this->is_enabled = true;
    }

    /**
     * Логирование условий ошибки
     *
     * @param string $message
     * @return void
     */
    public function error(string $message): void
    {
        $this->log(LogLevel::LEVEL_ERROR, $message);
    }

    /**
     * Логирование сообщений
     *
     * @param mixed $level
     * @param string $message
     * @return void
     */

    abstract public function log($level, string $message): void;

    /**
     * Логирование информационных сообщений
     *
     * @param string $message
     * @return void
     */
    public function info(string $message): void
    {
        $this->log(LogLevel::LEVEL_INFO, $message);
    }

    /**
     * Логирование сообщений отладки
     *
     * @param string $message
     * @return void
     */
    public function debug(string $message): void
    {
        $this->log(LogLevel::LEVEL_DEBUG, $message);
    }

    /**
     * Логирование нормальных условий
     *
     * @param string $message
     * @return void
     */
    public function notice(string $message): void
    {
        $this->log(LogLevel::LEVEL_NOTICE, $message);
    }


}