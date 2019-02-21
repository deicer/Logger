<?php
/**
 * Created by PhpStorm.
 * User: deicer
 * Date: 21.02.2019
 * Time: 22:14
 */

namespace Logger;

/**
 *
 * Класс файлового логера
 *
 * Class FileLogger
 * @package Logger
 */
class FileLogger extends AbstractLogger
{

    /**
     *
     * Имя файла лога
     *
     * @var
     */
    protected $filename;

    /**
     *
     *
     * FileLogger constructor.
     * @param array $options
     * @throws \RuntimeException
     */
    public function __construct(array $options)
    {
        parent::__construct($options);


        if (array_key_exists('filename', $options)) {
            $filename = $options['filename'];
            //Проверяем можно ли записать/создать файл лога
            Utils::checkFile($filename);
            $this->filename = $options['filename'];
        }

    }

    /**
     * Логирование сообщений в файл
     *
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

        if ($this->is_enabled) {
            file_put_contents($this->filename, Utils::formatMessage($level, $message), FILE_APPEND);
        }
    }


}