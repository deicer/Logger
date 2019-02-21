<?php
/**
 * Created by PhpStorm.
 * User: deicer
 * Date: 21.02.2019
 * Time: 23:34
 */

namespace Logger;

use RuntimeException;

/**
 *
 * Класс вспомогательных методов
 *
 *
 * Class Utils
 * @package Logger
 */
class Utils
{
    /**
     *
     * Метод проверки на доступность фала для записи/создания
     *
     * @param string $filename
     * @throws \RuntimeException
     */
    public static function checkFile(string $filename): void
    {
        $writable = true;

        // Файл есть. Можем записать?
        if (file_exists($filename) && !is_writable($filename)) {
            $writable = false;

            // Файла нет. Можем создать?
        } else if (!file_exists($filename) && !is_writable(dirname($filename))) {
            $writable = false;
        }

        if (!$writable) {
            throw new RuntimeException('"' . $filename . '" разрешение на запись отсутствует');
        }
    }

    /**
     *
     * Форматирование сообщений для вывода в формате
     *  Time Level Message (L)
     *  Time - Время
     *  Level - Уровень логирования
     *  Message - текст сообщения
     *  (L) - Первая буква уровня логирования
     *
     * @param $level
     * @param string $message
     * @return string
     */
    public static function formatMessage($level, string $message): string
    {
        return date('c') . ' ' . $level . ' ' . $message . ' ' . '(' . $level[0] . ')' . PHP_EOL;
    }


}